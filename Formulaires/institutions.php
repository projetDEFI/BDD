<?php
// debut session
session_start();

//connexion a la bdd 
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=collaborav2;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


$term = $_GET['term'] ;

$requete = $bdd->prepare('SELECT * FROM institutions WHERE nom_institution LIKE :term'); // j'effectue ma requête SQL grâce au mot-clé LIKE
$requete->execute(array('term' => '%'.$term.'%'));

$array = array(); 

while($donnee = $requete->fetch()) 
{
    array_push($array, $donnee['nom_institution']." --- ".$donnee['id_institutions']);
}

echo json_encode($array); 

?>