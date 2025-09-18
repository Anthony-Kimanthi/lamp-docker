FROM php:7.4-apache

# Install system dependencies first
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    default-libmysqlclient-dev \
    && docker-php-ext-install mysqli pdo_mysql \
    && docker-php-ext-enable mysqli pdo_mysql

# Optional: enable Apache mod_rewrite
RUN a2enmod rewrite
