#FROM nginx:latest
#LABEL authors="ShadowWalker"
#
#COPY nginx.conf /etc/nginx/conf.d/nginx.conf
#COPY . /var/www/html
#
#WORKDIR /var/www/html

FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip

WORKDIR /var/www/html
