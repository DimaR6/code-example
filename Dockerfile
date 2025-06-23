FROM php:8.3-apache

# Встановлюємо потрібні PHP-розширення
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Встановлюємо Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Встановлюємо Laravel dependencies
WORKDIR /var/www/html

# Apache document root на папку public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Вмикаємо mod_rewrite
RUN a2enmod rewrite
