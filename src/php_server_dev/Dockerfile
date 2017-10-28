FROM php:7.1-fpm

MAINTAINER HayateTabata

RUN usermod -u 1000 www-data

RUN apt-get update \
  && apt-get install -y \
    libmcrypt-dev \
    zlib1g-dev \
    mysql-client \
    netcat \
    locales \
    libxml2-dev \
    libpng-dev \
    wget \
    xz-utils \
  && docker-php-ext-install -j$(nproc) \
    mcrypt \
    pdo_mysql \
    zip \
    soap \
    gd
RUN wget http://johnvansickle.com/ffmpeg/releases/ffmpeg-release-64bit-static.tar.xz \
      && tar Jxvf ./ffmpeg-release-64bit-static.tar.xz \
      && cp ./ffmpeg*64bit-static/ff* /usr/local/bin/

RUN pecl install xdebug \
  && rm -rf /tmp/pear \
  && echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20160303/xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini

RUN echo en_US.UTF-8 UTF-8 > /etc/locale.gen
RUN locale-gen en_US.UTF-8
RUN update-locale LANG=en_US.UTF-8
ENV LANG en_US.UTF-8
ENV LANGUAGE en_US:en
ENV LC_ALL en_US.UTF-8

WORKDIR /server

