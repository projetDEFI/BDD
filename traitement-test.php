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
$compte_contrib = $_POST['compte_contrib'] ;
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


echo $nom_projet ;
echo $domaine ;
#foreach domaine INSERT un enregistrement dans la table domaine_plateforme avec id_plateforme (auto-incrémenté) + id_domaine
#idem pour objectif, enjeu, etc.

?>
