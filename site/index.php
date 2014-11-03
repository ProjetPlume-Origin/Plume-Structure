<?php
session_start();		
    /**
	* Inclure les librairies
	*/	
    require_once("../lib/MySqliException.class.php");
    require_once("../lib/MySqliLib.class.php");
    require_once("../lib/TypeException.class.php");

	/**
	* Inclure les vues
	*/
	require_once("../vues/VueGenre.class.php");
 	require_once("../vues/ViewInscription.class.php");
	require_once("../vues/vueOuvrage.class.php");
		
	/**
	* Inclure les modèles
	*/
	require_once("../modeles/Genre.class.php");
	require_once("../modeles/Utilisateur.class.php");
	require_once("../modeles/Ouvrages.class.php");	
	
	/**
	* Inclure le contrôleur
	*/
	require_once("Controleur.class.php");
	 
	/**
	* Inclure le gabarit (nécessairement le dernier)
	*/		
	
		
		require_once("gabarit.php");


?>