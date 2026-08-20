#!/bin/sh

# Ensure SQLite file exists
if [ ! -f /var/www/database/database.sqlite ]; then
    touch /var/www/database/database.sqlite
fi

# Run migrations
php artisan migrate --force

# Start the Laravel application server
php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
