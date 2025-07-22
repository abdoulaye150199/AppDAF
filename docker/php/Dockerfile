FROM php:8.1-fpm

# Installation des dépendances système
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git

# Installation des extensions PHP
RUN docker-php-ext-install pdo pdo_pgsql

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copie des fichiers du projet
COPY . .

# Installation des dépendances
RUN composer install --no-interaction --optimize-autoloader

# Permissions
RUN chown -R www-data:www-data /var/www