FROM php:8.2-apache

ENV APACHE_DOCUMENT_ROOT /var/www/html/www

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mysqli

RUN apt-get update && apt-get -y install \
    git
