FROM php:7.2-apache

RUN apt-get update \
    && apt-get install -y libpq-dev git zlib1g-dev unzip libxml2-dev libfreetype6-dev libpng-dev libjpeg-dev \
    && docker-php-ext-install gd exif pdo pdo_pgsql zip soap intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update \
    && apt-get install -y --no-install-recommends openssh-server \
    && echo "root:Docker!" | chpasswd
COPY docker/sshd_config /etc/ssh/sshd_config
COPY docker/entrypoint.sh /entrypoint.sh

#ENV POSTGRES_USER   'USER'
#ENV POSTGRES_PASS   'PASS'
#ENV POSTGRES_HOST   'HOST'
#ENV POSTGRES_PORT   '5432'
#ENV POSTGRES_DB     'DB'
ENV APP_ENV         'dev'
ENV APP_SECRET      'dev'
ENV APP_DEBUG       '0'
ENV MAILER_URL      'smtp://localhost'

# Computed from above vars
#ENV DATABASE_URL "postgres://${POSTGRES_USER}:${POSTGRES_PASS}@${POSTGRES_HOST}:${POSTGRES_PORT}/${POSTGRES_DB}"

COPY docker/php-env.conf /etc/apache2/conf-available/
RUN a2enmod env
RUN a2enmod rewrite
RUN a2enconf php-env
# Point DocumentRoot to the app's public folder
ENV APP_HOME /app
ENV APP_DOCUMENT_ROOT /app
RUN sed -ri -e 's!/var/www/html!${APP_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APP_HOME}!g' \
    /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install NodeJS
RUN apt-get update \
    && apt-get install gnupg -y \
    && curl -sL https://deb.nodesource.com/setup_10.x | bash - \
    && apt-get install -y nodejs build-essential nasm libtool pkg-config automake \
    && npm install -g yarn

WORKDIR /app
RUN chown www-data /app /var/www

USER www-data
COPY --chown=www-data package.json yarn.lock ./
RUN yarn install

COPY --chown=www-data . .
RUN composer install # --no-dev
RUN yarn build

USER root
EXPOSE 80 2222

ENTRYPOINT ["/entrypoint.sh"]
CMD ["apache2-foreground"]

