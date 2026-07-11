#!/bin/bash
set -e

echo "Starting Deployment..."

# Go to the project root directory
cd /var/www/alink || exit

# Pull the latest changes from the git repository (assuming branch is 'main')
git pull origin main

# Install/update composer dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# Run database migrations
php artisan migrate --force

# Clear and optimize caches
php artisan route:clear
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan optimize

echo "Deployment finished!"
