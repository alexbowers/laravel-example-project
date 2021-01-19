FROM php:7.4-fpm-alpine AS base

RUN apk add zlib-dev
RUN apk add libpng-dev
RUN apk add libzip-dev

RUN docker-php-ext-install exif
RUN docker-php-ext-install gd
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo_mysql

FROM base AS dev

COPY /composer.json composer.json
COPY /composer.lock composer.lock
COPY /app app
COPY /bootstrap bootstrap
COPY /config config
COPY /artisan artisan

FROM base AS build-fpm

WORKDIR /var/www/html

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY /composer.json composer.json
COPY /composer.lock composer.lock
COPY /app app
COPY /bootstrap bootstrap
COPY /config config
COPY /artisan artisan
COPY /routes routes

RUN composer install --prefer-dist --no-ansi --no-dev

COPY . /var/www/html

RUN composer dump-autoload -o

FROM build-fpm AS fpm

COPY --from=build-fpm /var/www/html /var/www/html