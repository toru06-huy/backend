#!/bin/bash

php artisan migrate:fresh --seed --force
# Khởi động PHP-FPM
php-fpm -D

# Khởi động Nginx ở chế độ foreground
nginx -g "daemon off;"