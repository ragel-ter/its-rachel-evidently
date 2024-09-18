FROM php:8.2-fpm

RUN echo "clear_env = no" >> /usr/local/etc/php-fpm.d/www.conf
RUN apt-get update && apt-get install -y zip unzip
RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY composer.json ./
RUN composer install --no-scripts --no-autoloader

COPY . .
RUN composer dump-autoload --optimize

COPY src /var/www/src

RUN sed -i '1iset_include_path(get_include_path() . PATH_SEPARATOR . "/var/www");' /usr/local/etc/php/php.ini-production \
    && cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
