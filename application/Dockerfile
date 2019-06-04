FROM alpine:edge

RUN apk update \ 
    && apk add bash nginx ca-certificates \
    php5-fpm php5-json php5-zlib php5-xml \
    php5-pdo php5-phar php5-openssl php5-pdo_mysql \
    php5-mysqli php5-gd php5-curl php5-iconv php5-mcrypt \
    git wget curl \ 
    && update-ca-certificates \
    && apk add openssl \
    && apk add -u musl

RUN mkdir -p /var/www/nginx/search /var/log/nginx /tmp/nginx/body 

ADD configs/nginx.conf /etc/nginx/
ADD configs/php-fpm.conf /etc/php5/
ADD inits/run.sh /
ADD . /var/www/nginx/search

RUN chown -R nginx:www-data /var/www/nginx/search /var/log/nginx /tmp/nginx/body

WORKDIR /var/www/nginx/search

RUN curl -s http://getcomposer.org/installer | php5 \
    && php5 composer.phar install --no-dev

RUN rm -rf /var/cache/apk/*
RUN chmod +x /run.sh

CMD ["/run.sh"]
