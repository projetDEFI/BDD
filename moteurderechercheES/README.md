# searchengine-php-es
Search engine based on Apache PHP and Elasticsearch


## Configuration:
L'ensemble de ce répertoire doit se retrouver dans /var/www/html/ pour être executer.

ETAPE À SUIVRE : 

Telecharger d'abord composer (c'est un gestionnaire de dépendance pour PHP) 
1) curl -s http://getcomposer.org/installer | php
2) ensuite créer un fichier json qui s'appelle composer.json (on indique les librairies qu'on veut telecharger pour l'execution de notre projet)
3) puis on fait php composer.phar install et  php composer.phar update 


## Fichier init.php ##

mainenant on a vendor/autoload.php
c'est un fichier qui permet de charger de façon dynamique les librairies 

On va créer un fichier init.php pour dire qu'on va se connecter à elasticsearch à partir de son localhost.
On n'oublie pas de démarrer celle-ci avec bin/elasticsearch


## Fichier index.php ##

Pour effectuer une recherche simple on a créer un formulaire php.
Cependant, pour interroger notre elastic search on devait faire des requêtes. 

Ainsi dans notre requête on a utilisé un booléen qui dit que : 
 -> si l'element que l'utilisateur a rentré correspond à un nom_projet alors tu m'affiches le nom_du projet 
 -> si l'element que l'utilisateur a rentré correspond à un mot dans l'objectif du projet alors tu m'affiches également le nom du projet avec l'objectif en dessous

## Fichier results.php ##

Ainsi, pour chaque mot clés trouvé ou nom de projet trouvé dans la base elasticsearch, on affiche le nom du projet (avec un lien hypertexte) suivi de son objectif.


## Fichier about.php ## 

J'ai également créer un fichier about pour qu'on se décrit un peu.
