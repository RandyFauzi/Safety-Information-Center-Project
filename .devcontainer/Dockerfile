FROM mcr.microsoft.com/devcontainers/php:8.2

RUN apt-get update && apt-get install -y unzip mariadb-client \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
