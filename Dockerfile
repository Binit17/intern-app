FROM php:8.0-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Update and upgrade packages
RUN apt-get update && apt-get upgrade -y

#copy 
COPY . /var/www/html/
