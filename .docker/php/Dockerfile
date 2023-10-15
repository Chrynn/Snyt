FROM php:8.2-apache

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mysqli

RUN apt-get update && apt-get -y install \
    git
