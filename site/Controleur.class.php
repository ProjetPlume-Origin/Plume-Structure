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

					
					case 2: 
						Controleur::gererRechercheAvancee();
						break;

                    case 3: 
                        Controleur::gererConnexionUtilisateur();
                        break; 

                    case 4: 
                        Controleur::gererInscriptionUtilisateur();
                        break;  

                    case 5: 
						Controleur::gererDeconnectionUtilisateur();
						break;
                    
                  case 6: /////controleur christhian
						Controleur::exampleOuvrage();
						break;

                  case 7: /////controleur christhian                           /*******du  contrelerue**/
						Controleur::exampleComment(); 
						break;
					
				  case 8: /////controleur christhian
						Controleur::listeDesCommentaires();
						break;
						
				  case 9: ////controleur christhian
						Controleur::switchCommentaire();
						break;
								
                    case 1: default://Accueil 
                        VueAccueil::afficherListeDesCategories();						

				}
			}catch(Exception $e){
				echo "<p>".$e->getMessage()."</p>";
			}	
			
		}


        /**
        * redirige selon l'action
        */     
        public static function gererRechercheAvancee() {
            try{
                //1èr cas : aucune action n'a été sélectionné $_GET['action'] n'a pas affecté d'une valeur
                if(isset($_GET['action']) == FALSE){
                    $_GET['action']="lst";
                }
                
                //2e cas :L'utilisateur a sélectionné une action, 
                //il existe 1 possibilité : rech  
                switch($_GET['action']){
                    case "rech":
                        Controleur::gererRechercheOuevrage();
                        break;
                                           
                    case "lst": default:
                        VueAccueil::afficherRechercheAvancee();
                        
                }//fin du switch() sur $_GET['action']
            }catch(Exception $e){
                echo "<p>".$e->getMessage()."</p>";
            }           
            
        }//fin de la fonction gererRechercheAvancee()


        /**
         * Rechercher et afficher les ouevrages
         */
        public static function gererRechercheOuevrage(){
            try{
                
                if(isset($_POST['cmd']) == false){
                    VueAccueil::afficherRechercheAvancee();
                }else{
                    // print_r ("voila");
                    //Instancier un objet Ouevrage avec l'info saisi par l'internaute $_POST['txtNo']
                    $oOuevrage = new Ouevrage($_POST['txtNo']);
                    //Recherche les ouevrages par mot clé, titre ou auteur
                    $bTrouve = $oOuevrage->rechercherListeDesOeuvres();                  
                    //Si L'ouevrage existe
                    if($bTrouve == true){
                        //afficher l'ouevrage
                        VueOuevrage::afficherUnOuevrage($oOuevrage);
                    }else//sinon
                    {
                        //afficher un message "Aucun ouevrage ne correspond à votre recherche"
                        VueOuevrage::afficherRechercheAvancee("Aucun ouevrage ne correspond à votre recherche");
                    }
                        
                }
            }catch(Exception $e){
                //repropose la saisie du numéro d'ouevrage, une erreur de type
                VueOuevrage::afficherRechercheAvancee($e->getMessage());
            }
            
        }//fin de la function gererRechercheOuevrage()


			
		/**
		 * afficher le formulaire d'ajout et sur submit ajouter du Produit dans la base de données
		 */
		public static function gererInscriptionUtilisateur(){
			
			try{
				//1èr cas : aucun submit n'a été cliqué
				if(isset($_POST['cmd']) == false) {
					//afficher le formulaire
                  if(isset($_GET['s'])){
                                //
                   
            					ViewInscription::afficherAjouterUtilisateur();
            				//2e cas : le bouton submit Modifier a été cliqué
                  }          //
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
                                   // ViewInscription::afficherConnexionUtilisateur($sMsg);
                                    header('Location:../site/index.php?s=3');
                                                                     
                                 }else{
                                    $sMsg = 'Les 2 mots de passe sont différents.';
                                    ViewInscription::afficherAjouterUtilisateur($sMsg);
                                 }
                         }else{
                             
                             $sMsg = 'Un membre possède déjà ce Courriel.';
                              ViewInscription::afficherAjouterUtilisateur($sMsg);
                        }
                        
                    }else{
                        
                        $sMsg = 'Un membre possède déjà ce Nom.';
                        ViewInscription::afficherAjouterUtilisateur($sMsg);
                        
                        
                    }
                        /* if($oUtilisateur){                        
                            ViewInscription::afficherAjouterUtilisateur($sMsg);
                         }*/
                      
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
                        $oUtilisateur = new Utilisateur();                    
                        $oUtilisateur-> setCourriel(mysql_real_escape_string($_POST['txtCourriel']));
                            if(!($oUtilisateur->verificationcourriel())){
                                $oUtilisateur-> setMotDePasse(mysql_real_escape_string(md5($_POST['txtPass'])));
                                $aUtilisateur = $oUtilisateur->connexionUtilisateur();
                                    if(!empty($aUtilisateur)){
                                         $sMsg = "La connexion  - ".$oUtilisateur->getNom()." - s'est déroulé avec succès.";
                                        $_SESSION["IdUtilisateur"] = $aUtilisateur[0]['idUtilisateur'];
                                        $_SESSION["sNomUtilisateur"] = $aUtilisateur[0]['sNomUtilisateur'];
										$_SESSION["sTypeUtilisateur"] = $aUtilisateur[0]['sTypeUtilisateur'];
                                       // echo $_SESSION["IdUtilisateur"]; 
									    if($_SESSION["sTypeUtilisateur"] =='Membre'){
											//VueAccueil::afficherListeDesCategories($sMsg);
                                            header('Location:../site/index.php');

										}else{
											header('Location:../core/index.php');
										
										}
                                     }else{

                                         $sMsg = 'Ce Courriel  ou  mot de passe n\'existent pas dans notre base de données .';
                                          ViewInscription::afficherConnexionUtilisateur($sMsg);
                                     }
                            }else{
                                    $sMsg = 'Ce Courriel n\'existe pas dans notre base de données .';
									ViewInscription::afficherConnexionUtilisateur($sMsg);

                             }

                     }
			}catch(Exception $sMsg){
				ViewInscription::afficherConnexionUtilisateur($sMsg);
			}
		}//fin de la fonction gererAjouterProduit()


        /*----------------------------------------------------------------------------------------------------------------------------*/        
        /**
         * afficher le formulaire de deconnexion et sur submit on deconnecte notre compte
         */

        public static function gererDeconnectionUtilisateur() {

            try {

                //1èr cas : aucun submit n'a été cliqué
                
                    session_destroy();
                    header('Location:../site/index.php');

            } catch (Exception $e) {

            }
        }
        
     /********
        **
        ** example 
        *  ouvrage
        * Christhian Diaz
        ***/
        
        public static function exampleOuvrage(){
        	echo "
			<h1>Lorem Ipsum</h1>
			
			<div class='paragraph data-pid='1'>
				<div class='textpar'>
					Paragraph One
				</div>
				
				<div class='comments'>
					<div class='comment' data-uid=''></div>
					<div class='comment comm-two'></div>
					<div class='comment comm-thr'></div>
				
					<div class='add-comment'>
						Add
					</div>
				</div>
				
				
			
			</div>
			<p class='paragraph' data-pid='2'>
				Paragraph Two
			</p>
			<p class='paragraph' data-pid='3'>
				Paragraph Three
			</p>
        	";
        }  ///fin exampe ouvrage
		
     
     
     	/*****
		*functionexampleComment
		*@Christhian Diaz
		*
		****/
		public  static function exampleComment()
		{
			if (!empty ($_POST)){
					
				$resultat = Commentaire::ajouterCommentaire($_POST);
				                    
                if ($resultat !== false) {
					//echo "Saved as ID: $resultat";
                    echo"Comment".$_POST['sContenuCommentaire']."saved.";
				} else {
					echo "Error Saving";
					include("../vues/commentaires/add.php");
				}
								
			} else {
				include("../vues/commentaires/add.php");	
			}
		}/////////fin example comment christhian diaz 

        //*******afiicher la liste de commentaries***/
		public static function listeDesCommentaires()
		{
				
			$data = Commentaire::index();
			
			include("../vues/commentaires/index.php");
		}//fin affiche liste commentaries


        /***
         *
         * Active et desative le commentaires
         *  Christhian Diaz
         */
		public static function switchCommentaire()
		{
			Commentaire::setActive($_GET['cid'],$_GET['st']);
			header('Location: index.php?s=6');
		}/// fin function active et desative
		
     
     
     
     
     
     
     
     
     
     
    }//fin de la classe Controleur
?>