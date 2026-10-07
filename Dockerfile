# ---------- 1. Build aset frontend (Vite + Tailwind) ----------
FROM node:22-alpine AS assets
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY vite.config.js ./
COPY resources ./resources
RUN npm run build

# ---------- 2. Dependensi PHP (tanpa paket dev) ----------
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --no-interaction --ignore-platform-reqs
COPY . .
RUN composer dump-autoload --optimize --no-dev --no-scripts

# ---------- 3. Runtime: PHP 8.3 + Apache ----------
FROM php:8.3-apache

RUN apt-get update \
 && apt-get install -y --no-install-recommends libpq-dev \
 && docker-php-ext-install pdo_pgsql pdo_mysql opcache \
 && a2enmod rewrite headers \
 && rm -rf /var/lib/apt/lists/*

# Document root ke public/, port mengikuti $PORT dari hosting (Render memakai 10000)
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public \
    PORT=8080
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && sed -ri 's!^Listen 80$!Listen ${PORT}!' /etc/apache2/ports.conf \
 && sed -ri 's!<VirtualHost \*:80>!<VirtualHost *:${PORT}>!' /etc/apache2/sites-available/000-default.conf \
 && printf '<Directory ${APACHE_DOCUMENT_ROOT}>\n    AllowOverride All\n</Directory>\n' > /etc/apache2/conf-available/laravel.conf \
 && a2enconf laravel \
 && mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

WORKDIR /var/www/html
COPY --from=vendor /app ./
COPY --from=assets /app/public/build ./public/build
RUN php artisan package:discover --ansi \
 && chown -R www-data:www-data storage bootstrap/cache

COPY docker/start.sh /usr/local/bin/start
RUN chmod +x /usr/local/bin/start
CMD ["start"]
