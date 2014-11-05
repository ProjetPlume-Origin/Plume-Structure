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

          case 1: default:// Case module de Julian
            if(isset($_GET['display']) == false){

                 $_GET['display']="defaut";
            } 

            $oGenre= new Genre();
            VueGenre::afficherGenresDeroulant($oGenre);                        
            VueGenre::afficherListeDesGenres($oGenre);  
            self::gererAffichageParGenre();
            break;

          case "rech_avancee": // Case module de Julian
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
                    
            case 10: 
            //fonction qui redirige sur un affichage propre a un oeuvre
                Controleur::gererAfficherOuvrage();
                break;

                    case 'monCompte': 
                    Controleur::gererOuvrage();
                    break;
            
        }
      }catch(Exception $e){
        echo "<p>".$e->getMessage()."</p>";
      } 
      
    }//fin de la fonction gererSite()


/***************************************** PARTIE CONTROLEUR DE JULIAN ****************************************/ 
        
    /**
     * Fonction qui gère l'affichage de tous les oeuvres dans la page d'accueil triés par genre
     * @author Julian Rendon
     * @return array ce tableau contient des objets Ouvrage
     */          
    public static function gererAffichageParGenre() {

      if (!isset($_GET['display'])) {

          $_GET['display'] = "defaut";
          
      }else {

        switch ($_GET['display']) {

          case 'affichageParGenre':
            $iGenre = $_GET['genre'];
            $oGenre = new Genre();
            $aGenres = $oGenre->getGenre();
            VueOuvrage::afficherOeuvresAccueil($aGenres[$iGenre]); 
            break;

          case 'defaut': default:
            VueOuvrage::afficherOeuvresAccueil();
            break;

        } // fin switch

      }                       

    } // fin de la fonction gererAffichageParGenre()


    /**
     * Fonction qui gère l'affichage du resultat de la recherche avancée
     * @author Julian Rendon
     * @return array ce tableau contient des objets Ouvrage
     */      
    public static function gererRechercheAvancee() {

      try{
        //1èr cas : aucune recherche n'a été faite $_POST['cmd'] n'a pas affecté d'une valeur
        if(isset($_POST['cmd']) == FALSE){
            VueOuvrage::afficherFormRechercheAvancee();
        }else {
        
          //2e cas :L'utilisateur a cliqué le button de recherche, 
          //il existe 2 possibilités : auteur et titre 
          switch($_POST['optradio']){

            case "auteur":
              //Connexion à la base de données
              $oConnexion = new MySqliLib();
              $sRequete= "SELECT * FROM `ouvrage` 
                          RIGHT JOIN `utilisateur` 
                          ON `ouvrage`.`idUtilisateur`= `utilisateur`.`idUtilisateur` 
                          WHERE `utilisateur`.`sNomUtilisateur` LIKE '%".$oConnexion->getConnect()->real_escape_string($_POST['motCherche'])."%'
                          ORDER BY `sTitreOuvrage` ASC                
                        ";
                       // die ($sRequete);

              $oRes = $oConnexion->executer($sRequete);
              $aResultat= $oConnexion->recupererTableau($oRes);
              // var_dump($aResultat);  
               
              $aOuvrages = array();

              //Pour tous les enregistrements
              for($i=0; $i<count($aResultat); $i++){
                //affecter un objet à un élément du tableau
                $aOuvrages[$i] = new Ouvrage($aResultat[$i]['idOuvrage'], 
                                $aResultat[$i]['sTitreOuvrage'], 
                                $aResultat[$i]['sDateOuvrage'], 
                                $aResultat[$i]['sCouvertureOuvrage'], 
                                $aResultat[$i]['sGenre'], 
                                " ",
                                $aResultat[$i]['idUtilisateur']);
                // print_r($aOuvrages[$i]);
                // print_r("<br>");                                
              }
              //retourner le tableau d'objets
              // return $aOuvrages;
              // var_dump($aResultat);
              
              VueOuvrage::afficherFormRechercheAvancee();
              // if(count($aOuvrages)>0) {
              VueOuvrage::afficherResultatsRechercheAvancee($aOuvrages);
              // }else{
                  // VueOuvrage::afficherResultatsRechercheAvancee($aOuvrages,$sMsg="Aucun resultat");
              // }
              break;

            case "titre":
              //Connexion à la base de données
              $oConnexion = new MySqliLib();
              $sRequete= "SELECT * FROM `ouvrage` 
                          RIGHT JOIN `utilisateur` 
                          ON `ouvrage`.`idUtilisateur`= `utilisateur`.`idUtilisateur` 
                          WHERE `ouvrage`.`sTitreOuvrage` LIKE '%".$oConnexion->getConnect()->real_escape_string($_POST['motCherche'])."%'
                          ORDER BY `sTitreOuvrage` ASC                
                        ";
              $oRes = $oConnexion->executer($sRequete);
              $aResultat= $oConnexion->recupererTableau($oRes);
              // var_dump($aResultat);  
               
              $aOuvrages = array();

              //Pour tous les enregistrements
              for($i=0; $i<count($aResultat); $i++){
                  //affecter un objet à un élément du tableau
                  $aOuvrages[$i] =  new Ouvrage($aResultat[$i]['idOuvrage'], 
                                  $aResultat[$i]['sTitreOuvrage'], 
                                  $aResultat[$i]['sDateOuvrage'], 
                                  $aResultat[$i]['sCouvertureOuvrage'], 
                                  $aResultat[$i]['sGenre'], 
                                  " ",
                                  $aResultat[$i]['idUtilisateur']);
                  // print_r($aOuvrages[$i]);
                  // print_r("<br>");                                
              }
              //retourner le tableau d'objets
              // return $aOuvrages;
              // var_dump($aResultat);
              
              VueOuvrage::afficherFormRechercheAvancee();
              // if(count($aOuvrages)>0) {
              VueOuvrage::afficherResultatsRechercheAvancee($aOuvrages);
              // }else{
                  // VueOuvrage::afficherResultatsRechercheAvancee($aOuvrages,$sMsg="Aucun resultat");
              // }
              break;

            default:
                // VueAccueil::afficherListeDesCategories();
                VueOuvrage::afficherFormRechercheAvancee();
                  
          }//fin du switch sur $_POST['optradio']
        }
      }catch(Exception $e){
          echo "<p>".$e->getMessage()."</p>";
      }           
      
    }//fin de la fonction gererRechercheAvancee()


/***************************************** FIN PARTIE CONTROLEUR DE JULIAN ****************************************/ 
     
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
                    $oUtilisateur-> setNom($_POST['txtNom']);
                    if($oUtilisateur->verificationNom()){
                        
                         $oUtilisateur-> setCourriel($_POST['txtCourriel']);
                         if($oUtilisateur->verificationcourriel()){
                             $oUtilisateur-> setMotDePasse($_POST['txtPass']);
                             $oUtilisateur-> setConfirmation($_POST['txtPassConfirm']);
                                if($oUtilisateur->verificationMotPass()){
                                    $oUtilisateur->ajouterUtilisateur();
                                    $sMsg = "L'ajout de l'utilisateur' - ".$oUtilisateur->getNom()." - s'est déroulé avec succès.";
                                    header('Location:../site/index.php?s=3');
                                    // ViewInscription::afficherConnexionUtilisateur($sMsg);
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
                        $oUtilisateur-> setCourriel($_POST['txtCourriel']);
                            if(!($oUtilisateur->verificationcourriel())){
                                $oUtilisateur-> setMotDePasse(md5($_POST['txtPass']));
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
               
                unset($_SESSION['idUtilisateur']);
                session_destroy();
                        
                header('Location:../site/index.php');
                exit();

                
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
			
  /*echo"faire la session como id utilisatur".$_SESSION['idContenu'] ; */
			
			
			
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
		
     


     //*************************JALAL Controlleur ouvrage à ne pas toucher svp! vous avez ecrasé mon code  *****************************************************************************************************************************************************************

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
          case "aff":
          Controleur::gererAfficherOuvrage();
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
            if(isset($_GET['bMod']) == true){
              $sMsg ="La modification de L'ouvrage s'est déroulée avec succès.";
            }
            if(isset($_GET['bAjo']) == true){
              $sMsg ="L'ajout de l'ouvrage s'est déroulée avec succès.";
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

              var_dump($_POST);
              //die('ici');
               //apres la mise dans un tableau on fait l'insertion 
                    //ajout le info de l'ouvrage dans la base de données ouvrage
              $oOuvrage = new Ouvrage($_POST['idOuvrage'], $_POST['txtTitre'],' ', ' ', $_POST['txtGenre'], ' ', $_SESSION['IdUtilisateur']);

              //ca permet de verifier si le titre existe deja 
              $aOuvrages = Ouvrage::rechercherTitreOuvrage();
              for ($i=0; $i < count($aOuvrages) ; $i++) { 
                if (in_array($_POST['txtTitre'], $aOuvrages)) {
                  $ifExist  = 'Yes';

                } else {
                 $ifExist  = 'No';
               }
             }

             if ($ifExist  == 'Yes') {

               $sMsg = '<br><span class="messageErreur">Le titre '.$_POST['txtTitre'].' que vous avez choisis existe deja!<span>';

               VueOuvrage::afficherAjouterOuvrage($sMsg);

             } else {

              $oOuvrage->ajouterOuvrage();

              if (empty($contenuDivision)) {
                $contenuDivision = 'Aucun article pour le moment..';
                $cOuvrage = new Ouvrage($_POST['idOuvrage'], $_POST['txtTitre'],' ', ' ', $_POST['txtGenre'],$contenuDivision);

                //ajout le contenu dans la base de données paragraphe
                $cOuvrage->ajouterContenu();
                header("Location:index.php?s=".$_GET['s']."&bAjo=");

              } else {
                for ($i = 0; $i < count($contenuDivision); $i++) { 

                  $cOuvrage = new Ouvrage($_POST['idOuvrage'], $_POST['txtTitre'],' ', ' ', $_POST['txtGenre'],$contenuDivision[$i]);

                    //ajout le contenu dans la base de données paragraphe
                  $cOuvrage->ajouterContenu();
                }

                header("Location:index.php?s=".$_GET['s']."&bAjo=");
              }
            }
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
                $cOuvrage->modifierContenu();
              }

                    //modifier dans la base de données l'Ouvrage
              $oOuvrage->modifierOuvrage();

              header("Location:index.php?s=".$_GET['s']."&bMod=");

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
            header("Location:index.php?s=".$_GET['s']."&bSup");


          }catch(Exception $e){
            return $e->getMessage();
          }
        }//fin de la fonction gererSupprimerOuvrage()


        /**
         * afficher le formulaire de modification et sur submit modifier l'Ouvrage dans la base de données 
         */
        public static function gererAfficherOuvrage(){

          try{
                //1èr cas : aucun submit n'a été cliqué
            if(isset($_POST['cmd']) == false){
              $oOuvrage = new Ouvrage($_GET['idOuvrage']);

              $oOuvrage->rechercherOuvrage();
              $oOuvrage->rechercherContenu();

                    //afficher le formulaire
              VueOuvrage::afficherOuvrage($oOuvrage);
                //2e cas : le bouton submit Modifier a été cliqué

            }
          }catch(Exception $e){

                //afficher le formulaire
            VueOuvrage::afficherOuvrage($oOuvrage, $e->getMessage());
          }
        }//fin de la fonction gererModifierOuvrage()
     
    
        
        

     
     
    }//fin de la classe Controleur
?>