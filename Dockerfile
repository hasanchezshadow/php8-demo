#FROM nginx:latest
#LABEL authors="ShadowWalker"
#
#COPY nginx.conf /etc/nginx/conf.d/nginx.conf
#COPY . /var/www/html
#
#WORKDIR /var/www/html

FROM nasqueron/nginx-php-fpm:latest
COPY nginx.conf /etc/nginx/conf.d/nginx.conf
COPY . /var/www/html

WORKDIR /var/www/html
