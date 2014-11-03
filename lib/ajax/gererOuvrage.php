<?php
    /**
	 * Inclure les librairies
	 */	
	 require_once("../TypeException.class.php");
	 require_once("../MysqliException.class.php");
	 require_once("../MysqliLib.class.php");
	 /**
	 * Inclure les modèles
	 */
	 require_once("../../modeles/Ouvrages.class.php");
	 /**
	 * Inclure le contrôleur
	 */
	 require_once("../../site/Controleur.class.php");
    
    $bDelete = Controleur::gererSupprimerOuvrage();
	header("Location:../../site/index.php?s=".$_GET['s']."&bSup=".$bDelete);
?>