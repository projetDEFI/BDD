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
  <meta name="description" content="search-results">
  <meta name="author" content="Rajosoa Mickael">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="//fonts.googleapis.com/css?family=Pattaya|Slabo+27px|Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="images/favicon.png">

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
  <li role="presentation"><a href="index.php">Accueil</a></li>


  <li role="presentation"><a href="about.php">A Propos</a></li>
</ul>

<br>
<div class="row vertical-center-row">
    <div class="col-lg-4 col-lg-offset-4">
        <div class="input-group">
        <!--<div class="center-block">--!>
            <h1>Projet Collabora </h1><p>
            
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
                <button type="submit" class="btn btn-primary">Rechercher</button>
                <a class="btn btn-danger" href="index.php">Revenir</a> 
            </span>
        </div>
    </div>
</div>
</form>
<br>

<br>
 <div class="container">
    <div class="row" style="text-align: center">
    <h2> Résulats du recherche</h2>
    </div>
  </div>


        <?php
        if(isset($results)) {
            foreach($results as $r) {
            ?>

                <div class="row" style="text-align: center">
   		  <div class="container">
  		    <div class="panel panel-success">
                      <div class=panel-heading>
                        <h2 class=panel-title>
                          <a href="<?php echo $r['_source']['url_source']; ?>" target="_blank"><p><br>
                            <?php echo $r['_source']['nom_projet']; ?>
                          </a>
                      </div>
                        <br><br>
                          <b>Objectif:</b><p> 
                              <?php echo $r['_source']['ojectif_det']; ?>
                              <p></p><br>
                     
                  </div>
                </div>
            <?php
            }
        }
        ?>
</body>
</html>
