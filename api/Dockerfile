FROM php:7.3-fpm-alpine

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apk update
RUN apk add --no-cache bash
RUN apk add --no-cache vim
RUN apk add --no-cache curl
RUN apk add --no-cache openssl
RUN apk add --no-cache zip
RUN apk add --no-cache unzip
RUN apk add --no-cache libzip-dev
RUN apk add --no-cache git
RUN apk add --no-cache openssh-client
RUN apk add --no-cache libjpeg-turbo-dev
RUN apk add --no-cache libpng-dev
RUN apk add --no-cache freetype-dev

# Install extensions
RUN docker-php-ext-install pdo_mysql 
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install opcache

RUN docker-php-ext-configure zip 
RUN docker-php-ext-install zip

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --version=2.0.8 --filename=composer


# Add user for laravel application
RUN mkdir /home/www

RUN addgroup -S www 
RUN adduser -h /bin/bash -S www -G www --home /home/www

RUN chown -R www:www /home/www


ENV COMPOSER_HOME /home/www/.composer
# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

COPY ./.ssh /home/www/.ssh

COPY ./environment/php-fpm/www.conf /usr/local/etc/php-fpm.d/www.conf


# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]