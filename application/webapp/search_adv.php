<?php
require_once 'app/init.php';

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

<!DOCTYPE HTML>
<html>

<!-- En tête -->
	<head>
		<meta charset="utf-8"/>
		<title>Collabora BDD</title>
		<link rel="stylesheet" type="text/css" href="../styles/index_style.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	
<!-- Corps de la page -->

	<body>

		<div class="separator"></div> <!-- top lign de séparation -->

		<div id="header"> <!-- Menu de navigation et logo -->
			<a href="../index.php" class=title>Collabora</a>
			<nav>
				<ul>
					<li><a href="form.php">Contribuer</a></li>
					<li><a href="visualisation.php">Visualiser</a></li>
					<li><a href="blog.php">Blog</a></li>
					<li><a href="ressources.php">Ressources</a></li>
				</ul>
			</nav>
			<div class="line"></div> <!-- Sous lignage du menu -->
		</div>

<!-- Barre de recherche -->
		<form action="results.php" method="get" autocomplete="off">
			<div class="row">
    			<div class="col-lg-4 col-lg-offset-4">
        			<div class="input-group">
          				<input type="text" name="q" placeholder="Recherchez un projet ou Tapez le nom d'un domaine" class="form-control" /> 
            			<span class="input-group-btn"> 
                			<button type="submit" class="btn btn-primary">Rechercher </button>
            			</span>
        			</div>
   				 </div>
			</div>
		</form>

<!-- Menu de connexion -->
	  	<div class="login-container"> 
	    	<form class="login" action="connexion.php">
	    		<input type="text" placeholder="Username" name="username">
	    		<input type="text" placeholder="Password" name="psw">
	    		<button class="login-button" type="submit">Login</button>
	    	</form>
	    </div>
<!-- Bouton d'inscription -->
		<button class="signup-button" onclick="document.getElementById('id01').style.display='block'">Sign Up</button>
<!-- Fenêtre d'inscription -->
		<div id="id01" class="modal">
		  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">X</span>
		  <form class="modal-content" action="">
		    <div class="container">
		      <h1>Sign Up</h1>
		      <p>Remplissez ces champs pour vous créer un compte.</p>
		      <hr>
		      <label for="pseudo"><b>Pseudo</b></label>
		      <input type="text" placeholder="Entrer votre pseudo" name="pseudo" required>

		      <label for="psw"><b>Mot de passe</b></label>
		      <input type="password" placeholder="Entrer votre mot de passe" name="psw" required>

		      <label>
		        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
		      </label>

		      <div class="clearfix">
		        <button class="popup"type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		        <button class="popup"type="submit" class="signup">Sign Up</button>
		      </div>
		    </div>
		  </form>
		</div>

		<!-- Pied de page -->
		<footer> 
			<ul>
		        <li><a href="credits.php">Credits</a></li>
		        <li><a href="contact.php">Contact</a></li>
		        <li><a href="blog.php">Blog</a></li> 
	       </ul> 
		</footer>

	 	<script>
			/*Menu pop-up signup*/
			var modal = document.getElementById('id01');
			window.onclick = function(event) { // When the user clicks anywhere outside of the modal, close it
	   			if (event.target == modal) {
	        	modal.style.display = "none";}
			}
		</script> 
	</body>

</html>