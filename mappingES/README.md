Etape 1 : faire sudo mysql puis taper les commandes suivantes 
CREATE DATABASE ecomdb;
USE ecomdb;

Etape 2: on remplit notre base de test "ecomdb"

CREATE TABLE customer (
id INT(6)  AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
regdate TIMESTAMP
);
INSERT INTO `ecomdb`.`customer` (`id`, `firstname`, `lastname`, `email`, `regdate`) VALUES (1, 'Roger', 'Federer', 'roger.federer@yomail.com', '2019-01-21 20:21:49');
INSERT INTO `ecomdb`.`customer` (`id`, `firstname`, `lastname`, `email`, `regdate`) VALUES (2, 'Rafael', 'Nadal', 'rafael.nadal@yomail.com', '2019-01-22 20:21:49');
INSERT INTO `ecomdb`.`customer` (`id`, `firstname`, `lastname`, `email`, `regdate`) VALUES (3, 'John', 'Mcenroe', 'john.mcenroe@yomail.com', '2019-01-23 20:21:49'); 
INSERT INTO `ecomdb`.`customer` (`id`, `firstname`, `lastname`, `email`, `regdate`) VALUES (4, 'Ivan', 'Lendl', 'ivan.lendl@yomail.com', '2019-01-23 23:21:49'); 
INSERT INTO `ecomdb`.`customer` (`id`, `firstname`, `lastname`, `email`, `regdate`) VALUES (5, 'Jimmy', 'Connors', 'jimmy.connors@yomail.com', '2019-01-23 22:21:49');

Etape 3 : On utilise le fichier test_mapping_1.conf pour faire le mapping 
Etape 4 : puis on fait bin/logstash -f test_mapping_1.conf => voir le résultat dans elasticsearch tools box


Etape 5 : on veut ajouter des infos sur cette base alors on execute les commandes suivantes:

CREATE TABLE orders (
orderid INT(6)  AUTO_INCREMENT PRIMARY KEY,
product VARCHAR(300) NOT NULL,
description VARCHAR(300) NOT NULL,
price int(6),
customerid int(6),
ordertime TIMESTAMP,
FOREIGN KEY fk_userid(customerid)
REFERENCES customer(id)
);
INSERT INTO `ecomdb`.`orders` (`orderid`, `product`, `description`, `price`, `customerid`,`ordertime`)
 VALUES (1, 'Tennis Ball', 'Wilson Australian Open', '330', '5','2019-01-22 20:21:49');
INSERT INTO `ecomdb`.`orders` (`orderid`, `product`, `description`, `price`, `customerid`,`ordertime`)
 VALUES (2, 'Head Xtra Damp Vibration Dampner', 'Dampens string vibration to reduce the risk of pain', '500', '4','2019-01-23 02:21:49');
 INSERT INTO `ecomdb`.`orders` (`orderid`, `product`, `description`, `price`, `customerid`,`ordertime`)
 VALUES (3, 'HEAD Wristband Tennis 2.5" (White)', '80 % Cotton, 15% Nylon, 5 % Rubber (Elasthan)', '530', '3','2019-01-21 21:21:49');
 INSERT INTO `ecomdb`.`orders` (`orderid`, `product`, `description`, `price`, `customerid`,`ordertime`)
 VALUES (4, 'YONEX VCORE Duel G 97 Alfa (290 g)', 'Head Size 97', '4780', '2','2019-01-22 14:21:49');
 INSERT INTO `ecomdb`.`orders` (`orderid`, `product`, `description`, `price`, `customerid`,`ordertime`)
 VALUES (5, 'Wilson Kaos Stroke - White & Black', 'Wilson Australian Open', '9000', '1','2019-01-25 03:53:49');
 
 Etape 6 : on va créer un fichier Ruby pour le filtre voir  " sampleRuby.rb " 
 Etape 7 : on met à jour de index avec bin/logstash -f test_mapping_2.conf