FROM php:apache
#install extension for laravel installer
RUN a2enmod rewrite
RUN apt update
RUN apt install -y zlib1g-dev libzip-dev zip
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo_mysql
WORKDIR /var/www/html
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN composer global require laravel/installer

