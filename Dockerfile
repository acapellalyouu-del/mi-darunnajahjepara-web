FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev sqlite3 libsqlite3-dev nodejs npm \
    && docker-php-ext-install pdo pdo_sqlite zip

WORKDIR /app
COPY . .

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN npm install && npm run build

EXPOSE 10000

CMD php artisan serve --host 0.0.0.0 --port ${PORT:-10000}
