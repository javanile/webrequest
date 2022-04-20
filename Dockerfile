FROM php:8-apache

RUN apt-get update && \
    apt-get install --no-install-recommends -y libzip-dev zip unzip libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
    docker-php-ext-install zip gd

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN a2enmod rewrite

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

COPY docker-entrypoint.sh /usr/local/bin/webrequest-entrypoint
COPY public/ /var/www/html/public/
COPY vendor/ /var/www/html/vendor/
COPY webrequest.php webrequest-*.php /var/www/html/
RUN chmod +x /usr/local/bin/webrequest-entrypoint

CMD ["apache2-foreground"]
ENTRYPOINT ["webrequest-entrypoint"]
