FROM php:8.2-fpm


ENV TZ=Europe/Moscow

RUN apt update && \
    apt -y --no-install-recommends install libonig-dev libxml2-dev zlib1g-dev libzip-dev libcurl4-openssl-dev && \
    docker-php-ext-install mysqli bcmath mbstring xml ctype zip pdo_mysql curl filter

RUN curl https://getcomposer.org/composer-2.phar --output /usr/local/bin/composer && chmod 0777 /usr/local/bin/composer

