#!/bin/sh
set -e

# var/ is a named volume — it starts empty on first run.
mkdir -p /var/www/html/var/cache /var/www/html/var/log
chown -R www-data:www-data /var/www/html/var

# Sync the built public/ snapshot (baked into image) into the shared volume
# so nginx can serve static assets. Runs on every start so deploys are atomic.
cp -r /public-src/. /var/www/html/public/

# Warm the Symfony production cache under www-data so workers can write to it.
echo "[entrypoint] Warming cache..."
gosu www-data php /var/www/html/bin/console cache:warmup --env=prod --no-debug 2>&1 \
    || echo "[entrypoint] WARNING: cache:warmup failed — check logs after startup"

echo "[entrypoint] Starting php-fpm..."
exec "$@"
