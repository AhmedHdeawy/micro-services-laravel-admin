FROM php:7.4

#Add a user with userid 8877 and name nonroot
RUN useradd -u 1001 -ms /bin/bash dockeruser



RUN apt-get update -y && apt-get install -y openssl zip unzip git libonig-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring pdo_mysql

WORKDIR /app
COPY . .
RUN composer install

RUN chown dockeruser:dockeruser /app -R
#Run Container as dockeruser
USER dockeruser

CMD php artisan serve --host=0.0.0.0
EXPOSE 8000