FROM php:apache
#install extension for laravel installer
RUN a2enmod rewrite
RUN apt update
RUN apt install -y zlib1g-dev libzip-dev zip
RUN apt-get install libpng-dev -y
RUN apt-get install libjpeg-dev -y
RUN apt-get install libfreetype6-dev -y

RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mbstring exif
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/ 
RUN docker-php-ext-install gd
WORKDIR /var/www/html
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN composer global require laravel/installer

