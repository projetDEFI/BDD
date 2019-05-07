<?php

echo " <h1> Suggerer une plateforme </h1> <br>" ;
echo " <h2> Etape 1/4 : Informations generales </h2> <br>" ;
echo "<FORM action=\"affichageinscrits-traitement.php\" method=\"post\">" ;

try
{
	$bdd= new PDO("mysql:host=localhost;dbname=collaborav2","root", "");
}
catch (Exception $e)
{
	die("Erreur: ".$e->getMessage());
} 

echo "<FORM action=\"suggestion1.php\" method=\"post\">" ;

#saisie du nom et de l'url
echo "Nom du projet : <INPUT type=\"text\" name=\"nom_projet\"> <br><br>" ;
echo "Url: <INPUT type=\"text\" name=\"url_projet\">" ;


echo "<br><br> Domaine <br>" ;
$reponse= $bdd->query("SELECT * FROM domaine");
echo "<SELECT name=\"domaine\">\n" ; 
while ($donnees=$reponse->fetch())
{ 
	echo "<OPTION value={$donnees["id_domaine"]}> {$donnees["nom_domaine"]} 
</OPTION><br>" ;
} echo "</SELECT>" ;
$reponse->closeCursor(); 


echo "<br><br>Descriptif du projet : <br><textarea name=\descriptif\" cols=\"80\" rows=\"5\">Copier/coller le texte present sur la plateforme </textarea> "; 


#<input type=button onMouseOver="document.all.texte.innerText='Salut !'" value="Ok !">
#<p id="texte"></p>

#https://www.developpez.net/forums/d109120/javascript/general-javascript/afficher-texte-survol-souris/
# OU
#  https://forum.hardware.fr/hfr/Programmation/HTML-CSS-Javascript/formulaire-texte-disparait-sujet_130483_1.htm
#https://www.commentcamarche.net/forum/affich-9962021-valeur-d-un-formulaire-qui-s-efface-au-clic


echo "<br><br> Objectif(s) <br>" ;
$reponse= $bdd->query('SELECT * FROM objectif') ; 
while ($donnees=$reponse->fetch())
{ echo "<INPUT type=\"checkbox\" name=\"form_obj[]\" value={$donnees["id_objectif"]}>{$donnees["nom_objectif"]} " ;
}
$reponse->closeCursor(); 


echo "<br><br> Enjeu(x) <br>" ;
$reponse= $bdd->query('SELECT * FROM enjeu') ; 
while ($donnees=$reponse->fetch())
{ echo "<INPUT type=\"checkbox\" name=\"form_enj[]\" value={$donnees["id_enjeu"]}>{$donnees["nom_enjeu"]} " ;
}
$reponse->closeCursor(); 


echo "<br><br> Objectif(s) et enjeu(x) detailles <br><textarea name=\objectif_det\" cols=\"80\" rows=\"5\">Copier/coller le texte present sur la plateforme </textarea> "; 


echo "<br><br> Date de creation de la plateforme<br>" ;
echo "<input type=\"number\" min=\"1980\" max=\"2099\">";
  // On obtient l'année courante
  # var date = new Date();
  # var year = date.getFullYear();


echo " <br> <br> Statut de la plateforme<br>" ;
echo "       <input type=\"radio\" id=\"active\" name=\"statut\" value=\"Active\"> "; 
echo "       <label for=\"active\">Active</label> "; 
echo "       <input type=\"radio\" id=\"inactive\" name=\"statut\" value=\"Inactive\"> "; 
echo "       <label for=\"inactive\">Inactive depuis le</label> "; 
echo "       <input type=\"text\" id=\"inactiveValue\" name=\"inactive\"> "; 





echo "<br><br>Pilote(s) " ; 

#Reste : Lieu du pilote, langue du pilote, partenaires, financeurs, institution(s) concernée(s)

#https://www.toutjavascript.com/savoir/savoir06_3.php3 


# pour les petits i d'informations : https://openclassrooms.com/forum/sujet/afficher-masquer-en-un-clic-72651



#<input type="date" name="anniversaire">


?>

<script type="text/javascript">

var inactiveCheckbox = document.querySelector('input[value="Inactive"]');
var inactiveText = document.querySelector('input[id="inactiveValue"]');
inactiveText.style.visibility = 'hidden';

inactiveCheckbox.onchange = function() {
  if(inactiveCheckbox.checked) {
    inactiveText.style.visibility = 'visible';
    inactiveText.value = '';  <!-- mais comment faire en sorte que le texte rentré ici s'enregistre dans date_inactive ??? -->
  } else {
    inactiveText.style.visibility = 'hidden';
  }
};
</script>