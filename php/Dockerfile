FROM php:7.4-apache

# Install mysqli and pdo_mysql
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

# Optional: enable Apache mod_rewrite if needed
RUN a2enmod rewrite
