FROM php:8.1-fpm
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    zip \
    unzip
# Install driver for mysql and mariadb
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --ignore-platform-reqs
WORKDIR /var/www/symfony
CMD ["php-fpm"]

EXPOSE 9000