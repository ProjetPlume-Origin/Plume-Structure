<?php 

// Déclaration de constantes
	define('DS', '/'); // Le séparateur de dossier
	define('TEST', dirname($_SERVER['SCRIPT_NAME'])); // La base du site
	define('RACINE', dirname(TEST)); // La racine
	define('SYSTEME', RACINE.DS."systeme");
	define('SITE', RACINE.DS."site");

?>
<!DOCTYPE html>
<html lang="fr-CA">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Testes</title>

		<!-- Bootstrap CSS -->
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo SITE.DS; ?>css/main.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php include_once "templates/nav.php"; ?>
		<div class="jumbotron">
			<div class="container">
				<h1>Testes</h1>
				<p>Section réservée aux testes unitaires</p>
			</div>
		</div>
		<article class="container">
			<section class="row">
				<article class="col-md-4 col-sm-6">
					<div class="panel panel-success">
						  <div class="panel-heading">
								<h2 class="panel-title"><span class="glyphicon glyphicon-hdd"></span> Classes des Modèles</h2>
						  </div>
						  <div class="panel-body">
								<a href="test_classe_produit.php" class="btn btn-block btn-lg btn-success">Produit.class</a>
								<a href="test_classe_media.php" class="btn btn-lg btn-block btn-success">Media.class</a>
						  </div>
					</div>
				</article>
				<article class="col-md-4 col-sm-6">
					<div class="panel panel-success">
						  <div class="panel-heading">
								<h2 class="panel-title"><span class="glyphicon glyphicon-eye-open"></span> Classes des Vues</h2>
						  </div>
						  <div class="panel-body">
								<a href="test_view_produit.php" class="btn btn-block btn-lg btn-success">ViewProduit</a>
								<a href="test_view_media.php" class="btn btn-lg btn-block btn-success">ViewMedia</a>
						  </div>
					</div>
				</article>
				<article class="col-md-4 col-sm-6">
					<div class="panel panel-success">
						  <div class="panel-heading">
								<h2 class="panel-title"><span class="glyphicon glyphicon-random"></span> Classes des Contrôleurs</h2>
						  </div>
						  <div class="panel-body">
								<a href="../site/index.php" class="btn btn-block btn-lg btn-success">ControlerInternaute</a>
								<a href="../site/index.php" class="btn btn-lg btn-block btn-success">ControlerAdmin</a>
						  </div>
					</div>
				</article>
			</section>
		<?php include_once "../vues/templates/footer.php"; ?>