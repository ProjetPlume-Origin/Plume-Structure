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
						Controleur::gererUtilisateur();
					 case 5: 
						Controleur::gererDeconnectionUtilisateur();
						break;		
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
						Controleur::gererSupprimerUtilisateurAdmin();
						break;
					case "lst": default:
						Controleur::gererListeDesUtilisateurs();
						
						
				}//fin du switch() sur $_GET['action']
			}catch(Exception $e){
				echo "<p>".$e->getMessage()."</p>";
			}
			
			
		}//fin de la fonction gererListeDesUtilisateurs()
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
				var_dump($aUtilisateurs);
                
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
				if(isset($_POST['cmd']) == false){
					//afficher le formulaire
					ViewInscription::afficherAjouterUtilisateurAdmin();
				//2e cas : le bouton submit Modifier a été cliqué
				}else{
                  
                    $oUtilisateur = new Utilisateur();
                    $oUtilisateur-> setNom(mysql_real_escape_string($_POST['txtNom']));
                    if($oUtilisateur->verificationNom()){
                        
                         $oUtilisateur-> setCourriel(mysql_real_escape_string($_POST['txtCourriel']));
                         if($oUtilisateur->verificationcourriel()){
                             $oUtilisateur-> setMotDePasse(mysql_real_escape_string($_POST['txtPass']));
                             $oUtilisateur-> setConfirmation(mysql_real_escape_string($_POST['txtPassConfirm']));
                                if($oUtilisateur->verificationMotPass()){
                                    $oUtilisateur->ajouterUtilisateur();
                                    $sMsg = "L'ajout de l'utilisateur' - ".$oUtilisateur->getNom()." - s'est déroulé avec succès.";echo $sMsg;
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

    public static function gererModifierUtilisateurAdmin(){
			
			try{
				//1èr cas : aucun submit n'a été cliqué
				if(isset($_POST['cmd']) == false){
					$oUtilisateur = new Utilisateur($_GET['iUtilisateur']);
                   // var_dump($oUtilisateur);
					$oUtilisateur->rechercherUnUtilisateur();
                    
                   	//afficher le formulaire
					ViewInscription::afficherModifierUtilisateurAdmin($oUtilisateur);
				//2e cas : le bouton submit Modifier a été cliqué
				}else{
                    
                   
                  
					$oUtilisateur = new Utilisateur();
                    echo"post id utilisateur".$_POST['iUtilisateur'];
                    $oUtilisateur -> setIdUtilisateur($_POST['iUtilisateur']);
                    $oUtilisateur -> setNom($_POST['txtNom']);
                    $oUtilisateur -> setTypeUtilisateur($_POST['txtType']);
                    $oUtilisateur -> setStatus($_POST['txtStatus']);
                     var_dump($oUtilisateur);
                   
					//modifier dans la base de données l'étudiant
					$oUtilisateur->modifierUnUtilisateur();
					$sMsg = "La modification de utilisateur - ".$oUtilisateur->getNom()." - s'est déroulée avec succès.";
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
                var_dump($oUtilisateur);
                var_dump($oUtilisateur);
                 var_dump($oUtilisateur);
                var_dump($oUtilisateur);
                 var_dump($oUtilisateur);
                var_dump($oUtilisateur);
				//supprimer dans la base de données d Utilisateur
				return $oUtilisateur->supprimerUnUtilisateur();				
			}catch(Exception $e){
				return $e->getMessage();
			}
		}//fin de la fonction gererSupprimerUtilisateur()  
    
    
        
        
        
        
   /*---------------------------------------------------------------------------------------------------------------*/
         public static function gererDeconnectionUtilisateur() {

            try {

                //1èr cas : aucun submit n'a été cliqué
                
                    session_destroy();
                
            } catch (Exception $e) {

            }
        }
        
        
    }//Fin de la classe Controleur

?>


        
        
        
        
        

                                                            
 

