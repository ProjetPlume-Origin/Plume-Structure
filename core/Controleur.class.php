<?php
   
	class Controleur {
		
		public static function gererSite(){
			try {
				//1èr cas : aucune option du menu n'a été sélectionné 
				if(isset($_GET['s']) == FALSE){
					$_GET['s']=1;
				}
				//2e cas :L'administrateur a sélectionné une option dans le menu
				switch($_GET['s']){
					case 2: 
						Controleur::gererUtilisateur();
						break;
					case 1 : default :
						echo "Bienvenue sur le site administrateur de plume.";
						
				}
			}catch(Exception $e){
				echo "<p>".$e->getMessage()."</p>";
			}
			
			
		}//fin de la fonction gererSite()
		
		public static function gererUtilisateur(){
			try{
				//1èr cas : aucune action n'a été sélectionné $_GET['action'] n'a pas affecté d'une valeur
				if(isset($_GET['action']) == FALSE){
					$_GET['action']="lst";
				}
				
				//2e cas :L'administrateur a sélectionné une action, 
				//il existe 3 possibilités add, mod, sup ou la liste des étudiants 
				switch($_GET['action']){
					case "add":
						Controleur::gererAjouterUtilisateurAdmin();
						break;
					case "mod":
						Controleur::gererModifierUtilisateurAdmin();
						break;
					case "sup":
						Controleur::gererSupprimerUtilisateur();
						break;
					case "lst": default:
						Controleur::gererListeDesUtilisateurs();
						echo" je suis la ";
						
				}//fin du switch() sur $_GET['action']
			}catch(Exception $e){
				echo "<p>".$e->getMessage()."</p>";
			}
			
			
		}//fin de la fonction gererListeDesProduits()
/*-------------------------------------------------------------------------------------------------------------*/		
		/**
		 * afficher la liste des produits qui vont pouvoir être modifier ou supprimer et ajouter
		 */
        public static function gererListeDesUtilisateurs(){
			try{
				$sMsg = "";
				//var_dump(isset($_GET['bSup']));
				if(isset($_GET['bSup']) == true){
					$sMsg ="La suppression s'est bien déroulée.";
				}
				//Rechercher la liste des utilisateurs
				$aUtilisateurs = Utilisateur::rechercherListeDesUtilisateurs();
				// var_dump($aUtilisateurs);
                
                //Afficher la liste des produits
				ViewInscription::afficherListeUtilisateurs($aUtilisateurs, $sMsg);
								
			}catch(Exception $e){
				echo "<p>".$e->getMessage()."</p>";
			}
		}//fin de la fonction
		
        
        
        
        
        
        
        
        
        
		
/*---------------------------------------------------------------------------------------------------------------------------*/        
        
        /**
		 * afficher le formulaire d'ajout et sur submit ajouter du Produit dans la base de données
		 */
		public static function gererAjouterUtilisateurAdmin(){
			echo "gererAjouterUtilisateur";
			try{
                echo "alo";
				//1èr cas : aucun submit n'a été cliqué
				if(isset($_POST['cmd']) == false){
					//afficher le formulaire
					ViewInscription::afficherAjouterUtilisateurAdmin();
				//2e cas : le bouton submit Modifier a été cliqué
				}else{
                    echo"je suis la ";
                    $oUtilisateur = new Utilisateur();
                    $oUtilisateur-> setNom(mysql_real_escape_string($_POST['txtNom']));
                    if($oUtilisateur->verificationNom()){
                        
                         $oUtilisateur-> setCourriel(mysql_real_escape_string($_POST['txtCourriel']));
                         if($oUtilisateur->verificationcourriel()){
                             $oUtilisateur-> setMotDePasse(mysql_real_escape_string($_POST['txtPass']));
                             $oUtilisateur-> setConfirmation(mysql_real_escape_string($_POST['txtPassConfirm']));
                                if($oUtilisateur->verificationMotPass()){
                                    $oUtilisateur->ajouterUtilisateur();
                                    $sMsg = "L'ajout de l'utilisateur' - ".$oUtilisateur->getNom()." - s'est déroulé avec succès.";//echo $sMsg;
                                    $aUtilisateurs = Utilisateur::rechercherListeDesUtilisateurs();
                                    ViewInscription::afficherListeUtilisateurs($aUtilisateurs,$sMsg);
                                
                                
                                }else{
                                    $sMsg = 'Les 2 mots de passe sont différents.';
                                      $aUtilisateurs = Utilisateur::rechercherListeDesUtilisateurs();
                                    ViewInscription::afficherListeUtilisateurs($aUtilisateurs,$sMsg);
                                 }
                         }else{
                             
                             $sMsg = 'Un membre possède déjà ce Courriel.';
                               $aUtilisateurs = Utilisateur::rechercherListeDesUtilisateurs();
                             ViewInscription::afficherListeUtilisateurs($aUtilisateurs,$sMsg);
                        }
                        
                    }else{
                        
                        $sMsg = 'Un membre possède déjà ce Nom.';
                        $aUtilisateurs = Utilisateur::rechercherListeDesUtilisateurs();                                                             ViewInscription::afficherListeUtilisateurs($aUtilisateurs,$sMsg);
                        
                    }
                 
				}
			}catch(Exception $e){
				ViewInscription::afficherAjouterUtilisateur($e->getMessage());
			}
		}//fin de la fonction afficherAjouterUtilisateur()
/*-------------------------------------------------------------------------------------------------------------------------------*/		
      
        
/*-------------------------------------------------------------------------------------------------------------------------------*/        
		
        
		/**
		 * Supprimer l'étudiant de la base de données 
		 * Gère les refresh puisque appeler dans le fichier gererProduit.php
		 * @return string message 
		 */
		public static function gererSupprimerProduit(){
			
			try{
				$oProduit = new Produit($_GET['idProduit']);
				$oProduit->rechercherUnProduit();
				//supprimer dans la base de données du produit
				return $oProduit->supprimerUnProduit();				
			}catch(Exception $e){
				return $e->getMessage();
			}
		}//fin de la fonction gererSupprimerEtudiant()


    
    
    
    
    
    }//Fin de la classe Controleur

?>


        
        
        
        
        

                                                            
 

