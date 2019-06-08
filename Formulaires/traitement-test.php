<?php
#Faire des echos pour voir si les choix ont bien été pris en compte
#formulaire : faire listes en dur pour les lieux etc !!!
$nom_projet = $_POST['nom_projet'] ;
$url = $_POST['url_projet'] ;
$domaine = $_POST['domaine'] ;
$descriptif = $_POST['descriptif'] ;
$objectif = $_POST['objectif'] ;
$enjeu = $_POST['enjeu'] ;
$objectif_det = $_POST['objectif_det'] ;
$date = $_POST['date'] ;    # Ajouter un " name=\"date\" " pour le champ de saisie de la date de création !!!!
$statut = $_POST['statut'] ;
$date_inactive = $_POST['inactive'] ;  # CRASH TEST !!!!
$pilote = $_POST['pilote'] ;
#lieu_pilote
$langue = $_POST['langue'] ;
$partenaire = $_POST['partenaire'] ;
$financeur = $_POST['financeur'] ;
$institution = $_POST['institution'] ;
$public = $_POST['public'] ;
$condition_contrib = $_POST['condition_contrib'] ;
$compte_contri = $_POST['compte_contri'] ;
$historique = $_POST['historique'] ;
$carac_contributeur = $_POST['carac_contributeur'] ;
$remuneration = $_POST['remuneration'] ;
$type_remuneration = $_POST['type_remuneration'] ;
$niveau_participation = $_POST['niveau_participation'] ;
$validation = $_POST['validation'] ;
$type_validation = $_POST['type_validation'] ;
$charte = $_POST['charte'] ;
$nombre_contributeur = $_POST['nombre_contributeur'] ;
$entrees = $_POST['donnees_entrees'] ;
$produites = $_POST['donnees_produites'] ;
$statut_produites = $_POST['statut_donnees_produites'] ;
$tache = $_POST['tache'] ;
#couverture geo
#couverture chrono
$degre_avancement = $_POST['degre_avancement'] ;
$consulter = $_POST['consulter_donnees'] ;
$telecharger = $_POST['telecharger_donnees'] ;
$statut_dl = $_POST['statut_donnees_telechargees'] ;
$outils_com_interne = $_POST['outils_com_interne'] ;
$lien_rs = $_POST['lien_medias_sociaux'] ;
$rs_det = $_POST['media_sociaux_det'] ;
$lien_institution = $_POST['lien_institution'] ;
$lien_institution_det = $_POST['lien_institution_det'] ;
$ref_biblio = $_POST['ref_biblio'] ;


try {
	$bdd= new PDO("mysql:host=localhost;dbname=collaborav2","root", ""); }
catch (Exception $e) {
	die("Erreur: ".$e->getMessage()); } 


 
$reponse= $bdd->prepare('INSERT INTO plateforme (nom_projet, url_source, descriptif, objectif_det, date_creation, statut_plateforme, date_inactive, public,
condition_contrib, compte_contri, historique, carac_contributeur, remuneration, type_remuneration, niveau_participation, validation, type_validation, charte,
nombre_contributeur, couverture_geo_donnees, couverture_chrono_donnees, degre_avancement, consulter_donnees, telecharger_donnees,
statut_donnees_telechargees, outils_com_interne, liens_medias_sociaux, medias_sociaux_det, lien_institution, lien_institution_det, ref_biblio) 
VALUES (:nom_projet, :url, :descriptif, :objectif_det, :date_creation, :statut_plateforme, :date_inactive, :public,
:condition_contrib, :compte_contri, :historique, :carac_contributeur, :remuneration, :type_remuneration, :niveau_participation, :validation, :type_validation, :charte,
:nombre_contributeur, :couverture_geo_donnees, :couverture_chrono_donnees, :degre_avancement, :consulter_donnees, :telecharger_donnees,
:statut_donnees_telechargees, :outils_com_interne, :liens_medias_sociaux, :medias_sociaux_det, :lien_institution, :lien_institution_det, :ref_biblio)') ;
$reponse->execute(array('projet'=>$nom_projet, 'url'=>$url, 'descriptif'=>$descriptif, , 'objectif_det'=>$objectif_det, 'date_creation'=>$date, 
'statut_plateforme'=>$statut, 'date_inactive'=>$date_inactive, 'public'=>$public, 'condition_contrib'=>$condition_contrib, 'compte_contri'=>$compte_contri, 
'historique'=>$historique, 'carac_contributeur'=>$carac_contributeur, 'remuneration'=>$remuneration, 'type_remuneration'=>$type_remuneration, 
'niveau_participation'=>$niveau_participation, 'validation'=>$validation, 'type_validation'=>$type_validation, 'charte'=>$charte, 
'nombre_contributeur'=>$nombre_contributeur, 'couverture_geo_donnees'=>$couverture_geo_donnees, , 'couverture_chrono_donnees'=>$couverture_chrono_donnees, 
'degre_avancement'=>$degre_avancement, 'consulter_donnees'=>$consulter, 'telecharger_donnees'=>$telecharger,'statut_donnees_telechargees'=>$statut_dl,
'outils_com_interne'=>$outils_com_interne, 'lien_medias_sociaux'=>$lien_rs, 'medias_sociaux_det'=>$rs_det, 
'lien_institution'=>$lien_institution, 'lien_institution_det'=>$lien_institution_det, 'ref_biblio'=>$ref_biblio)) or die(print_r($reponse->errorInfo()));
if($reponse <> FALSE) 
  { echo "Enregistrement de la plateforme dans la table plateforme (uniquement !). <br>" ; }
else
  { echo "Erreur lors de l'enregistrement de la plateforme" ; }

# A FAIRE AVANT DE TESTER LE INSERT INTO PLATEFORME : COUVERTURE GEO DONNEES, LIEU PILOTE, COUVERTURE CHRONO DONNEES


# les foreach seront utiles uniquement pr les champs multiples
#foreach( $domaine as $valueDomaine ){
#echo $valueDomaine . '<br >';
#}
/* foreach domaine INSERT un enregistrement dans la table domaine_plateforme avec id_plateforme (auto-incrémenté) + id_domaine
#idem pour objectif, enjeu, etc.
 foreach ($domaine as $iddomaine) {
{	$reponse->closeCursor() ;
$reponse= $bdd->prepare('INSERT INTO domaine_plateforme (id_plateforme, id_domaine) VALUES (:domaine, :activite)') ;
$reponse->execute(array('activite'=>$idactivite, 'enfant'=>$idenfant)) or die(print_r($reponse->errorInfo()));
if($reponse <> FALSE) #vérification que des données ont été insérées
  { echo "Inscription enregistrée. <br>" ; }
else
  { echo "Erreur lors de l'enregistrement de l'inscription" ; }
}  } */
?>