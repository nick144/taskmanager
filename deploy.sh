#!/bin/bash

set -e

APP_DIR="/var/www/taskmanager"
CONTAINER_NAME="laravel-app"


echo "📁 Changing to app directory: $APP_DIR"
cd "$APP_DIR"

echo "🛑 Stopping all running Docker containers..."
docker ps -q | xargs -r docker stop

echo "❌ Removing Docker containers, images, volumes, orphans..."
docker-compose down --rmi all --volumes --remove-orphans

echo "📦 Pulling latest code from Git..."
git pull origin main

echo "🔧 Building Docker containers..."
docker-compose up -d --build

echo "📦 Installing Composer dependencies..."
docker exec "$CONTAINER_NAME" composer install --no-interaction --prefer-dist --optimize-autoloader


docker exec "$CONTAINER_NAME" chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
docker exec "$CONTAINER_NAME" chmod -R 775 /var/www/storage /var/www/bootstrap/cache


echo "🎹 Running Laravel migrations..."
docker exec "$CONTAINER_NAME" php artisan migrate --force

echo "✅ Deployment completed successfully!"
