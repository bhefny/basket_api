FROM php:7.0-fpm

# Install dependencies
RUN apt-get update -qq
RUN apt-get install -y --no-install-recommends git curl zip unzip vim libpng-dev libjpeg-dev libfreetype6-dev libicu-dev libmcrypt-dev \
    && docker-php-ext-configure gd \
      --with-gd \
      --with-freetype-dir=/usr/include/ \
      --with-png-dir=/usr/include/ \
      --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) iconv mcrypt \
    && docker-php-ext-install \
      gd \
      pdo \
      pdo_mysql \
      mbstring \
      opcache \
      intl \
      exif \
      json \
      tokenizer

RUN  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN  php composer-setup.php --install-dir=/usr/local/bin/ --filename=composer
RUN  php -r "unlink('composer-setup.php');"


ENV APPDIR=/app
WORKDIR $APPDIR

ENTRYPOINT ["docker-entrypoint-dev.sh"]
