FROM php:7.0-apache
VOLUME /home/ubuntu/Php
COPY . /var/www/html/
RUN docker-php-ext-install mysqli
EXPOSE 80
