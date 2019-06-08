<?php
/* récupération en method POST des login/mot de passe depuis le formulaire page connexion */

$login = $_POST['username'] ; 
$mdp = $_POST['psw'] ;

/* test de la BDD */

try
{
$bdd= new PDO('mysql:host=localhost:3306;dbname=collabora','phpmyadmin','root');
}
catch (Exception $e)
{
die('Erreur: '.$e->getMessage());
}

$reponse= $bdd->query('SELECT * FROM user')or die( print_r($bdd->errorInfo() ));
$donnees=$reponse->fetch() ;
while ($donnees=$reponse->fetch())
	{
		if (($donnees['login']==$login)&&($donnees['pwd']==$mdp))
			{
				header('Location: http://private/BDD/application/webapp/index.php');
				exit();
			}
		else
			{
				echo "Vérifier vos identifiants, ils correspondent à un compte utilisateur mais mal renseigné.";
			}
	}
$reponse->closeCursor();



?>