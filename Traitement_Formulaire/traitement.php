<?php

$nom_projet = $_POST['nom_projet'] ;
$url = $_POST['url_projet'] ;
$domaine = $_POST['domaine'] ;
$descriptif = $_POST['descriptif'] ;
$objectif = $_POST['objectif'] ;
$enjeu = $_POST['enjeu'] ;
$objectif_det = $_POST['objectif_det'] ;

if (isset($_POST['date_creation']) && ($_POST['date_creation'] != ''))
{
    $date_creation = $_POST['date_creation'];
}
else
{
    $date_creation = null;
}

$statut = $_POST['statut'] ;

if (isset($_POST['inactive']) && ($_POST['inactive'] != ''))
{
    $date_inactive = $_POST['inactive'];
}
else
{
    $date_inactive = null;
}

$pilote = $_POST['pilote'] ;

if (isset($_POST['lieupilote']) && ($_POST['lieupilote'] != ''))
{
    $lieu_pilote = $_POST['lieupilote'];
}
else
{
    $lieu_pilote = null;
}

$langue = $_POST['langue'] ;


if (isset($_POST['partenaire']) && ($_POST['partenaire'] != ''))
{
    $partenaire = $_POST['partenaire'];
}
else
{
    $partenaire = null;
}

if (isset($_POST['financeur']) && ($_POST['financeur'] != ''))
{
    $financeur = $_POST['financeur'];
}
else
{
    $financeur = null;
}



$institution = $_POST['institution'] ;
$public = $_POST['public'] ;
$condition_contrib = $_POST['condition_contrib'] ;
$compte_contri = $_POST['compte_contri'] ;
$historique = $_POST['historique'] ;

if (isset($_POST['carac_contributeur']) && ($_POST['carac_contributeur'] != ''))
{
    $carac_contributeur = $_POST['carac_contributeur'];
}
else
{
    $carac_contributeur = null;
}

$remuneration = $_POST['remuneration'] ;

if (isset($_POST['type_remuneration']) && ($_POST['type_remuneration'] != ''))
{
    $type_remuneration = $_POST['type_remuneration'];
}
else
{
    $type_remuneration = null;
}

$niveau_participation = $_POST['niveau_participation'] ;
$validation = $_POST['validation'] ;

if (isset($_POST['type_validation']) && ($_POST['type_validation'] != ''))
{
    $type_validation = $_POST['type_validation'];
}
else
{
    $type_validation = null;
}

$charte = $_POST['charte'] ;

if (isset($_POST['nombre_contributeur']) && ($_POST['nombre_contributeur'] != ''))
{
    $nombre_contributeur = $_POST['nombre_contributeur'];
}
else
{
    $nombre_contributeur = null;
}

$entrees = $_POST['donnees_entrees'] ;
$produites = $_POST['donnees_produites'] ;
$statut_produites = $_POST['statut_donnees_produites'] ;
$tache = $_POST['tache'] ;


if (isset($_POST['couverture_geo']) && ($_POST['couverture_geo'] != ''))
{
    $couverture_geo_donnees = $_POST['couverture_geo'];
}
else
{
    $couverture_geo_donnees = null;
}


if (isset($_POST['couverturechrono']) && ($_POST['couverturechrono'] != ''))
{
    $couverture_chrono_donnees = $_POST['couverturechrono'];
}
else
{
    $couverture_chrono_donnees = null;
}


if (isset($_POST['degre_avancement']) && ($_POST['degre_avancement'] != ''))
{
    $degre_avancement = $_POST['degre_avancement'];
}
else
{
    $degre_avancement = null;
}

$consulter = $_POST['consulter_donnees'] ;
$telecharger = $_POST['telecharger_donnees'] ;

if (isset($_POST['statut_donnees_telechargees']) && ($_POST['statut_donnees_telechargees'] != ''))
{
    $statut_dl = $_POST['statut_donnees_telechargees'];
}
else
{
    $statut_dl = null;
}

if (isset($_POST['outils_com_interne']) && ($_POST['outils_com_interne'] != ''))
{
    $outils_com_interne = $_POST['outils_com_interne'];
}
else
{
    $outils_com_interne = null;
}

$lien_rs = $_POST['lien_medias_sociaux'] ;

if (isset($_POST['media_sociaux_det']) && ($_POST['media_sociaux_det'] != ''))
{
    $rs_det = $_POST['media_sociaux_det'];
}
else
{
    $rs_det = null;
}
$lien_institution = $_POST['lien_institution'] ;

if (isset($_POST['lien_institution_det']) && ($_POST['lien_institution_det'] != ''))
{
    $lien_institution_det = $_POST['lien_institution_det'];
}
else
{
    $lien_institution_det = null;
}

if (isset($_POST['ref_biblio']) && ($_POST['ref_biblio'] != ''))
{
    $ref_biblio = $_POST['ref_biblio'];
}
else
{
    $ref_biblio = null;
}


try {
	$bdd= new PDO("mysql:host=localhost;dbname=collaborav2","root", ""); }
catch (Exception $e) {
	die("Erreur: ".$e->getMessage()); } 

$reponse= $bdd->prepare('INSERT INTO plateforme (nom_projet, url_source, descriptif, objectif_det, date_creation, statut_plateforme, date_inactive, lieu_pilote, public,
condition_contrib, compte_contri, historique, carac_contributeur, remuneration, type_remuneration, niveau_participation, validation, type_validation, charte,
nombre_contributeur, couverture_geo_donnees, couverture_chrono_donnees, degre_avancement, consulter_donnees, telecharger_donnees,
statut_donnees_telechargees, outils_com_interne, lien_medias_sociaux, media_sociaux_det, lien_institution, lien_institution_det, ref_biblio) 
VALUES (:nom_projet, :url, :descriptif, :objectif_det, :date_creation, :statut_plateforme, :date_inactive, :lieu_pilote, :public,
:condition_contrib, :compte_contri, :historique, :carac_contributeur, :remuneration, :type_remuneration, :niveau_participation, :validation, :type_validation, :charte,
:nombre_contributeur, :couverture_geo_donnees, :couverture_chrono_donnees, :degre_avancement, :consulter_donnees, :telecharger_donnees,
:statut_donnees_telechargees, :outils_com_interne, :lien_medias_sociaux, :media_sociaux_det, :lien_institution, :lien_institution_det, :ref_biblio)') ;
$reponse->execute(array('nom_projet'=>$nom_projet, 'url'=>$url, 'descriptif'=>$descriptif, 'objectif_det'=>$objectif_det, 'date_creation'=>$date_creation, 
'statut_plateforme'=>$statut, 'date_inactive'=>$date_inactive, 'lieu_pilote'=>$lieu_pilote, 'public'=>$public, 'condition_contrib'=>$condition_contrib, 'compte_contri'=>$compte_contri, 
'historique'=>$historique, 'carac_contributeur'=>$carac_contributeur, 'remuneration'=>$remuneration, 'type_remuneration'=>$type_remuneration, 
'niveau_participation'=>$niveau_participation, 'validation'=>$validation, 'type_validation'=>$type_validation, 'charte'=>$charte, 
'nombre_contributeur'=>$nombre_contributeur, 'couverture_geo_donnees'=>$couverture_geo_donnees, 'couverture_chrono_donnees'=>$couverture_chrono_donnees, 
'degre_avancement'=>$degre_avancement, 'consulter_donnees'=>$consulter, 'telecharger_donnees'=>$telecharger,'statut_donnees_telechargees'=>$statut_dl,
'outils_com_interne'=>$outils_com_interne, 'lien_medias_sociaux'=>$lien_rs, 'media_sociaux_det'=>$rs_det, 
'lien_institution'=>$lien_institution, 'lien_institution_det'=>$lien_institution_det, 'ref_biblio'=>$ref_biblio)) or die(print_r($reponse->errorInfo()));
if($reponse <> FALSE) 
  { echo "Enregistrement des données dans la table plateforme. " ; }
else
  { echo "Erreur lors de l'enregistrement de la plateforme" ; }


    $last_id = $bdd->lastInsertId();

$reponse->closeCursor();

    echo "Il s'agit de l'enregistrement qui correspond à l'id_plateforme " . $last_id;
	echo "<br>";
	

foreach ($domaine as $valueDomaine) {
$reponse= $bdd->prepare('INSERT INTO domaine_plateforme (id_plateforme, id_domaine) VALUES (:id_new_plateforme, :id_domaine)') ;
$reponse->execute(array('id_new_plateforme'=>$last_id, 'id_domaine'=>$valueDomaine)) or die(print_r($reponse->errorInfo())); }
if($reponse <> FALSE)
  { echo "Enregistrement des données dans la table domaine_plateforme. <br>" ; }
else
  { echo "Erreur lors de l'enregistrement des données" ; }
$reponse->closeCursor();

foreach ($objectif as $valueObjectif) {
$reponse= $bdd->prepare('INSERT INTO objectif_plateforme (id_plateforme, id_objectif) VALUES (:id_new_plateforme, :id_objectif)') ;
$reponse->execute(array('id_new_plateforme'=>$last_id, 'id_objectif'=>$valueObjectif)) or die(print_r($reponse->errorInfo())); }
if($reponse <> FALSE)
  { echo "Enregistrement des données dans la table objectif_plateforme. <br>" ; }
else
  { echo "Erreur lors de l'enregistrement des données" ; }
$reponse->closeCursor();

foreach ($enjeu as $valueEnjeu) {
$reponse= $bdd->prepare('INSERT INTO enjeu_plateforme (id_plateforme, id_enjeu) VALUES (:id_new_plateforme, :id_enjeu)') ;
$reponse->execute(array('id_new_plateforme'=>$last_id, 'id_enjeu'=>$valueEnjeu)) or die(print_r($reponse->errorInfo())); }
if($reponse <> FALSE)
  { echo "Enregistrement des données dans la table enjeu_plateforme. <br>" ; }
else
  { echo "Erreur lors de l'enregistrement des données" ; }
$reponse->closeCursor();

foreach ($langue as $valueLangue) {
$reponse= $bdd->prepare('INSERT INTO langue_plateforme (id_plateforme, id_langue) VALUES (:id_new_plateforme, :id_langue)') ;
$reponse->execute(array('id_new_plateforme'=>$last_id, 'id_langue'=>$valueLangue)) or die(print_r($reponse->errorInfo())); }
if($reponse <> FALSE)
  { echo "Enregistrement des données dans la table langue_plateforme. <br>" ; }
else
  { echo "Erreur lors de l'enregistrement des données" ; }
$reponse->closeCursor();

foreach ($entrees as $valueEntrees) {
$reponse= $bdd->prepare('INSERT INTO donnees_entrees_cor (id_plateforme, id_donnees_entrees) VALUES (:id_new_plateforme, :id_donnees_entrees)') ;
$reponse->execute(array('id_new_plateforme'=>$last_id, 'id_donnees_entrees'=>$valueEntrees)) or die(print_r($reponse->errorInfo())); }
if($reponse <> FALSE)
  { echo "Enregistrement des données dans la table donnees_entrees_cor. <br>" ; }
else
  { echo "Erreur lors de l'enregistrement des données" ; }
$reponse->closeCursor();

foreach ($produites as $valueProduites) {
$reponse= $bdd->prepare('INSERT INTO donnees_produites_cor (id_plateforme, id_donnees_produites) VALUES (:id_new_plateforme, :id_donnees_produites)') ;
$reponse->execute(array('id_new_plateforme'=>$last_id, 'id_donnees_produites'=>$valueProduites)) or die(print_r($reponse->errorInfo())); }
if($reponse <> FALSE)
  { echo "Enregistrement des données dans la table donnees_produites_cor. <br>" ; }
else
  { echo "Erreur lors de l'enregistrement des données" ; }
$reponse->closeCursor();

foreach ($statut_produites as $valueStatutProduites) {
$reponse= $bdd->prepare('INSERT INTO statut_donnees_produites_plateforme (id_plateforme, id_statut_donnees_produites) VALUES (:id_new_plateforme, :id_statut_donnees_produites)') ;
$reponse->execute(array('id_new_plateforme'=>$last_id, 'id_statut_donnees_produites'=>$valueStatutProduites)) or die(print_r($reponse->errorInfo())); }
if($reponse <> FALSE)
  { echo "Enregistrement des données dans la table statut_donnees_produites_plateforme. <br>" ; }
else
  { echo "Erreur lors de l'enregistrement des données" ; }
$reponse->closeCursor();

foreach ($tache as $valueTache) {
$reponse= $bdd->prepare('INSERT INTO donnees_tache_cor (id_plateforme, id_tache) VALUES (:id_new_plateforme, :id_tache)') ;
$reponse->execute(array('id_new_plateforme'=>$last_id, 'id_tache'=>$valueTache)) or die(print_r($reponse->errorInfo())); }
if($reponse <> FALSE)
  { echo "Enregistrement des données dans la table donnees_tache_cor. <br>" ; }
else
  { echo "Erreur lors de l'enregistrement des données" ; }
$reponse->closeCursor();


/* Champs qu'il reste à traiter :
- pilote
- financeur
- partenaire
- institution concernée */
?>