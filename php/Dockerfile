FROM php:7.4-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

# Optional: enable Apache mod_rewrite (often needed for frameworks like Laravel, CodeIgniter, etc.)
RUN a2enmod rewrite
