#!/bin/sh
set -e

if [ -z "$APP_KEY" ]; then
    echo "APP_KEY wajib diisi" >&2
    exit 1
fi

# Render (generateValue) memberi string acak biasa; Laravel butuh "base64:<32 byte>".
case "$APP_KEY" in
    base64:*) ;;
    *) APP_KEY="base64:$(php -r 'echo base64_encode(hash("sha256", getenv("APP_KEY"), true));')"; export APP_KEY ;;
esac

php artisan config:cache
php artisan route:cache
php artisan view:cache

# Migrasi + seed katalog (idempotent; akun demo tidak ikut di production)
php artisan migrate --force
php artisan db:seed --force

exec apache2-foreground
