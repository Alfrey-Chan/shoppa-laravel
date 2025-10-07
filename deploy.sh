#!/bin/bash

# Exit on error
set -e

echo "Optimizing application..."
php artisan optimize

echo "Deployment complete!"
