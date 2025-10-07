#!/bin/bash

# Exit on error
set -e

echo "Creating database file if not exists..."
touch storage/database.sqlite

echo "Running migrations..."
php artisan migrate --force

echo "Optimizing application..."
php artisan optimize

echo "Deployment complete!"
