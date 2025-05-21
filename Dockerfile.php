FROM php:8.2-cli

# Installer les extensions nécessaires (dont pdo_mysql)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql
