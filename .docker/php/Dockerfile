FROM php:8.2-apache

WORKDIR /var/www/html

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get -y install \
    git
