FROM php:8.2-fpm

# تثبيت الباكدجات المطلوبة
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libcurl4-openssl-dev \
    libsodium-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath curl sodium

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تحديد مجلد العمل
WORKDIR /var/www

# نسخ الملفات إلى الحاوية
COPY . .

# تثبيت الاعتمادات بدون باكدجات التطوير
RUN composer install --no-dev --optimize-autoloader

# إعداد صلاحيات مجلد التخزين
RUN chown -R www-data:www-data /var/www/storage

# فتح البورت
EXPOSE 8000

# الأمر الرئيسي لتشغيل التطبيق (يتم تفعيل config:cache عند التشغيل وليس وقت البناء لضمان قراءة APP_KEY من البيئة)
CMD php artisan config:cache && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
