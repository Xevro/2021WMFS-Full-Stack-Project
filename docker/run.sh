#!/bin/sh
# Run Composer Install
docker exec 2021wmfs-louisdhont_php-web cp .env.example .env
docker exec 2021wmfs-louisdhont_php-web composer install
docker exec 2021wmfs-louisdhont_php-web php artisan key:generate
done