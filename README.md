# NFC-RFID Converter 🌐

A modern, offline-capable tool for converting NFC / RFID UIDs between hexadecimal and decimal formats.  
Built with PHP 8, Composer, PSR-4 autoloading and Ships as a Progressive Web App.

---

## Local development
```bash
# clone && enter
composer install            # installs deps + autoloader
cp env.example .env         # optional – configure secrets

# start local server (clean URLs, PWA assets)
php -S localhost:8000 -t public router.php
```
Visit <http://localhost:8000>.

## Project layout
```
public/        ← document-root (CSS, JS, index.php, manifest, service-worker)
src/           ← PHP domain / service classes (PSR-4)
templates/     ← views (layout + partials)
routes.php     ← URL → view map
router.php     ← dev router for `php -S`
composer.json  ← dependencies + autoload
```

## Environment variables
Environment values are loaded via **vlucas/phpdotenv**.  
Create a `.env` file (see `env.example`).

## Deploy to Railway 🛤️
1.  **Add project** → _Deploy from GitHub_.
2.  **Build command**  :  `composer install --no-dev --optimize-autoloader`
3.  **Start command**  :  `php -d variables_order=EGPCS -S 0.0.0.0:$PORT -t public router.php`
4.  Add your environment variables in the **Variables** tab.

Railway automatically sets `$PORT`; the above command tells PHP to
listen on that port, expose `public/` as the web root, and use `router.php`
for clean URLs.

---
Feel free to open issues or PRs! ✨ 