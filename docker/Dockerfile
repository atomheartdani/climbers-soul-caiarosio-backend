FROM php:8.0-apache

# Install zip
RUN apt-get update && apt-get install -y libzip-dev

# Install php extension installer helper
ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install 
RUN install-php-extensions @composer-2.9.2 pdo_mysql mysqli zip

# Copy php dependencies installer script
COPY install-dependencies.sh ./
