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
						self::gererUtilisateur();
						break;
					
					 case 5: 
						self::gererDeconnectionUtilisateur();
						break;	
                    
              /*   case 8: /////controleur christhian
                self::listeDesCommentaires();
                 break;*/
                    case 1 : default :
						self::gererUtilisateur();
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
						//Controleur::gererSupprimerUtilisateurAdmin();
						break;
					case "lst": default:
						Controleur::gererListeDesUtilisateurs();
					break;	
						
				}//fin du switch() sur $_GET['action']
			}catch(Exception $e){
				echo "<p>".$e->getMessage()."</p>";
			}
			
			
		}//fin de la fonction gererListeDesUtilisateurs()
        
        public static function ajax_gererUtilisateur(){
			try{
				//1èr cas : aucune action n'a été sélectionné $_GET['action'] n'a pas affecté d'une valeur
              
                if(isset($_POST['action']) == FALSE){
					$_POST['action']="sup";
				}
				
				//2e cas :L'administrateur a sélectionné une action, 
				//il existe 3 possibilités add, mod, sup ou la liste des étudiants 
                
				switch($_POST['action']){
					case "add":
						Controleur::ajax_gererAjouterUtilisateur();
						break;
					case "mod":
						Controleur::ajax_gererModifierUtilisateurAdmin();
						break;
					case "sup":
						Controleur::gererSupprimerUtilisateurAdmin();
						break;
					
						
				}//fin du switch() sur $_GET['action']
			}catch(Exception $e){
				echo "<p>".$e->getMessage()."</p>";
			}
			
			
		}//fin de la fonction ajax_gererutilisateur()
        
        
        
        
/*-------------------------------------------------------------------------------------------------------------*/		
		/**
		 * afficher la liste des Utilisateurs qui vont pouvoir être modifier ou supprimer et ajouter
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
				//var_dump($aUtilisateurs);
                
                //Afficher la liste des Utilisateurs
				ViewInscription::afficherListeUtilisateurs($aUtilisateurs, $sMsg);
								
			}catch(Exception $e){
				echo "<p>".$e->getMessage()."</p>";
			}
		}//fin de la fonction
		
        
        
        
        
        
        
        
        
        
		
/*---------------------------------------------------------------------------------------------------------------------------*/        
        
        /**
		 * afficher le formulaire d'ajout et sur submit ajouter du Utilisateur dans la base de données
		 */
		public static function gererAjouterUtilisateurAdmin(){
           
            try{
               	//1èr cas : aucun submit n'a été cliqué
				if((isset($_POST['cmd']) == false) &&(isset($_GET['valid'])!= 'valid')){
                   	//afficher le formulaire
					ViewInscription::afficherAjouterUtilisateurAdmin();
				//2e cas : le bouton submit ajouter a été cliqué
				}else{
                    
                    $oUtilisateur = new Utilisateur();
                    $oUtilisateur-> setNom($_POST['txtNom']);
                    if($oUtilisateur->verificationNom()){
                        
                         $oUtilisateur-> setCourriel($_POST['txtCourriel']);
                         if($oUtilisateur->verificationCourriel()){
                             $oUtilisateur-> setMotDePasse($_POST['txtPass']);
                             $oUtilisateur-> setConfirmation($_POST['txtPassConfirm']);
                                if($oUtilisateur->verificationMotPass()){
                                    $oUtilisateur->ajouterUtilisateur();
                                    $sMsg = "L'ajout de l'utilisateur' - ".$oUtilisateur->getNom()." - s'est déroulé avec succès.";//echo $sMsg;
                                    $aUtilisateurs = Utilisateur::rechercherListeDesUtilisateurs();
                                    ViewInscription::afficherListeUtilisateurs($aUtilisateurs,$sMsg);
                                
                                
                                }else{
                                    $sMsg = 'Les 2 mots de passe sont différents.';
                                   // $aUtilisateurs = Utilisateur::rechercherListeDesUtilisateurs();
                                    //ViewInscription::afficherListeUtilisateurs($aUtilisateurs,$sMsg);
                                    ViewInscription::afficherAjouterUtilisateur($sMsg);
                                 }
                         }else{
                             
                             $sMsg = 'Un membre possède déjà ce Courriel.';
                              ViewInscription::afficherAjouterUtilisateur($sMsg);
                            // $aUtilisateurs = Utilisateur::rechercherListeDesUtilisateurs();
                            // ViewInscription::afficherListeUtilisateurs($aUtilisateurs,$sMsg);
                        }
                        
                    }else{
                        
                        $sMsg = 'Un membre possède déjà ce Nom.';
                         ViewInscription::afficherAjouterUtilisateur($sMsg);
                        //$aUtilisateurs = Utilisateur::rechercherListeDesUtilisateurs();                                                                  // ViewInscription::afficherListeUtilisateurs($aUtilisateurs,$sMsg);
                        
                    }
                 
				}
			}catch(Exception $e){
				ViewInscription::afficherAjouterUtilisateur($e->getMessage());
			}
		}//fin de la fonction afficherAjouterUtilisateur()

/*-------------------------------------------------------------------------------------------------------------------------------*/
     public static function gererModifierUtilisateurAdmin(){
			
			try{				
				$oUtilisateur = new Utilisateur($_GET['idUtilisateur']);
                $oUtilisateur->rechercherUnUtilisateur();
                //afficher le formulaire
				ViewInscription::afficherModifierUtilisateurAdmin($oUtilisateur);			
			}catch(Exception $e){
			    $oUtilisateur = new Utilisateur($_GET['idUtilisateur']);
                $oUtilisateur->rechercherUnUtilisateur();
				//afficher le formulaire
				ViewInscription::afficherModifierUtilisateurAdmin($oUtilisateur, $e->getMessage());
			}
		}//fin de la fonction gererModifierUtilisateur()   
        
        
        public static function ajax_gererModifierUtilisateurAdmin(){
			
			try{	$oUtilisateur = new Utilisateur();
                    $oUtilisateur -> setIdUtilisateur($_POST['iUtilisateur']);
                    $oUtilisateur -> setNom($_POST['txtNom']);
                    $oUtilisateur -> setTypeUtilisateur($_POST['txtType']);
                    $oUtilisateur -> setStatus($_POST['txtStatus']);
                   //modifier dans la base de données l'étudiant
					$oUtilisateur->modifierUnUtilisateur();
					$sMsg = "La modification d'utilisateur - ".$oUtilisateur->getNom()." - s'est déroulée avec succès.";
					//$aUtilisateurs = Utilisateur::rechercherListeDesUtilisateurs();
                    ViewInscription::afficherMessage($sMsg);
                    
                //header('Location:../core/index.php?s=2');
					//ViewInscription::afficherListeUtilisateurs($aUtilisateurs, $sMsg);	
			}catch(Exception $e){
				$oUtilisateur = new Utilisateur($_GET['idUtilisateur']);
				$oUtilisateur->rechercherUnUtilisateur();
				//afficher le formulaire
				ViewInscription::afficherModifierUtilisateurAdmin($oUtilisateur, $e->getMessage());
			}
		}//fin de la fonction gererModifierUtilisateur()
                
        
        
        
        
        

  /*  public static function gererModifierUtilisateurAdmin(){
			
			try{
				//1èr cas : aucun submit n'a été cliqué
                
               // var_dump($_POST['cmd']);
				if((isset($_POST['cmd']) == false) &&(isset($_GET['valid'])!= 'valid')){    
					$oUtilisateur = new Utilisateur($_GET['idUtilisateur']);
                   // var_dump($oUtilisateur);
					$oUtilisateur->rechercherUnUtilisateur();
                    
                   	//afficher le formulaire
					ViewInscription::afficherModifierUtilisateurAdmin($oUtilisateur);
				//2e cas : le bouton submit Modifier a été cliqué
				}else{
                                                  
					$oUtilisateur = new Utilisateur();
                    $oUtilisateur -> setIdUtilisateur($_POST['iUtilisateur']);
                    $oUtilisateur -> setNom($_POST['txtNom']);
                    $oUtilisateur -> setTypeUtilisateur($_POST['txtType']);
                    $oUtilisateur -> setStatus($_POST['txtStatus']);
                   //modifier dans la base de données l'étudiant
					$oUtilisateur->modifierUnUtilisateur();
					$sMsg = "La modification d'utilisateur - ".$oUtilisateur->getNom()." - s'est déroulée avec succès.";
					$oUtilisateur = Utilisateur::rechercherListeDesUtilisateurs();
					ViewInscription::afficherListeUtilisateurs($oUtilisateur, $sMsg);
				}
			}catch(Exception $e){
				$oUtilisateur = new Utilisateur($_GET['idUtilisateur']);
				$oUtilisateur->rechercherUnUtilisateur();
				//afficher le formulaire
				ViewInscription::afficherModifierUtilisateurAdmin($oUtilisateur, $e->getMessage());
			}
		}//fin de la fonction gererModifierUtilisateur()
		*/
        
    
  /*---------------------------------------------------------------------------------------------------------------------------*/		
      		/**
		 * Supprimer Utilisateur de la base de données 
		 * Gère les refresh puisque appeler dans le fichier gererUtilisateur.php
		 * @return string message 
		 */
		public static function gererSupprimerUtilisateurAdmin(){
			
			try{
				$oUtilisateur = new Utilisateur($_GET['idUtilisateur']);
				$oUtilisateur->rechercherUnUtilisateur();
                $aRes = Array('idUtilisateur' => $_GET['idUtilisateur']);
               // $bDelete = true;
              //  var_dump($oUtilisateur);
              //  var_dump($oUtilisateur);
               
				//supprimer dans la base de données d Utilisateur
				$bDelete = $oUtilisateur->supprimerUnUtilisateur();	
                $aRes['succes'] = $bDelete;
                //header("Location:index.php?s=".$_GET['s']."&bSup=".$bDelete);
                 ViewInscription::afficherMessage('L\'utilisateur est bien supprimé ');
                ob_clean();
                echo json_encode($aRes);
                ob_flush();
			}catch(Exception $e){
				echo $e->getMessage();
			}
		}//fin de la fonction gererSupprimerUtilisateur()  
    
    
        
        
        
        
   /*---------------------------------------------------------------------------------------------------------------*/
         public static function gererDeconnectionUtilisateur() {

            try {

                //1èr cas : aucun submit n'a été cliqué
                
                session_destroy();
                header('Location:../site/index.php');
                
            } catch (Exception $e) {

            }
        }
        
        
    }//Fin de la classe Controleur

?>


        
        
        
        
        

                                                            
 

