FROM php:8.2-fpm
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    zip \
    unzip
# Install driver for mysql and mariadb
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


WORKDIR /var/www/symfony
COPY ./ /var/www/symfony
RUN mkdir -p /var/www/symfony/var/log/
RUN composer install --ignore-platform-reqs

CMD ["php-fpm"]
EXPOSE 9000