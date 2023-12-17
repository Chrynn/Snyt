FROM php:8.2-apache

# Change default Apache config
ENV APACHE_DOCUMENT_ROOT /var/www/html/www

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Enable .htaccess
RUN a2enmod rewrite

# For managing PHP packages
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Install base (from Docker) extensions
RUN docker-php-ext-install \
    # For accessing databases in PHP
    pdo \
    pdo_mysql \
    mysqli

# Install extra (from Debian) extensions
RUN apt-get update && apt-get -y install \
    # For repository actions
    git \
    # For reading ZIP compressed archives (required by nextras/migrations)
    zip
