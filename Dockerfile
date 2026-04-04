FROM php:8.4-cli-alpine3.20

RUN apk add --no-cache \
  bash \
  curl-dev \
  freetype-dev \
  git \
  icu-dev \
  libjpeg-turbo-dev \
  libpng-dev \
  libxml2-dev \
  libzip-dev \
  oniguruma-dev \
  unzip \
  zlib-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-configure intl \
  && docker-php-ext-install -j"$(nproc)" curl gd intl mbstring xml zip

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www

ENTRYPOINT ["bash"]
