# Deployment

Single-droplet Docker Compose deployment for the Clean Gutter Co Symfony 5.1 app.
Stack: nginx 1.25 · PHP 8.0-FPM · MySQL 8.0 · Docker Compose v2

---

## First-time setup

### 1. Create `.env.prod` from the template

```bash
cp .env.prod.dist .env.prod
```

Edit `.env.prod` and replace every `CHANGE_ME` value.  Generate APP_SECRET with:

```bash
openssl rand -hex 32
```

> **Security note**: The committed `.env` file contains credentials that were
> previously exposed in git.  Before going live, rotate the Gmail app password
> and QuickBooks OAuth secret, then put the new values only in `.env.prod`.

### 2. Build and start (local or droplet)

```bash
docker compose build --no-cache
docker compose up -d
```

On first start the `db` container initialises its data directory (~30 s).
The `app` container waits for the database health check before it starts.

### 3. Run database migrations

```bash
docker compose exec app php bin/console doctrine:migrations:migrate --no-interaction --env=prod
```

> **Important:** Run Symfony/Composer commands inside the `app` container, not directly on the host. The production `DATABASE_URL` uses the Docker service hostname `db`, which only resolves inside the Compose network.

---

## Routine deploys

From the project directory on the droplet:

```bash
git pull
docker compose build
docker compose up -d
docker compose ps
```

`docker compose up -d` recreates services from the newly built image while preserving the named MySQL volume. The app entrypoint re-syncs assets and warms the Symfony production cache automatically.

After deployment, verify the site and application state:

```bash
docker compose ps
docker compose logs --tail=50 app nginx
curl -I https://cleangutterco.com
```

Then smoke-test the Home, About, FAQ, and Contact pages and submit a real test quote request to verify email delivery.

> **Do not run `composer install` directly on the droplet host.** If Composer or Symfony console commands are needed after the image is built, run them through `docker compose exec app ...`.

---

## Droplet: provision and first deploy

```bash
# On the droplet (Ubuntu 22.04+)
apt-get update && apt-get install -y docker.io docker-compose-v2
systemctl enable --now docker
docker compose version

# As your deploy user
git clone <repo> /opt/clean-gutter-co
cd /opt/clean-gutter-co
cp .env.prod.dist .env.prod
# Edit .env.prod with production values
docker compose build --no-cache
docker compose up -d
docker compose exec app php bin/console doctrine:migrations:migrate --no-interaction
```

---

## Database import

Import a SQL dump into the running database:

```bash
# From a .sql file on the host
docker compose exec -T db \
    mysql -ucgc -p"$(grep ^MYSQL_PASSWORD .env.prod | cut -d= -f2)" cgc \
    < /path/to/dump.sql

# Or pipe a gzipped dump
gunzip -c dump.sql.gz | docker compose exec -T db \
    mysql -ucgc -p"$(grep ^MYSQL_PASSWORD .env.prod | cut -d= -f2)" cgc
```

---

## Cache clear

```bash
docker compose exec app php bin/console cache:clear --env=prod
```

A normal container start already warms the production cache. Use the manual cache clear only when troubleshooting stale Symfony output or after a change that is not reflected as expected.

---

## Logs

```bash
# nginx access + error
docker compose logs -f nginx

# PHP-FPM + Symfony app log
docker compose logs -f app

# MySQL
docker compose logs -f db

# Symfony var/log/prod.log inside the container
docker compose exec app tail -f var/log/prod.log
```

---

## Restart

```bash
# Graceful restart (zero downtime within compose)
docker compose restart app
docker compose restart nginx

# Full stop and start
docker compose down
docker compose up -d
```

---

## Rebuild a single service

```bash
docker compose build app
docker compose up -d --no-deps app
```

---

## Troubleshooting

**`docker-compose` fails with `KeyError: 'ContainerConfig'`**

The legacy Python `docker-compose` 1.29.x client is incompatible with the current Docker Engine on the droplet. Use Docker Compose v2 instead:

```bash
apt-get update
apt-get install -y docker-compose-v2
docker compose version
```

Use `docker compose` (with a space) for all deployment commands. Do not use the old `docker-compose` binary.

**Composer/Symfony on the host cannot resolve database host `db`**

This is expected because `db` is the Docker Compose service name. Run commands inside the app container instead, for example:

```bash
docker compose exec app php bin/console cache:clear --env=prod
```

**Build fails on `yarn build` (vue-loader error)**

`webpack.config.js` calls `enableVueLoader()` but `vue` and `vue-loader` are
not listed as explicit dependencies.  If yarn.lock does not have them resolved,
add them:

```bash
yarn add vue@^2 vue-loader@^15 vue-template-compiler@^2 --dev
```

Then rebuild.

**`cache:warmup` fails on first start**

Usually means the database isn't reachable or migrations haven't been run.
Check `docker compose logs app` and run migrations (step 3 above).

**php-fpm workers don't see env vars**

`docker/php/zz-docker.conf` sets `clear_env = no`.  Verify it is mounted:

```bash
docker compose exec app cat /usr/local/etc/php-fpm.d/zz-docker.conf
```

---

## Service URLs (local)

| Service | URL |
|---------|-----|
| Site    | http://localhost |
| MySQL   | localhost:3306 (internal only; not exposed on droplet) |
