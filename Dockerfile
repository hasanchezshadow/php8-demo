FROM php:latest
LABEL authors="ShadowWalker"

FROM php:latest

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY start-apache /usr/local/bin
RUN sudo a2enmod rewrite

# Copy application source
COPY ./ /var/www/
RUN chown -R www-data:www-data /var/www

CMD ["start-apache"]


ENTRYPOINT ["top", "-b"]