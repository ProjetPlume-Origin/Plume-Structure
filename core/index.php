<?php
	session_start();				
    /**
	 * Inclure les librairies
	 */	
	 require_once("../lib/TypeException.class.php");
	 require_once("../lib/MysqliException.class.php");
	 require_once("../lib/MysqliLib.class.php");
	 /**
	 * Inclure les vues
	 */
     
     require_once("../Vues/ViewInscription.class.php");
	
	 require_once("../modeles/Utilisateur.class.php");
		
	 /**
	 * Inclure le contrôleur
	 */
	 require_once("Controleur.class.php");
	 
	 /**
	 * Inclure le gabarit (nécessairement le dernier)
	 */
	 require_once("gabarit.php");
?>