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
					case 2: 
						Controleur::gererInscriptionUtilisateur();
						break;
                    case 3: 
						Controleur::gererConnexionUtilisateur();
						break;	

				}
			}catch(Exception $e){
				echo "<p>".$e->getMessage()."</p>";
			}	
			
		}

			
		/**
		 * afficher le formulaire d'ajout et sur submit ajouter du Produit dans la base de données
		 */
		public static function gererInscriptionUtilisateur(){
			
			try{
				//1èr cas : aucun submit n'a été cliqué
				if(isset($_POST['cmd']) == false){
					//afficher le formulaire
					ViewInscription::afficherAjouterUtilisateur();
				//2e cas : le bouton submit Modifier a été cliqué
				}else{
				
                   /*$oUtilisateur = new Utilisateur(1,$_POST['txtNom'],    
                                                        $_POST['txtCourriel'],$_POST['txtPass'],$_POST['txtPassConfirm']);*/
                   
                   // $oUtilisateur-> setMotDePasse(mysql_real_escape_string($_POST['txtPass']);
                    //$oUtilisateur-> setConfirmation(mysql_real_escape_string($_POST['txtPassConfirm']);
                     $oUtilisateur = new Utilisateur();
                    $oUtilisateur-> setNom(mysql_real_escape_string($_POST['txtNom']));
                    if($oUtilisateur->verificationNom()){
                        
                         $oUtilisateur-> setCourriel(mysql_real_escape_string($_POST['txtCourriel']));
                         if($oUtilisateur->verificationcourriel()){
                             $oUtilisateur-> setMotDePasse(mysql_real_escape_string($_POST['txtPass']));
                             $oUtilisateur-> setConfirmation(mysql_real_escape_string($_POST['txtPassConfirm']));
                                if($oUtilisateur->verificationMotPass()){
                                    $oUtilisateur->ajouterUtilisateur();
                                    $sMsg = "L'ajout de l'utilisateur' - ".$oUtilisateur->getNom()." - s'est déroulé avec succès.";
                                 }else{
                                    $sMsg = 'Les 2 mots de passe sont différents.';
                                 }
                         }else{
                             
                             $sMsg = 'Un membre possède déjà ce Courriel.';
                        }
                        
                    }else{
                        
                        $sMsg = 'Un membre possède déjà ce Nom.';
                        
                        
                    }
                                                    
                                                    
                   
					ViewInscription::afficherAjouterUtilisateur($sMsg);
				}
			}catch(Exception $e){
				ViewInscription::afficherAjouterUtilisateur($e->getMessage());
			}
		}//fin de la fonction afficherAjouterUtilisateur()
		
	
/*----------------------------------------------------------------------------------------------------------------------------*/        
        /**
		 * afficher le formulaire de connexion et sur submit on se connecte a notre compte
		 */
     
       
           
        public static function gererConnexionUtilisateur(){
			
			try{
				//1èr cas : aucun submit n'a été cliqué
                    if(isset($_POST['cmd']) == false){
                        //afficher le formulaire
                        ViewInscription::afficherConnexionUtilisateur();
                    //2e cas : le bouton submit Modifier a été cliqué
                    }else{
                        echo " je suis apres la clique de ";
                        $oUtilisateur = new Utilisateur();                    
                        $oUtilisateur-> setCourriel(mysql_real_escape_string($_POST['txtCourriel']));
                             
                             if(!($oUtilisateur->verificationcourriel())){
                                 $oUtilisateur-> setMotDePasse(mysql_real_escape_string(md5($_POST['txtPass'])));
                                // var_dump($oUtilisateur);
                                 echo('motde passe').md5($_POST['txtPass']);
                                    // $oUtilisateur->connexionUtilisateur();
                                        
                                       
                                         
                                         
                                         $aUtilisateur = $oUtilisateur->connexionUtilisateur();
                                    if(!empty($aUtilisateur)){
                                         $sMsg = "La connexion  - ".$oUtilisateur->getNom()." - s'est déroulé avec succès.";
                                          echo $sMsg;
                                         //var_dump($aUtilisateur);
                                        // var_dump($aUtilisateur[0]['idUtilisateur']);
                                        $_SESSION["IdUtilisateur"] = $aUtilisateur[0]['idUtilisateur'];
                                        $_SESSION["sNomUtilisateur"] = $aUtilisateur[0]['sNomUtilisateur'];
                                        echo $_SESSION["IdUtilisateur"]; 
                                     }else{

                                         $sMsg = 'Ce Courriel  ou  mot de passe n\'existent pas dans notre base de données .';
                                          echo $sMsg;
                                     }
                            }else{
                                    $sMsg = 'Ce Courriel n\'existe pas dans notre base de données .';

                             }

                     }
			}catch(Exception $sMsg){
				ViewInscription::afficherConnexionUtilisateur($sMsg);
			}
		}//fin de la fonction gererAjouterProduit()
        
        
        
        
		
		

    }//fin de la classe Controleur
?>