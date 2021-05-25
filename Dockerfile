FROM php:7.2.2-fpm
RUN apt-get update -y && apt-get install -y libmcrypt-dev openssl
RUN docker-php-ext-install pdo mcrypt mbstring

RUN docker-php-ext-install pdo mcrypt mbstring
WORKDIR /app
COPY . /app


CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000
