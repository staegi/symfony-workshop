FROM composer AS composer_stage

FROM php:8.1-cli-alpine

COPY --from=composer_stage /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

RUN apk update && apk upgrade && apk add --no-cache unzip \
    && docker-php-ext-install pdo pdo_mysql \
	&& apk add --update --no-cache --virtual .build-dependencies $PHPIZE_DEPS \
	&& apk del .build-dependencies

COPY composer.json composer.lock ./
RUN /usr/bin/composer install --no-scripts

COPY . .
COPY .env.example ./.env

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 777 var/cache var/log

CMD ["php", "-S", "0.0.0.0:80"]