<?php
    /**
	 * Inclure les librairies
	 */	
	 require_once("../lib/TypeException.class.php");
	 require_once("../lib/MySqliException.class.php");
	 require_once("../lib/MySqliLib.class.php");
	 /**
	 * Inclure les modèles
	 */
	 require_once("../modeles/Utilisateur.class.php");
     
    require_once("../vues/ViewInscription.class.php");
	 /**
	 * Inclure le contrôleur
	 */
	 require_once("../core/Controleur.class.php");
    
   // $bDelete = Controleur::gererSupprimerUtilisateurAdmin();
	//header("Location:../core/index.php?s=".$_GET['s']."&bSup=".$bDelete);


    try{		
		Controleur::ajax_gererUtilisateur();
	}catch(Exception $e){
		echo $e->getMessage();
	}



?>