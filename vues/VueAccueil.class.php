<?php
  class VueAccueil {
    /**
     * Côté utilisateur - Afficher la page d'accueil
     * @param 
     */
    
    public static function afficherListeDesCategories($sMsg="&nbsp;") {
      echo "
        <p>".$sMsg."</p>
        <div class=\"row\">
          <!-- recherche par genre -->
          <div class=\"btn-Categories\">
            <div class=\"btn-group hidden-lg hidden-sm col-xs-12\">
              <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\">
                recherche par genre <span class=\"caret\"></span>
              </button>
              <ul class=\"dropdown-menu\" role=\"menu\">
                <li><a href=\"#\">Science-fiction et fantastique</a></li>
                <li><a href=\"#\">Romans policiers</a></li>
                <li><a href=\"#\">Romans d'épouvante</a></li>
                <li><a href=\"#\">Poésie et théâtre</a></li>
                <li><a href=\"#\">Littérature étrangèr</a></li>
                <li><a href=\"#\">Littérature Québécoise</a></li>
                <li><a href=\"#\">Littérature érotique</a></li>
              </ul>
            </div>
            <!-- Lien Recherche avancée -->
            <div class=\"col-lg-6 col-xs-12 rechercheAvance\">
              <a href=\"index.php?s=2\">Recherche avancée</a>
            </div>
          </div>        
        </div>  

        <div class=\"row\">        
          <!-- COLONNE GAUCHE GENRES -->
          <div class=\"col-lg-3 col-sm-3 hidden-xs\">

            <!-- recherche par genre -->
            <div class=\"listeGenres\">
              <h2>Genres</h2>
              <ul>
                <li><a href='index.php?s=6'>Science-fiction et fantastique</a></li>
                <li><a href=\"#\">Romans policiers</a></li>
                <li><a href=\"#\">Romans d'épouvante</a></li>
                <li><a href=\"#\">Poésie et théâtre</a></li>
                <li><a href=\"#\">Littérature étrangèr</a></li>
                <li><a href=\"#\">Littérature Québécoise</a></li>
                <li><a href=\"#\">Littérature érotique</a></li>
              </ul>
            </div>

          </div>  <!-- FIN COLONNE GAUCHE GENRES -->
              
      ";
    }// fin de la function afficherListeDesCategories


    /**
     * Côté utilisateur - Afficher les oeuvres selon la categorie sélectionnée
     * @param 
     */
    public static function rechercherListeDesOeuvres($sGenre=""){
      //Connexion à la base de données
      $oConnexion = new MySqliLib();
      //Requête de recherche de tous les oeuvres
      if($sGenre){

        $sRequete = "SELECT * FROM ouvrage WHERE sGenre = '$sGenre';";

      }else{ 

        $sRequete = "SELECT * FROM ouvrage;"; 

      }
      echo  $sRequete;
      
      //Exécuter la requête
      $oResult = $oConnexion->executer($sRequete);
      //Récupérer le tableau des enregistrements
      $aEnreg = $oConnexion->recupererTableau($oResult);
      $aOeuvres = array();
      //Pour tous les enregistrements
      for($iEnreg=0; $iEnreg<count($aEnreg); $iEnreg++){
      //affecter un objet à un élément du tableau
      $aOeuvres[$iEnreg] =  new Ouvrage($aEnreg[$iEnreg]['idOuvrage'], 
                                       $aEnreg[$iEnreg]['sTitreOuvrage'], 
                                       $aEnreg[$iEnreg]['sDateOuvrage'],
                                       $aEnreg[$iEnreg]['sCouvertureOuvrage'],
                                       $aEnreg[$iEnreg]['sGenre'],
                                       $aEnreg[$iEnreg]['idUtilisateur']);
                                            
      }
      //retourner le tableau d'objets
      return $aOeuvres;
    }//fin de la fonction rechercherListeDesOeuvres()


    public function afficherRechercheAvancee() {
      echo "

        <div class=\"row\">

          <!-- COLONNE GAUCHE GENRES -->
          <div class=\"col-lg-3 col-sm-3 hidden-xs\">

            <!-- recherche par genre -->
            <div class=\"listeGenres\">
              <h2>Genres</h2>
              <ul>
                <li><a href=\"\">Science-fiction et fantastique</a></li>
                <li><a href=\"\">Romans policiers</a></li>
                <li><a href=\"\">Romans d'épouvante</a></li>
                <li><a href=\"\">Poésie et théâtre</a></li>
                <li><a href=\"\">Littérature étrangèr</a></li>
                <li><a href=\"\">Littérature Québécoise</a></li>
                <li><a href=\"\">Littérature érotique</a></li>
              </ul>
            </div>

          </div>  <!-- FIN COLONNE GAUCHE GENRES -->

          <!-- COLONNE DROITE -->
          <div class=\"col-lg-9 col-sm-9 col-xs-12\">
            
            <!-- Recherche Avancée -->
            <div class=\"barreRecherche col-xs-12\">
              <h1>Recherche Avancée</h1>

              <form class=\"navbar-form navbar-left\" role=\"search\">
                <div class=\"form-group\">
                  <input type=\"text\" class=\"form-control\" placeholder=\"\">
                </div>Rechercher par : 
                <label class=\"radio-inline\">
                  <input type=\"radio\" name=\"optradio\">Mot clé
                </label>
                <label class=\"radio-inline\">
                  <input type=\"radio\" name=\"optradio\" checked=\"\">Titre
                </label>
                <label class=\"radio-inline\">
                  <input type=\"radio\" name=\"optradio\">Auteur
                </label>
                <button type=\"submit\" class=\"btn btn-default\">Rechercher</button>
              </form>

            </div> <!-- Fin Recherche Avancée -->            

          </div>  <!-- FIN COLONNE DROITE -->

        </div>  <!-- Fin Row -->
      ";
    }// fin de la fonction afficherRechercheAvancee()

      
      
    public static function afficherOeuvresAccueil(){
          
      $oConnexion = new MySqliLib();
    
      $sRequete = "SELECT * FROM ouvrage;";
      $oResult = $oConnexion->executer($sRequete);
      $aOeuvre = $oConnexion->recupererTableau($oResult);


      echo'<div class="col-lg-9 col-sm-9 col-xs-12 ouevreAccueil">';
    
      for($iOeuvre=0; $iOeuvre<count($aOeuvre) ; $iOeuvre++)
      {
          $sRequeteNomUtilisateur = "SELECT sNomUtilisateur FROM utilisateur WHERE idUtilisateur =  ".$aOeuvre[$iOeuvre]["idUtilisateur"].";";
      $oResultNom = $oConnexion->executer($sRequeteNomUtilisateur);
    
       $aNom = $oConnexion->recupererTableau($oResultNom);
          echo'
              <a href="index.php'.$aOeuvre[$iOeuvre]["idOuvrage"].'">
                <div class="col-lg-3 col-sm-6 col-xs-12 produit" >
                  <div class="produit-image">
                      <td><img src='.$aOeuvre[$iOeuvre]["sCouvertureOuvrage"].'></td>
                  </div>
                  <h2> '.$aOeuvre[$iOeuvre]["sTitreOuvrage"].'</h2>
                  <p class="produit-date">'.$aOeuvre[$iOeuvre]["sDateOuvrage"].'</p>
                  <p class="produit-auteur">Par: '.$aNom[0]['sNomUtilisateur'].'</p>
                  <img src="img/imgAccueil/view-icon.png" width="20px"><span class="produit-vues"> 25</span>
                  <img src="img/imgAccueil/comment-icon.png" width="13px"><span class="produit-commentaires"> 12</span>
                </div>
              </a>
          
          ';
      }

      echo"</div></div>";
    }




  } // fin de la classe VueAccueil()

?>

