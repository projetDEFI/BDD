<?php
try
{
	$bdd= new PDO("mysql:host=localhost;dbname=collaborav2","root", "");
}
catch (Exception $e)
{
	die("Erreur: ".$e->getMessage());
} 

echo "<HTML>
<HEAD> <TITLE> Suggérer une plateforme </TITLE>
<style>
.TabCommon {FONT: 18px Verdana; COLOR: #6D6D6D; PADDING: 5px; FONT-WEIGHT: bold; TEXT-ALIGN: center; HEIGHT: 30px; WIDTH: 1000px;}
.TabContent {PADDING: 5px;}
.TabContentBottom {PADDING: 10px; BORDER-BOTTOM: 2px outset #99ccff;}
.TabOff {CURSOR: hand; BACKGROUND-COLOR: #E2E2E3; BORDER-LEFT: 1px solid #BBBBBB;}
.TabOn {CURSOR: default; BORDER-TOP: 2px outset #D1D1D1; COLOR: #000000;}
.TabBorderBottom{BORDER-BOTTOM: 2px inset #D1D1D1;}
.TabActiveBorderLeftRight{BORDER-RIGHT: 2px outset #D1D1D1; BORDER-LEFT: 2px outset #D1D1D1;}
.TabActiveBackground {BACKGROUND-COLOR: #F7F8F3;}
</style> 
<script>
function TabClick( nTab ){
  Col = document.getElementsByName(\"Content\");
  for (i = 0; i < document.getElementsByName(\"Content\").length; i++)
      {
    document.getElementsByName(\"tabs\")[i].className = \"TabBorderBottom TabCommon TabOff\";
      document.getElementsByName(\"Content\")[i].style.display = \"none\";
    }
  document.getElementsByName(\"Content\")[nTab].style.display = \"block\";  
  document.getElementsByName(\"tabs\")[nTab].className = \"TabCommon TabOn TabActiveBackground TabActiveBorderLeftRight\";
}
</script>
  
</HEAD>
<BODY onload=\"TabClick(0);\">
 
 
  <TABLE CELLPADDING=0 CELLSPACING=0 ALIGN=\"center\" STYLE=\"width: 750px\">
      <TR>
          <TD CLASS=\"TabBorderBottom TabCommon TabOff\" id=\"tabs\" name=\"tabs\" ONCLICK=\"TabClick(0);\"><NOBR>Etape 1</NOBR></TD>
          <TD CLASS=\"TabBorderBottom TabCommon TabOff\" id=\"tabs\" name=\"tabs\" ONCLICK=\"TabClick(1);\"><NOBR>Etape 2</NOBR></TD>
          <TD CLASS=\"TabBorderBottom TabCommon TabOff\" id=\"tabs\" name=\"tabs\" ONCLICK=\"TabClick(2);\"><NOBR>Etape 3</NOBR></TD>
		  <TD CLASS=\"TabBorderBottom TabCommon TabOff\" id=\"tabs\" name=\"tabs\" ONCLICK=\"TabClick(3);\"><NOBR>Etape 4</NOBR></TD>
        <TD CLASS=\"TabBorderBottom\" STYLE=\"width: 50px;\"> </TD>
      </TR>
      <TR>
          <TD COLSPAN=5 CLASS=\"TabContent TabActiveBackground TabActiveBorderLeftRight\">
      <h1 STYLE=\"margin-bottom: -10px\" align=\"center\"> Suggerer une plateforme </h1>   
      </TD>
      </TR>
      <TR>
          <TD COLSPAN=5 CLASS=\"TabContent TabActiveBackground TabActiveBorderLeftRight TabContentBottom\">     
         <DIV id=\"Content\" name=\"Content\"> <h2> Etape 1/4 : Informations generales </h2> 

<FORM action=\"form-p2.php\" method=\"post\">" ;

#saisie du nom et de l'url
echo " <TABLE STYLE=\"width: 600px\"><TR><TD align=\"left\">Nom du projet : <INPUT type=\"text\" name=\"nom_projet\"></TD><TD align=\"right\">  Url: <INPUT type=\"text\" name=\"url_projet\" STYLE=\"width: 200px\"></TD></TR></TABLE>" ;


echo "<br> Domaine : " ;
$reponse= $bdd->query("SELECT * FROM domaine");
echo "<SELECT name=\"domaine\">\n" ; 
while ($donnees=$reponse->fetch())
{ 
	echo "<OPTION value={$donnees["id_domaine"]}> {$donnees["nom_domaine"]} 
</OPTION><br>" ;
} echo "</SELECT>" ;
$reponse->closeCursor(); 


echo "<br><br>Descriptif du projet : <br><textarea name=\descriptif\" cols=\"80\" rows=\"2.5\">Copier/coller le texte present sur la plateforme </textarea> "; 


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

echo "<br><br> Objectif(s) et enjeu(x) detailles <br><textarea name=\objectif_det\" cols=\"80\" rows=\"2.5\">Copier/coller le texte present sur la plateforme </textarea> "; 

echo "<br><br> Date de creation de la plateforme : " ;
echo "<input type=\"number\" min=\"1980\" max=\"2099\">";

echo " <br> <br> Statut de la plateforme : " ;
echo "       <input type=\"radio\" id=\"active\" name=\"statut\" value=\"Active\"> "; 
echo "       <label for=\"active\">Active</label> "; 
echo "       <input type=\"radio\" id=\"inactive\" name=\"statut\" value=\"Inactive\"> "; 
echo "       <label for=\"inactive\">Inactive depuis le</label> "; 
echo "       <input type=\"text\" id=\"inactiveValue\" name=\"inactive\"> "; 


echo "<br><br>Pilote(s) <INPUT type=\"text\" name=\"pilote\">" ;

echo "<br><br>Lieu du pilote : A VENIR";

echo "<br><br>Langue(s) du pilote <font color=\"grey\"> <i> <b>(restez appuyé sur CTRL pour sélectionner plusieurs choix)</b></i></font><br>" ; 
$reponse= $bdd->query('SELECT * FROM langue');
echo "<SELECT name=\"langue[]\" size=10 multiple>" ; 
while ($donnees=$reponse->fetch())
{ 
	echo "<OPTION value={$donnees["id_langue"]}> {$donnees["nom_langue"]} </OPTION>" ;
}
echo "</SELECT>" ;
$reponse->closeCursor(); 

echo "<br><br>Partenaire(s) : A VENIR" ; 
echo "<br><br>Financeur(s) : A VENIR " ; 
echo "<br><br>Instituton(s) concernée(s) : A VENIR" ; 

#https://www.toutjavascript.com/savoir/savoir06_3.php3 


# pour les petits i d'informations : https://openclassrooms.com/forum/sujet/afficher-masquer-en-un-clic-72651

echo "</DIV>

         <DIV id=\"Content\" name=\"Content\"><h2> Etape 2/4 : Contributeurs </h2>
Public visé : <br>
<textarea name=\public\" cols=\"80\" rows=\"1\">Copier/coller le texte present sur la plateforme </textarea> <br><br>
Conditions de contribution : <br>
<textarea name=\condition_contrib\" cols=\"80\" rows=\"1.5\"></textarea>  <br><br>	 
Compte contributeur : <input type=\"radio\" name=\"compte_contri\" value=\"1\"> Oui
<input type=\"radio\" name=\"compte_contri\" value=\"0\"> Non <br><br>
Historique de l'activité : <input type=\"radio\" name=\"historique\" value=\"1\"> Oui
<input type=\"radio\" name=\"historique\" value=\"0\"> Non <br><br>

Caractéristiques du profil contributeur : <br>
<textarea name=\carac_contributeur\" cols=\"80\" rows=\"1.5\"></textarea> <br><br>

Rémunération des contributeurs : <input type=\"radio\" name=\"remuneration\" value=\"1\"> Oui
<input type=\"radio\" name=\"remuneration\" value=\"0\"> Non <br><br>
Type de rémunération : <br>
<textarea name=\type_remuneration\" cols=\"80\" rows=\"1.5\"></textarea> <br><br>

Niveau de participation : <br> <input type=\"radio\" name=\"niveau_participation\" value=\"Crowdsourcing\"> Crowdsourcing
<input type=\"radio\" name=\"niveau_participation\" value=\"Science participative\"> Science participative
<input type=\"radio\" name=\"niveau_participation\" value=\"Intelligence distribuée\"> Intelligence distribuée
<input type=\"radio\" name=\"niveau_participation\" value=\"Collaboration complète\"> Collaboration complète <br><br>

Validation : <input type=\"radio\" name=\"validation\" value=\"1\"> Oui
<input type=\"radio\" name=\"validation\" value=\"0\"> Non <br><br>
Type de validation : <br>
<textarea name=\type_validation\" cols=\"80\" rows=\"1.5\"></textarea> <br><br>

Charte d'utilisation : <input type=\"radio\" name=\"charte\" value=\"1\"> Oui
<input type=\"radio\" name=\"charte\" value=\"0\"> Non <br><br>

Nombre d'utilisateurs : <input type=\"texte\" name=\"nombre_contributeur\">		</DIV> 
		 
		 
		 
         <DIV id=\"Content\" name=\"Content\"><h2> Etape 3/4 : Données </h2>
<br> Données entrées : <br>" ;
$reponse= $bdd->query('SELECT * FROM donnees_entrees') ; 
while ($donnees=$reponse->fetch())
{ echo "<INPUT type=\"checkbox\" name=\"donnees_entrees[]\" value={$donnees["id_donnees_entrees"]}>{$donnees["nom_donnees_entrees"]} " ;
}
$reponse->closeCursor(); 

echo "<br><br> Données produites : <br>" ;
$reponse= $bdd->query('SELECT * FROM donnees_produites') ; 
while ($donnees=$reponse->fetch())
{ echo "<INPUT type=\"checkbox\" name=\"donnees_produites[]\" value={$donnees["id_donnees_produites"]}>{$donnees["nom_donnees_produites"]} " ;
}
$reponse->closeCursor(); 	

echo "<br><br>Statut des données produites : " ;
$reponse= $bdd->query('SELECT * FROM statut_donnees_produites') ; 
while ($donnees=$reponse->fetch())
{ echo "<INPUT type=\"checkbox\" name=\"statut_donnees_produites[]\" value={$donnees["id_statut_donnees_produites"]}>{$donnees["nom_statut_donnees_produites"]} " ;
}
$reponse->closeCursor(); 

echo "<br><br>Tâche : <br>" ;
$reponse= $bdd->query('SELECT * FROM tache') ; 
while ($donnees=$reponse->fetch())
{ echo "<INPUT type=\"checkbox\" name=\"tache[]\" value={$donnees["id_tache"]}>{$donnees["nom_tache"]} " ;
}
$reponse->closeCursor(); 

echo "<br><br>Couverture géographique des données : A VENIR" ;		 

echo "<br><br>Couverture chronologique des données : A VENIR		 

<br><br> Degré d'avancement de la saisie : <br>
<textarea name=\degre_avancement\" cols=\"80\" rows=\"1.5\"></textarea>	" ; 	 
	
	
echo "        </DIV> <DIV id=\"Content\" name=\"Content\"><h2> Etape 4/4 : Dispositif - Interface </h2>
<fieldset>
        <legend><i>Données</i></legend>
Consultation des données : <input type=\"radio\" name=\"consulter_donnees\" value=\"1\"> Oui
<input type=\"radio\" name=\"consulter_donnees\" value=\"0\"> Non <br><br>	
Téléchargement des données : <input type=\"radio\" name=\"telecharger_donnees\" value=\"1\"> Oui
<input type=\"radio\" name=\"telecharger_donnees\" value=\"0\"> Non <br><br>
Statut des données téléchargées : <br>
<textarea name=\statut_donnees_telechargees\" cols=\"80\" rows=\"1.5\"></textarea>		 
</fieldset>
<br>Outils de communication interne : <br>
<textarea name=\outils_com_interne\" cols=\"80\" rows=\"1.5\"></textarea> <br><br>	 
Lien avec les médias sociaux : <input type=\"radio\" name=\"lien_medias_sociaux\" value=\"1\"> Oui
<input type=\"radio\" name=\"lien_medias_sociaux\" value=\"0\"> Non <br><br>		 
Préciser les médias sociaux : <br>
<textarea name=\media_sociaux_det\" cols=\"80\" rows=\"1.5\"></textarea> 
<br><br>
Lien avec le site web de l'institution : <input type=\"radio\" name=\"lien_institution\" value=\"1\"> Oui
<input type=\"radio\" name=\"lien_institution\" value=\"0\"> Non <br><br>	
Préciser le lien avec le site web de l'institution  : <br>
<textarea name=\lien_institution_det\" cols=\"80\" rows=\"1.5\">Sous quelle forme ? (Préciser l'url)</textarea> 	 
<br><br>Références bibliographiques  : <br>
<textarea name=\ref_biblio\" cols=\"80\" rows=\"1.5\"></textarea> 	

<br><br> <center><INPUT type=\"submit\" value=\"Valider et envoyer\" style=\"font-size:20px\"> </center> </form>	 
      </DIV> </TD>
      </TR>
  </TABLE>
 
</BODY>
</HTML> " ;

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
