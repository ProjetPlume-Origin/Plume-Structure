<?php
			
    /**
	 * Inclure les librairies
	 */	
	 require_once("../site/lib/");
	 require_once("../outils/lib/TypeException.class.php");
	 require_once("../outils/lib/MysqliException.class.php");
	 require_once("../outils/lib/MysqliLib.class.php");
	 /**
	 * Inclure les vues
	 */
	 require_once("../vues/VueProduit.class.php");
	 require_once("../vues/VueMedia.class.php");
	 /**
	 * Inclure les modèles
	 */
	 require_once("../modeles/Produit.class.php");
	 require_once("../modeles/Media.class.php");
	 require_once("../modeles/Utilisateur.php");
	 /**
	 * Inclure le contrôleur
	 */
	 require_once("Controleur.class.php");
	 
	 /**
	 * Inclure le gabarit (nécessairement le dernier)
	 */
	 require_once("gabarit.php");
?>