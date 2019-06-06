<?php
require_once '../app/init.php';

try
{
  $bdd= new PDO("mysql:host=localhost;dbname=collabora","root", "");
}
catch (Exception $e)
{
  die("Erreur: ".$e->getMessage());
} 
echo "<HTML>
<HEAD> <TITLE>Collabora - Suggérer une plateforme </TITLE>
<META charset=\"utf-8\" />
<link rel=\"stylesheet\" href=\"../styles/form_style.css\" />
  <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css\">
  <link rel=\"stylesheet\" href=\"/resources/demos/style.css\">
  <link href=\"../css/bootstrap.min.css\" rel=\"stylesheet\">
  <script src=\"https://code.jquery.com/jquery-1.12.4.js\"></script>
  <script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
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
 
     function afficher_infobulle(aide) {
    if (aide.style.display == \"none\") aide.style.display = \"block\";
    else aide.style.display = \"none\";
    }
</script>    
</HEAD>
<BODY onload=\"TabClick(0);\">
  <div class=\"separator\"></div>
  <div id=\"header\">
    <a href=\"index.php\" class=\"title\">Collabora</a>
    <nav>
      <ul>
          <li><a href=\"form.php\">Contribuer</a></li>
          <li><a href=\"visualisation.php\">Visualiser</a></li>
          <li><a href=\"blog.php\">Blog</a></li>
          <li><a href=\"ressources.php\">Ressources</a></li>
      </ul>
    </nav>
    <div class=\"line\"></div>
  </div>
    <form action=\"results.php\" method=\"get\" autocomplete=\"off\">
      <div class=\"row\">
          <div class=\"col-lg-4 col-lg-offset-4\">
              <div class=\"input-group\">
                  <input type=\"text\" name=\"q\" placeholder=\"Recherchez un projet ou Tapez le nom d'un domaine\" class=\"form-control\" /> 
                  <span class=\"input-group-btn\"> 
                      <button type=\"submit\" class=\"btn btn-primary\">Rechercher </button>
                  </span>
              </div>
           </div>
      </div>
    </form>
  <!-- Menu de connexion -->
      <div class=\"login-container\"> 
        <form class=\"login\" action=\"connexion.php\">
          <input type=\"text\" placeholder=\"Username\" name=\"username\">
          <input type=\"text\" placeholder=\"Password\" name=\"psw\">
          <button class=\"login-button\" type=\"submit\">Login</button>
        </form>
      </div>
<!-- Bouton d'inscription -->
    <button class=\"signup-button\" onclick=\"document.getElementById('id01').style.display='block'\">Sign Up</button>
<!-- Fenêtre d'inscription -->
    <div id=\"id01\" class=\"modal\">
      <span onclick=\"document.getElementById('id01').style.display='none'\" class=\"close\" title=\"Close Modal\">X</span>
      <form class=\"modal-content\" action=\"\">
        <div class=\"container\">
          <h1>Sign Up</h1>
          <p>Remplissez ces champs pour vous créer un compte.</p>
          <hr>
          <label for=\"pseudo\"><b>Pseudo</b></label>
          <input type=\"text\" placeholder=\"Entrer votre pseudo\" name=\"pseudo\" required>

          <label for=\"psw\"><b>Mot de passe</b></label>
          <input type=\"password\" placeholder=\"Entrer votre mot de passe\" name=\"psw\" required>

          <label>
            <input type=\"checkbox\" checked=\"checked\" name=\"remember\" style=\"margin-bottom:15px\"> Remember me
          </label>

          <div class=\"clearfix\">
            <button class=\"popup\"type=\"button\" onclick=\"document.getElementById('id01').style.display='none'\" class=\"cancelbtn\">Cancel</button>
            <button class=\"popup\"type=\"submit\" class=\"signup\">Sign Up</button>
          </div>
        </div>
      </form>
    </div>
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
<FORM action=\"script/form_script.php\" method=\"post\">" ;
#saisie du nom et de l'url
echo " <TABLE STYLE=\"width: 600px\"><TR><TD align=\"left\">Nom du projet : <INPUT type=\"text\" name=\"nom_projet\"></TD><TD align=\"right\">  Url: <INPUT type=\"text\" name=\"url_projet\" STYLE=\"width: 200px\"></TD></TR></TABLE>" ;
echo "<br> Domaine : <table STYLE=\"width: 740px\">" ;
$reponse= $bdd->query('SELECT * FROM domaine') ; 
$i=0;
$max=2; 
while ($donnees=$reponse->fetch())
  {
if ($i > 0 && $i % 2 == 0)
    {
        echo '<tr>';
    }
  echo "<td>";
        echo "<INPUT type=\"checkbox\" name=\"domaine[]\" value={$donnees["id_domaine"]}>{$donnees["nom_domaine"]} ";
  echo"</td>";
  $i++;
  }
  echo "</tr> ";
$reponse->closeCursor(); 
echo "</table> " ; 
 
echo "<br><br>Descriptif du projet : <br><textarea name=\descriptif\" cols=\"80\" rows=\"2.5\">Copier/coller le texte present sur la plateforme </textarea> " ;
echo "<br><br> Objectif(s) <table STYLE=\"width: 500px\">" ;
$reponse= $bdd->query('SELECT * FROM objectif') ; 
$i=0;
$max=2; 
while ($donnees=$reponse->fetch())
  {
if ($i > 0 && $i % 2 == 0)
    {
        echo '<tr>';
    }
  echo "<td>";
        echo "<INPUT type=\"checkbox\" name=\"objectif[]\" value={$donnees["id_objectif"]}>{$donnees["nom_objectif"]} ";
  echo"</td>";
  $i++;
  }
  echo "</tr> ";
$reponse->closeCursor(); 
echo "</table> " ; 
echo "<br><br> Enjeu(x) <table STYLE=\"width: 550px\">" ;
$reponse= $bdd->query('SELECT * FROM enjeu') ; 
$i=0;
$max=2; 
while ($donnees=$reponse->fetch())
  {
if ($i > 0 && $i % 2 == 0)
    {
        echo '<tr>';
    }
  echo "<td>";
        echo "<INPUT type=\"checkbox\" name=\"enjeu[]\" value={$donnees["id_enjeu"]}>{$donnees["nom_enjeu"]} ";
  echo"</td>";
  $i++;
  }
  echo "</tr> ";
$reponse->closeCursor(); 
echo "</table> " ; 
echo "<br><br> Objectif(s) et enjeu(x) detailles <br><textarea name=\objectif_det\" cols=\"80\" rows=\"2.5\">Copier/coller le texte present sur la plateforme </textarea> "; 
echo "<br><br> Date de creation de la plateforme : " ;
echo "<input type=\"number\" min=\"1980\" max=\"2099\">";
echo " <br> <br> Statut de la plateforme : " ;
echo "       <input type=\"radio\" id=\"active\" name=\"statut\" value=\"Active\"> "; 
echo "       <label for=\"active\">Active</label> "; 
echo "       <input type=\"radio\" id=\"inactive\" name=\"statut\" value=\"Inactive\"> "; 
echo "       <label for=\"inactive\">Inactive depuis le</label> "; 
echo "       <input type=\"text\" id=\"inactiveValue\" name=\"inactive\"> "; 
echo " <br><br><div class=\"ui-widget\">
  <label for=\"pilote\">Pilote(s) : </label>
  <input id=\"pilote\" size=\"70\"> 
</div>";
#A VOIR : SI CHAQUE CHAMP d'AUTOCOMPLETION EST ENSUITE ENREGISTRE INDEPENDAMENT DES AUTRES (faire tests avec echo)
echo "<br>Lieu du pilote : A VENIR";
echo "<br><br>Langue(s) du pilote <font color=\"grey\"> <i> <b>(restez appuyé sur CTRL pour sélectionner plusieurs choix)</b></i></font> 
    <img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Info_icon_002.svg/1200px-Info_icon_002.svg.png\" class=\"infobulle-icone\" onmouseover=\"javascript: afficher_infobulle(document.getElementById('aide1'));\" onmouseout=\"javascript: afficher_infobulle(document.getElementById('aide1'));\" width=\"15\" height=\"15\">
    <div class=\"infobulle\">
    <div class=\"infobulle-texte\" id=\"aide1\" style=\"display: none;\"> Dans quelle(s) langue(s) la plateforme est-elle disponible (interface)?
    </div>
    </div>  
  <br>" ; 
$reponse= $bdd->query('SELECT * FROM langue');
echo "<SELECT name=\"langue[]\" size=10 multiple>" ; 
while ($donnees=$reponse->fetch())
{ 
  echo "<OPTION value={$donnees["id_langue"]}> {$donnees["nom_langue"]} </OPTION>" ;
}
echo "</SELECT>" ;
$reponse->closeCursor(); 
echo " <br><br><div class=\"ui-widget\">
  <label for=\"partenaire\">Partenaire(s) : </label>
  <input id=\"partenaire\" size=\"70\"> 
</div>";
#A VOIR : SI CHAQUE CHAMP d'AUTOCOMPLETION EST ENSUITE ENREGISTRE INDEPENDAMENT DES AUTRES (faire tests avec echo)
echo " <br><br><div class=\"ui-widget\">
  <label for=\"financeur\">Financeur(s) : </label>
  <input id=\"financeur\" size=\"70\"> 
</div>";
#A VOIR : SI CHAQUE CHAMP d'AUTOCOMPLETION EST ENSUITE ENREGISTRE INDEPENDAMENT DES AUTRES (faire tests avec echo)
echo " <br><br><div class=\"ui-widget\">
  <label for=\"institution\">Institution(s) concernée(s) : </label>
  <input id=\"institution\" size=\"70\"> 
</div>";
#A VOIR : SI CHAQUE CHAMP d'AUTOCOMPLETION EST ENSUITE ENREGISTRE INDEPENDAMENT DES AUTRES (faire tests avec echo) 
echo "</DIV>
         <DIV id=\"Content\" name=\"Content\"><h2> Etape 2/4 : Contributeurs </h2>
Public visé : <br>
<textarea name=\public\" cols=\"80\" rows=\"1\">Copier/coller le texte present sur la plateforme </textarea> <br><br>
Conditions de contribution : 
    <img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Info_icon_002.svg/1200px-Info_icon_002.svg.png\" class=\"infobulle-icone\" onmouseover=\"javascript: afficher_infobulle(document.getElementById('aide2'));\" onmouseout=\"javascript: afficher_infobulle(document.getElementById('aide2'));\" width=\"15\" height=\"15\">
    <div class=\"infobulle\">
    <div class=\"infobulle-texte\" id=\"aide2\" style=\"display: none;\"> 
  Quelles sont les compétences ou conditions exigées pour le contributeur ? (par exemple: Parrainage / Savoir / Compétences /Jugement / Production de connaissances)
    </div>
    </div>  <br>
<textarea name=\condition_contrib\" cols=\"80\" rows=\"1.5\"></textarea>  <br><br>   
Compte contributeur : <input type=\"radio\" name=\"compte_contri\" value=\"1\"> Oui
<input type=\"radio\" name=\"compte_contri\" value=\"0\"> Non <br><br>
Historique de l'activité : <input type=\"radio\" name=\"historique\" value=\"1\"> Oui
<input type=\"radio\" name=\"historique\" value=\"0\"> Non <br><br>
Caractéristiques du profil contributeur 
    <img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Info_icon_002.svg/1200px-Info_icon_002.svg.png\" class=\"infobulle-icone\" onmouseover=\"javascript: afficher_infobulle(document.getElementById('aide3'));\" onmouseout=\"javascript: afficher_infobulle(document.getElementById('aide3'));\" width=\"15\" height=\"15\">
    <div class=\"infobulle\">
    <div class=\"infobulle-texte\" id=\"aide3\" style=\"display: none;\"> Préciser les caractéristiques du profil (nom, photo, points…)
    </div>
    </div>  <br>
<textarea name=\carac_contributeur\" cols=\"80\" rows=\"1.5\"></textarea> <br><br>
Rémunération des contributeurs : <input type=\"radio\" name=\"remuneration\" value=\"1\"> Oui
<input type=\"radio\" name=\"remuneration\" value=\"0\"> Non <br><br>
Type de rémunération : 
    <img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Info_icon_002.svg/1200px-Info_icon_002.svg.png\" class=\"infobulle-icone\" onmouseover=\"javascript: afficher_infobulle(document.getElementById('aide4'));\" onmouseout=\"javascript: afficher_infobulle(document.getElementById('aide4'));\" width=\"15\" height=\"15\">
    <div class=\"infobulle\">
    <div class=\"infobulle-texte\" id=\"aide4\" style=\"display: none;\"> 
  Par exemple : Monétaire, échange, droit d'accès...
    </div>
    </div>  <br>
<textarea name=\type_remuneration\" cols=\"80\" rows=\"1.5\"></textarea> <br><br>
Niveau de participation : <br> <TABLE STYLE=\"width: 500px\"> <TR> <TD><p onmouseover=\"javascript: afficher_infobulle(document.getElementById('aide_crowd'));\" onmouseout=\"javascript: afficher_infobulle(document.getElementById('aide_crowd'));\" width=\"15\" height=\"15\"><input type=\"radio\" name=\"niveau_participation\" value=\"Crowdsourcing\">
 Crowdsourcing       <span class=\"infobulle\">
    <span class=\"infobulle-texte\" id=\"aide_crowd\" style=\"display: none;\"> 
  Les citoyens contribuent comme capteurs de données <i>(sensors)</i></span>
</span> </p></TD> <TD>
<p onmouseover=\"javascript: afficher_infobulle(document.getElementById('aide_sci'));\" onmouseout=\"javascript: afficher_infobulle(document.getElementById('aide_sci'));\" width=\"15\" height=\"15\"><input type=\"radio\" name=\"niveau_participation\" value=\"Science participative\"> Science participative <span class=\"infobulle\">
    <span class=\"infobulle-texte\" id=\"aide_sci\" style=\"display: none;\"> 
  Les citoyens contribuent à la définition du problème et à la collecte de données.</span>
</span> </p>
 </TD> </TR> <TR> <TD>
<p onmouseover=\"javascript: afficher_infobulle(document.getElementById('aide_int'));\" onmouseout=\"javascript: afficher_infobulle(document.getElementById('aide_int'));\" width=\"15\" height=\"15\"><input type=\"radio\" name=\"niveau_participation\" value=\"Intelligence distribuée\"> Intelligence distribuée <span class=\"infobulle\">
    <span class=\"infobulle-texte\" id=\"aide_int\" style=\"display: none;\"> 
  Les citoyens contribuent à l’interprétation de données.</span>
</span> </p>
</TD><TD><p onmouseover=\"javascript: afficher_infobulle(document.getElementById('aide_collab'));\" onmouseout=\"javascript: afficher_infobulle(document.getElementById('aide_collab'));\" width=\"15\" height=\"15\"><input type=\"radio\" name=\"niveau_participation\" value=\"Collaboration complète\"> Collaboration complète <span class=\"infobulle\">
    <span class=\"infobulle-texte\" id=\"aide_collab\" style=\"display: none;\"> 
  La recherche est collaborative dans les différentes phases (définition des problèmes, collecte de données, analyse).</span>
</span> </p> </TD></TR></TABLE> <br>
Validation : <input type=\"radio\" name=\"validation\" value=\"1\"> Oui
<input type=\"radio\" name=\"validation\" value=\"0\"> Non <br><br>
Type de validation : 
    <img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Info_icon_002.svg/1200px-Info_icon_002.svg.png\" class=\"infobulle-icone\" onmouseover=\"javascript: afficher_infobulle(document.getElementById('aide5'));\" onmouseout=\"javascript: afficher_infobulle(document.getElementById('aide5'));\" width=\"15\" height=\"15\">
    <div class=\"infobulle\">
    <div class=\"infobulle-texte\" id=\"aide5\" style=\"display: none;\"> 
  Décrire les modes de validation (par les pairs, par l'institution, etc.). Préciser si enrichissement supplémentaire par l'institution.
    </div>
    </div>  <br>
<textarea name=\type_validation\" cols=\"80\" rows=\"1.5\"></textarea> <br><br>
Charte d'utilisation : <input type=\"radio\" name=\"charte\" value=\"1\"> Oui
<input type=\"radio\" name=\"charte\" value=\"0\"> Non <br><br>
Nombre d'utilisateurs : <input type=\"texte\" name=\"nombre_contributeur\">   </DIV> 
     
     
     
         <DIV id=\"Content\" name=\"Content\"><h2> Etape 3/4 : Données </h2>
     
<br> Données entrées : <table STYLE=\"width: 385px\">" ;
$reponse= $bdd->query('SELECT * FROM donnees_entrees') ; 
$i=0;
$max=2; 
while ($donnees=$reponse->fetch())
  {
if ($i > 0 && $i % 2 == 0)
    {
        echo '<tr>';
    }
  echo "<td>";
        echo "<INPUT type=\"checkbox\" name=\"donnees_entrees[]\" value={$donnees["id_donnees_entrees"]}>{$donnees["nom_donnees_entrees"]} ";
  echo"</td>";
  $i++;
  }
  echo "</tr> ";
$reponse->closeCursor(); 
echo "</table> " ; 
 
echo "<br><br> Données produites : <table STYLE=\"width: 500px\">" ;
$reponse= $bdd->query('SELECT * FROM donnees_produites') ; 
$i=0;
$max=2; 
while ($donnees=$reponse->fetch())
  {
if ($i > 0 && $i % 2 == 0)
    {
        echo '<tr>';
    }
  echo "<td>";
        echo "<INPUT type=\"checkbox\" name=\"donnees_produites[]\" value={$donnees["id_donnees_produites"]}>{$donnees["nom_donnees_produites"]} ";
  echo"</td>";
  $i++;
  }
  echo "</tr> ";
$reponse->closeCursor(); 
echo "</table> " ; 
echo "<br><br>Statut des données produites : <table STYLE=\"width: 520px\">" ;
$reponse= $bdd->query('SELECT * FROM statut_donnees_produites') ; 
$i=0;
$max=3; 
while ($donnees=$reponse->fetch())
  {
if ($i > 0 && $i % 3 == 0)
    {
        echo '<tr>';
    }
  echo "<td>";
        echo "<INPUT type=\"checkbox\" name=\"statut_donnees_produites[]\" value={$donnees["id_statut_donnees_produites"]}>{$donnees["nom_statut_donnees_produites"]} ";
  echo"</td>";
  $i++;
  }
  echo "</tr> ";
$reponse->closeCursor(); 
echo "</table> " ; 
echo "<br><br>Tâche : <br> <table STYLE=\"width: 500px\">" ;
$reponse= $bdd->query('SELECT * FROM tache') ; 
$i=0;
$max=3; 
while ($donnees=$reponse->fetch())
  {
if ($i > 0 && $i % 3 == 0)
    {
        echo '<tr>';
    }
  echo "<td>";
        echo "<INPUT type=\"checkbox\" name=\"tache[]\" value={$donnees["id_tache"]}>{$donnees["nom_tache"]} ";
  echo"</td>";
  $i++;
  }
  echo "</tr> ";
$reponse->closeCursor(); 
echo "</table> " ; 
echo "<br><br>Couverture géographique des données : A VENIR" ;     
echo "<br><br>Couverture chronologique des données : A VENIR     
<br><br> Degré d'avancement de la saisie : <br>
<textarea name=\degre_avancement\" cols=\"80\" rows=\"1.5\"></textarea> " ;    
  
  
echo "        </DIV> <DIV id=\"Content\" name=\"Content\"><h2> Etape 4/4 : Dispositif - Interface </h2>
<fieldset>
        <legend>Données</legend>
Consultation des données : <input type=\"radio\" name=\"consulter_donnees\" value=\"1\"> Oui
<input type=\"radio\" name=\"consulter_donnees\" value=\"0\"> Non <br><br>  
Téléchargement des données : <input type=\"radio\" name=\"telecharger_donnees\" value=\"1\"> Oui
<input type=\"radio\" name=\"telecharger_donnees\" value=\"0\"> Non <br><br>
Statut des données téléchargées : <br>
<textarea name=\statut_donnees_telechargees\" cols=\"80\" rows=\"1.5\"></textarea>     
</fieldset>
<br>Outils de communication interne : 
    <img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Info_icon_002.svg/1200px-Info_icon_002.svg.png\" class=\"infobulle-icone\" onmouseover=\"javascript: afficher_infobulle(document.getElementById('aide6'));\" onmouseout=\"javascript: afficher_infobulle(document.getElementById('aide6'));\" width=\"15\" height=\"15\">
    <div class=\"infobulle\">
    <div class=\"infobulle-texte\" id=\"aide6\" style=\"display: none;\"> 
  Y a-t-il des outils de communication intégrés à la plateforme ? Qui peut communiquer avec qui ?
    </div>
    </div>  <br>
<textarea name=\outils_com_interne\" cols=\"80\" rows=\"1.5\"></textarea> <br><br>   
Lien avec les médias sociaux : <input type=\"radio\" name=\"lien_medias_sociaux\" value=\"1\"> Oui
<input type=\"radio\" name=\"lien_medias_sociaux\" value=\"0\"> Non <br><br>     
Préciser les médias sociaux : 
    <img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Info_icon_002.svg/1200px-Info_icon_002.svg.png\" class=\"infobulle-icone\" onmouseover=\"javascript: afficher_infobulle(document.getElementById('aide7'));\" onmouseout=\"javascript: afficher_infobulle(document.getElementById('aide7'));\" width=\"15\" height=\"15\">
    <div class=\"infobulle\">
    <div class=\"infobulle-texte\" id=\"aide7\" style=\"display: none;\"> 
  Préciser s'il y a des hashtags, pages FB ou autres utilisés par les contributeurs (préciser l'url)
    </div>
    </div>  <br>
<textarea name=\media_sociaux_det\" cols=\"80\" rows=\"1.5\"></textarea> 
<br><br>
Lien avec le site web de l'institution 
    <img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Info_icon_002.svg/1200px-Info_icon_002.svg.png\" class=\"infobulle-icone\" onmouseover=\"javascript: afficher_infobulle(document.getElementById('aide8'));\" onmouseout=\"javascript: afficher_infobulle(document.getElementById('aide8'));\" width=\"15\" height=\"15\">
    <div class=\"infobulle\">
    <div class=\"infobulle-texte\" id=\"aide8\" style=\"display: none;\"> 
  Y a-t-il une valorisation des résultats sur le site de l'institution ?
    </div>
    </div> <br><input type=\"radio\" name=\"lien_institution\" value=\"1\"> Oui
<input type=\"radio\" name=\"lien_institution\" value=\"0\"> Non <br><br> 
Préciser le lien avec le site web de l'institution  : <br>
<textarea name=\lien_institution_det\" cols=\"80\" rows=\"1.5\">Sous quelle forme ? (Préciser l'url)</textarea>    
<br><br>Références bibliographiques  : <br>
<textarea name=\ref_biblio\" cols=\"80\" rows=\"1.5\"></textarea>   
<br><br> <center><INPUT type=\"submit\" value=\"Valider et envoyer\" style=\"font-size:20px\"> </center> </form>   
      </DIV> </TD>
      </TR>
  </TABLE>

    <!-- Pied de page -->
    <footer> 
      <ul>
            <li><a href=\"credits.php\">Credits</a></li>
            <li><a href=\"contact.php\">Contact</a></li>
            <li><a href=\"blog.php\">Blog</a></li> 
         </ul> 
    </footer>
</BODY>
</HTML> " ;

if(isset($_GET['q'])) {

  $q = $_GET['q'];

  $query = $es->search([
    'body' => [
        'query' => [
            'bool' => [
          'should' => [
        [ "match" => ["nom_projet" => $q]],
        [ "match" => ["nom_domaine" => $q]]
    
          ]
        ]
                ]
      ]
  ]);

  if($query['hits']['total'] >=1 ) {

    $results = $query['hits']['hits'];
  }
}

?>

<script type="text/javascript">
var inactiveCheckbox = document.querySelector('input[value="Inactive"]');
var inactiveText = document.querySelector('input[id="inactiveValue"]');
inactiveText.style.visibility = 'hidden';
inactiveCheckbox.onchange = function() {
  if(inactiveCheckbox.checked) {
    inactiveText.style.visibility = 'visible';
    inactiveText.value = '';
  } else {
    inactiveText.style.visibility = 'hidden';
  }
};
  $( function() {
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#pilote" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "institutions.php", {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );
  
  
  
    $( function() {
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#financeur" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "institutions.php", {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );
  
  
  
    $( function() {
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#partenaire" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "institutions.php", {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );
  
  
    $( function() {
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#institution" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "institutions.php", {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );
</script>