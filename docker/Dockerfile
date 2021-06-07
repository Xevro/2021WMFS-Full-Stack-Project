FROM php:8.0-apache
ENV APACHE_DOCUMENT_ROOT=/var/www/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN a2enmod rewrite
RUN apt-get update && apt-get install -y libzip-dev zip && docker-php-ext-install zip && docker-php-ext-install bcmath && docker-php-ext-install pdo_mysql
RUN apt-get install -y locales locales-all
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN curl -sL https://deb.nodesource.com/setup_15.x | bash - && apt-get install -y nodejs

WORKDIR /var/www

# Run Composer Install
RUN 2021wmfs-louisdhont_php-web COPY .env.example .env
RUN 2021wmfs-louisdhont_php-web composer install
RUN 2021wmfs-louisdhont_php-web php artisan key:generate
VOLUME /usr/local/etc/php