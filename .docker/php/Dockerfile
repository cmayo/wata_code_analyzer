FROM php:8.2
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apt-get update && apt-get -y install libzip-dev libicu-dev
RUN docker-php-ext-install mysqli zip intl
RUN pecl install xdebug-3.2.0
RUN docker-php-ext-enable xdebug
WORKDIR /app

ARG UID=1000
ARG USER=php

RUN adduser $USER --disabled-password --home /$USER --uid $UID

COPY ./xdebug.ini /usr/local/etc/php/conf.d/99_xdebug.ini

CMD ["tail", "-f", "/dev/null"]