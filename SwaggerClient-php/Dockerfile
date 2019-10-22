# Dockerfile for PHP 5.6/7.0/7.1 using nginx as the webserver.
FROM php:7.1-fpm

MAINTAINER Renato Ribeiro

# Copy files and directories from the application

COPY . /var/www/html/

WORKDIR /home/ribeiro/phpRenato/SwaggerClient-php

ONBUILD RUN index.php
ONBUILD COPY . /home/ribeiro/phpRenato/SwaggerClient-php

# Tell Docker we are going to use this port
EXPOSE 5000



#run the application
CMD ["php", "-S", "127.0.0.1:5000", "-t", "."]

