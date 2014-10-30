<?php 

// Déclaration de constantes
	define('DS', '/'); // Le séparateur de dossier
	define('TEST', dirname($_SERVER['SCRIPT_NAME'])); // La base du site
	define('RACINE', dirname(TEST)); // La racine
	define('SYSTEME', RACINE.DS."systeme");
	define('SITE', RACINE.DS."site");

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Plume</title>
		<meta name="description" content="">
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
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Esteban' rel='stylesheet' type='text/css'>
        
<!--        Fonts pour affichage avec les preferences-->
        
        <link href='http://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
<!--        font-family: 'Playfair Display', serif;-->
        
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<!--        font-family: 'Oswald', sans-serif;-->
        
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<!--        font-family: 'Lobster', cursive;-->
        
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
<!--        font-family: 'Shadows Into Light', cursive;-->
        
        
        
<!--       FIN Fonts pour affichage avec les preferences--> 
        
        <script src="../js/vendor/jquery-1.11.0.min.js"></script>
        <script src="../js/preference.js"></script>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="<?php echo RACINE.DS; ?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to
            improve your experience.</p>
        <![endif]-->
		