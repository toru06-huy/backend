FROM php:8.3-fpm

# Cài đặt system dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev libzip-dev libicu-dev zip unzip nginx

# Cài đặt PHP extensions
RUN docker-php-ext-configure intl && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Lấy Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Bước quan trọng: Copy toàn bộ dự án vào trước
COPY . .

# Xóa thư mục vendor cũ nếu có (tránh xung đột từ máy Windows) và cài mới
RUN rm -rf vendor && \
    composer install --no-interaction --optimize-autoloader --no-dev --ignore-platform-req=php+

# Phân quyền
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Cấu hình Nginx & Entrypoint
COPY ./docker/nginx.conf /etc/nginx/sites-available/default
COPY ./docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80
ENTRYPOINT ["entrypoint.sh"]