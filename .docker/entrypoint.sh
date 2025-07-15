#!/bin/bash

# Tunggu DB siap (opsional jika PostgreSQL butuh waktu)
echo "Menunggu database..."
sleep 5

# Generate key jika belum ada
if [ ! -f /var/www/storage/oauth-private.key ]; then
    echo "Generate Key..."
  php artisan key:generate
fi

php artisan config:clear

# Jalankan migrasi
echo "Migrasi database..."
php artisan migrate --force

# Install Sanctum jika belum ada
if [ ! -d "vendor/laravel/sanctum" ]; then
  echo "📦 Install Sanctum..."
  composer require laravel/sanctum
  php artisan vendor:publish --provider="Laravel\\Sanctum\\SanctumServiceProvider" --force
  php artisan migrate --force
fi

# Cek dan install Swagger jika belum ada
if [ ! -d "vendor/darkaonline/l5-swagger" ]; then
  echo "Install L5 Swagger..."
  composer require darkaonline/l5-swagger
  php artisan vendor:publish --provider="L5Swagger\\L5SwaggerServiceProvider"
fi

echo "Generate Swagger docs..."
php artisan l5-swagger:generate

# Jalankan php-fpm (default Laravel server)
echo "Run..."
php-fpm
