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
        [ "match" => ["ojectif_det" => $q]]
    
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
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Recherche Simple</title> 
  <link href="https://fonts.googleapis.com/css?family=Pattaya|Slabo+27px" rel="stylesheet"> 
  <link rel="image_src" type="image/jpeg" href="http://search.ruanbekker.com/search/images/header-logo.png" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.10.1/bootstrap-social.css" rel="stylesheet" >
  <link rel="icon" type="image/png" href="images/favicon.png">
  <link href="//fonts.googleapis.com/css?family=Pattaya|Slabo+27px|Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="author" content="Rajosoa Mickael">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>

  <style>
      h1 {
        font-family: 'Pacifico', sans-serif;
        font-size: 59px;
	position: center;
        right: -20px;
      }
	
      h3 {
        font-family: 'Pacifico', sans-serif;
        font-size: 20px;
        position: center;
        right: -90px;
      }

      h4 {
        font-family: 'Slabo', sans-serif;
        font-size: 30px;
      }
  </style>


</head>
<body>
  <ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="index.php">Accueil</a></li>

    <li role="presentation"><a href="about.php">A Propos</a></li>
  </ul>
<br>
<div class="row vertical-center-row">
    <div class="col-lg-4 col-lg-offset-4">
        <div class="input-group">
	    <h1>   Projet Collabora </h1>
	  
        </div>
    </div>
</div>
<br>
<br>
<form action="results.php" method="get" autocomplete="on">
<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <div class="input-group">
          <input type="text" name="q" placeholder="Recherchez un projet" class="form-control" /> 
            <span class="input-group-btn"> 
                <button type="submit" class="btn btn-primary">Rechercher </button>
            </span>
        </div>
    </div>
</div>
</form>
<br>

<br>
<br>
<center>
  <footer class="bd-footer text-muted" role="contentinfo">


  <div class="container">
    <ul class="bd-footer-links"></ul>
    <p>crée et développé par Mickael Rajosoa</p>
  </div>


  <div class="container">
    <div class="row">
    <h4> </h4>
    </div>
  </div>

</footer>
</center>
</body>
</html>
