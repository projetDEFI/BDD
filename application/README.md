# searchengine-php-es
Search engine based on Apache PHP and Elasticsearch

demo: http://search.ruanbekker.com

## Configuration:

set your elasticsearch domain under `app/init.php` and
set your index details under `add.php`

## Running on Docker:

```
$ git clone https://gitlab.com/rbekker87/searchengine-php-es
$ cd searchengine-php-es
$ docker build -t searchengine-php-es .
$ docker run --name searchengine-php-es -itd -p 80:80 searchengine-php-es
```

## Running on RHEL

```bash
$ git clone https://gitlab.com/rbekker87/searchengine-php-es
$ cd searchengine-php-es
```

Dependencies:

```bash
$ yum update -y
$ yum install curl -y
$ mkdir /var/www/html/php-es
$ cd /var/www/html/php-es

$ curl -s http://getcomposer.org/installer | php

$ php composer.phar install
$ php composer.phar install --no-dev

$ yum install php54 -y

$ mkdir {js,css,images}

$ wget -O css/bootstrap.min.css https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css
$ wget -O js/bootstrap.min.js "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
$ wget -O js/jquery.min.js https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js
$ wget -O css/starter-template.css http://v4-alpha.getbootstrap.com/examples/starter-template/starter-template.css
$ wget -O images/favicon.png http://www.faviconshut.com/pics/7/7185-search-engine-submissions-script-is-a-very-effective-webmaster-tool-favicon.png
# wget -O images/header-logo.png https://s3-eu-west-1.amazonaws.com/ruanbekker.repo/content/web/images/search-rb-logo.png

```

