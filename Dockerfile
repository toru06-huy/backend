FROM php:8.3-fpm

# Cài đặt system dependencies (Bổ sung libpq-dev cho Postgres nếu cần)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    libpq-dev \
    zip \
    unzip \
    nginx

# Cài đặt PHP extensions
# Bổ sung pdo_pgsql để Huy có thể dùng Database của Render (thường là Postgres)
RUN docker-php-ext-configure intl && \
    docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip intl

# Lấy Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy code vào trước
COPY . .

# Xóa vendor cũ và cài đặt thư viện
# Thêm --no-scripts để tránh lỗi khi chưa có DB lúc build
RUN rm -rf vendor && \
    composer install --no-interaction --optimize-autoloader --no-dev --ignore-platform-req=php+ --no-scripts

# Phân quyền (Thêm quyền thực thi cho cả thư mục var/www)
RUN chown -R www-data:www-data /var/www && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Cấu hình Nginx & Entrypoint
COPY ./docker/nginx.conf /etc/nginx/sites-available/default
COPY ./docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80
ENTRYPOINT ["entrypoint.sh"]