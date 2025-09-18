FROM php:7.4-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy your app (optional if you're using a volume already)
COPY . /var/www/html/
