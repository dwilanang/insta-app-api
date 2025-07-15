# Gunakan PHP base image
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Atur direktori kerja
WORKDIR /var/www

# Salin semua file ke container
COPY . .

# Install dependensi Laravel
RUN composer install

# Set permission storage & cache
RUN chmod -R 775 storage bootstrap/cache

# Copy entrypoint script
COPY .docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Jalankan entrypoint saat container start
CMD ["entrypoint.sh"]
