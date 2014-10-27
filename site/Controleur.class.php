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
				
			
				if(isset($_SESSION["IdUtilisateur"]))
				{
					include_once "../vues/templates/navConnecte.php";
					echo "session" .$_SESSION["IdUtilisateur"];
				}
				
				else
				{
					include_once "../vues/templates/nav.php";
					echo"dfkjdfhkjdf";
				}   
				
				
				switch($_GET['s']){

					 case 1: 
                        VueAccueil::afficherListeDesCategories();	
                        break;
					case 2: 
						self::gererRechercheAvancee();
						break;

                    case 3: 
                        self::gererConnexionUtilisateur();
                        break; 

                    case 4: 
                        self::gererInscriptionUtilisateur();
                        break;  

                    case 5: 
						self::gererDeconnectionUtilisateur();
						break;
                    
                  case 6: /////controleur christhian
						Controleur::exampleOuvrage();
						break;

                  case 7: /////controleur christhian                           /*******du  contrelerue**/
						self::exampleComment(); 
						break;
					
				  case 8: /////controleur christhian
						self::listeDesCommentaires();
						break;
						
				  case 9: ////controleur christhian
						self::switchCommentaire();
						break;
								
               
                
                default://Accueil 
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
                                    ViewInscription::afficherConnexionUtilisateur($sMsg);
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
                
            } catch (Exception $e) {

            }
        }
        


       

        
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
		
     //*************************JALALControlleur ouvrage a ne pas toucher svp vous avez ecrasé mon code  *********************************************************************
     
     
     public static function gererSiteOuvrage(){
            try {
                //1èr cas : aucune option du menu n'a été sélectionné 
                if(isset($_GET['s']) == FALSE){
                    $_GET['s']='monCompte';
                }
                //2e cas :L'administrateur a sélectionné une option dans le menu
                switch($_GET['s']){
                    case 'monCompte': 
                    Controleur::gererOuvrage();
                    break;
                    
                }
            }catch(Exception $e){
                echo "<p>".$e->getMessage()."</p>";
            }

        }//fin de la fonction gererSite()
        
        public static function gererOuvrage(){
            try{
                //1èr cas : aucune action n'a été sélectionné $_GET['action'] n'a pas affecté d'une valeur
                if(isset($_GET['action']) == FALSE){
                    $_GET['action']="lst";
                }
                
                //2e cas :L'administrateur a sélectionné une action, 
                //il existe 3 possibilités add, mod, sup ou la liste des Ouvrage 
                switch($_GET['action']){
                    case "add":
                    Controleur::gererAjouterOuvrage();
                    break;
                    case "mod":
                    Controleur::gererModifierOuvrage();
                    break;
                    case "sup":
                    Controleur::gererSupprimerOuvrage();
                    break;
                    case "lst": default:
                    Controleur::gererListeDesOuvrages();
                }//fin du switch() sur $_GET['action']
            }catch(Exception $e){
                echo "<p>".$e->getMessage()."</p>";
            }
            
        }//fin de la fonction gererOuvrage()
        
        /**
         * afficher la liste des Ouvrage qui vont pouvoir être modifier ou supprimer et ajouter
         */
        public static function gererListeDesOuvrages(){
            try{
                $sMsg = "";
                
                if(isset($_GET['bSup']) == true){
                    $sMsg ="La suppression s'est bien déroulée.";
                }
                //Rechercher la liste des Ouvrage
                $aOuvrages = Ouvrage::rechercherListeDesOuvrages();
                //Afficher la liste des Ouvrage
                VueOuvrage::afficherListeOuvrages($aOuvrages, $sMsg);

            }catch(Exception $e){
                echo "<p>".$e->getMessage()."</p>";
            }
        }//fin de la fonction gererListeDesOuvrage()
        
        /**
         * afficher le formulaire d'ajout et sur submit ajouter l'Ouvrage dans la base de données
         */
        public static function gererAjouterOuvrage(){
            
            try{
                //1èr cas : aucun submit n'a été cliqué
                if(isset($_POST['cmd']) == false){
                    //afficher le formulaire
                    VueOuvrage::afficherAjouterOuvrage();
                //2e cas : le bouton submit Modifier a été cliqué
                }else{
                //permet de faire un explode de contenu pour le diviser
                    $dContenu = $_POST['txtContenu'];
                    $tabDivision = array();
                    $cDivision = explode("\r\n", $dContenu);
                    $contenuDivision = array_values(array_filter ($cDivision));
                    
               //apres la mise dans un tableau on fait l'insertion 
                    //ajout le info de l'ouvrage dans la base de données ouvrage
                    $oOuvrage = new Ouvrage($_POST['idOuvrage'], $_POST['txtTitre'],' ', $_POST['txtGenre']);
                    $oOuvrage->ajouterOuvrage();
                    for ($i = 0; $i < count($contenuDivision); $i++) { 

                        $cOuvrage = new Ouvrage($_POST['idOuvrage'], $_POST['txtTitre'],' ', $_POST['txtGenre'],$contenuDivision[$i]);

                    //ajout le contenu dans la base de données paragraphe
                        $cOuvrage->ajouterContenu();
                    }
                                        
                    $sMsg = "L'ajout de  - ".$oOuvrage->getOuvrageTitre()." - s'est déroulé avec succès.";
                    VueOuvrage::afficherAjouterOuvrage($sMsg);
                }
            }catch(Exception $e){
                VueOuvrage::afficherAjouterOuvrage($e->getMessage());
            }
        }//fin de la fonction gererAjouterOuvrage()
        
        /**
         * afficher le formulaire de modification et sur submit modifier l'Ouvrage dans la base de données 
         */
        public static function gererModifierOuvrage(){
            
            try{
                //1èr cas : aucun submit n'a été cliqué
                if(isset($_POST['cmd']) == false){
                    $oOuvrage = new Ouvrage($_GET['idOuvrage']);

                    $oOuvrage->rechercherOuvrage();
                    $oOuvrage->rechercherContenu();

                    //afficher le formulaire
                    VueOuvrage::afficherModifierOuvrage($oOuvrage);
                //2e cas : le bouton submit Modifier a été cliqué
                }else{
                //permet de faire un explode de contenu pour le diviser
                    $dContenu = $_POST['txtContenu'];
                    $tabDivision = array();
                    $cDivision = explode("\r\n", $dContenu);
                    $tContenu = array_values(array_filter($cDivision));
                    
                    $oOuvrage = new Ouvrage($_POST['idOuvrage'], $_POST['txtTitre'],' ', $_POST['txtGenre']);
                    //appel a la fonction pour ajout des paragraphes
                        $oOuvrage->supprimerContenu();
                    //apres la mise dans un tableau on fait l'insertion 
                    for ($i = 0; $i < count($tContenu); $i++) { 
                        $cOuvrage = new Ouvrage($_POST['idOuvrage'], $_POST['txtTitre'],' ', $_POST['txtGenre'], $tContenu[$i]);
                        
                        //appel a la fonction pour ajout des paragraphes
                        $cOuvrage->ajouterContenu();
                    }
                    
                    //modifier dans la base de données l'Ouvrage
                    $oOuvrage->modifierOuvrage();
                    
                    $sMsg = "La modification de L'ouvrage - ".$oOuvrage->getOuvrageTitre()." - s'est déroulée avec succès.";
                    $aOuvrage = Ouvrage::rechercherListeDesOuvrages();
                    VueOuvrage::afficherListeOuvrages($aOuvrage, $sMsg);
                }
            }catch(Exception $e){
                $oOuvrage = new Ouvrage($_GET['idOuvrage']);
                $oOuvrage->rechercherOuvrage();
                $oOuvrage->rechercherContenu();
                //afficher le formulaire
                VueOuvrage::afficherModifierOuvrage($oOuvrage, $e->getMessage());
            }
        }//fin de la fonction gererModifierOuvrage()
        
        /**
         * Supprimer l'Ouvrage de la base de données 
         * Gère les refresh puisque appeler dans le fichier gererOuvrage.php
         * @return string message 
         */
        public static function gererSupprimerOuvrage(){
            try{
                $oOuvrage = new Ouvrage($_GET['idOuvrage']);
                //supprimer dans la base de données l'Ouvrage
                $bResultat = $oOuvrage->supprimerOuvrage();     
            }catch(Exception $e){
                return $e->getMessage();
            }
        }//fin de la fonction gererSupprimerOuvrage()
     
     
     
     
     
     
    }//fin de la classe Controleur
?>