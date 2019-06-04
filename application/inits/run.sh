#!/bin/sh

if [ ! -d /var/www/nginx/search ] ; then
  mkdir -p /var/www/nginx/search
  chown -R nginx:www-data /var/www/nginx/search
fi

# start php-fpm
if [ ! -d /var/log/php-fpm  ] ; then
  mkdir -p /var/log/php-fpm
  chown -R nginx:www-data /var/log/php-fpm
  php-fpm5
else
  php-fpm5
fi

# start nginx

if [ ! -d /var/log/nginx  ] ; then
  mkdir -p /var/log/nginx /tmp/nginx/body
  chown -R nginx:www-data /var/log/nginx /tmp/nginx/body
  nginx
else
  nginx
fi
