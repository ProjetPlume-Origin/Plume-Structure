<?php
    class Controleur{

    	/**
		 * redirige selon le choix de l'internaute
		 */
		public static function gererSite(){
			
			try{
				//1èr cas : aucune option du menu n'a été sélectionné
				if(isset($_GET['s']) == false){
					$_GET['s']=1;
				}
				
				switch($_GET['s']){

					case 1: default://Accueil 
						VueAccueil::afficherListeDesCategories();					

					case 2: //					 
						break;		

				}
			}catch(Exception $e){
				echo "<p>".$e->getMessage()."</p>";
			}	
			
		}


    }//fin de la classe Controleur
?>