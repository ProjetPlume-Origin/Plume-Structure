<?php
    /**
	 * Inclure les librairies
	 */	
	 require_once("../lib/TypeException.class.php");
	 require_once("../lib/MysqliException.class.php");
	 require_once("../lib/MysqliLib.class.php");
	 /**
	 * Inclure les modèles
	 */
	 require_once("../modeles/Utilisateur.class.php");
	 /**
	 * Inclure le contrôleur
	 */
	 require_once("../core/Controleur.class.php");
    
    $bDelete = Controleur::gererSupprimerUtilisateurAdmin();
	header("Location:../core/index.php?s=".$_GET['s']."&bSup=".$bDelete);
?>