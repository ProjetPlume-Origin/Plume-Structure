<?php 

// Déclaration de constantes
	define('DS', '/'); // Le séparateur de dossier
	define('TEST', dirname($_SERVER['SCRIPT_NAME'])); // La base du site
	define('RACINE', dirname(TEST)); // La racine
	define('SYSTEME', RACINE.DS."systeme");
	define('SITE', RACINE.DS."site");

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>nom du projet | Julian Rendon</title>
		<meta name="author" content="Julian Rendon">

		<!-- Bootstrap CSS -->
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo SITE.DS; ?>css/bootstrap.min.css" rel="stylesheet">
		<style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
		<link rel="stylesheet" href="<?php echo SITE.DS; ?>css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="<?php echo SITE.DS; ?>css/main.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		