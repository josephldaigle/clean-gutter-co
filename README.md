

# Clean Gutter Co

Website for Clean Gutter Co, a gutter-cleaning company serving Byron, Warner Robins, Macon, Perry, Fort Valley, and surrounding Middle Georgia communities.

## Tech Stack

- Symfony
- Twig
- Bootstrap
- SCSS
- MySQL 8.0
- Webpack Encore / Node
- nginx in production

## Local Development

### Database

Start MySQL 8.0 before running the application:

```bash
brew services start mysql@8.0
```

### Symfony

Start the local Symfony server in the development environment:

```bash
APP_ENV=dev symfony server:start
```

### Frontend assets

The project uses Node-managed frontend dependencies. If the asset build fails, confirm that the expected Node version is active before installing dependencies or compiling assets.

```bash
npm install
npm run dev
```

## Production

The production site runs on a DigitalOcean server behind nginx with SSL managed through Certbot.

Before deploying, verify that:

- production environment variables are configured
- MySQL is running
- frontend assets compile successfully
- Symfony cache is cleared/warmed for production
- database migrations, if any, have been reviewed and run
- the quote-request form and email delivery work after deployment
- HTTPS and primary site routes respond correctly

## Deployment

Deployment details are intentionally documented at a high level here. Do not commit production credentials, API keys, SMTP passwords, private keys, or other secrets to this repository.

A typical release should include:

1. Pull the intended production branch/revision.
2. Install/update PHP dependencies for production.
3. Install/build frontend assets.
4. Run any required database migrations.
5. Clear and warm the Symfony production cache.
6. Verify file permissions where necessary.
7. Smoke-test the site, quote form, email delivery, and HTTPS.

## Key Pages

- Home
- About
- FAQ
- Contact & Service Area
- Terms of Service
- Privacy Policy

## Business Contact

**Clean Gutter Co**  
Byron, Georgia  
(478) 283-3355  
joe@cleangutterco.com
