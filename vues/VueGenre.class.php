<?php
  class VueGenre{
    
    /**
     * Côté utilisateur - Afficher la page d'accueil
     * @param 
     */
    
    public static function afficherMenuRechercheAvancee(Genre $oGenre, $sMsg="&nbsp;") {
      echo "
        <p>".$sMsg."</p>
        <div class=\"row\">
          <!-- recherche par genre -->
          <div class=\"btn-Categories\">
            <div class=\"btn-group hidden-lg hidden-sm col-xs-12\">
              <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\">
                recherche par genre <span class=\"caret\"></span>
              </button>
              <ul class=\"dropdown-menu\" role=\"menu\">";
            $aGenres = $oGenre->getGenre();
            for($iGenre=0;$iGenre<count($aGenres);$iGenre++){
              echo "<li><a href=\"#\">".$aGenres[$iGenre]."</a></li>";
            }
            echo "
              </ul>
            </div>
            <!-- Lien Recherche avancée -->
            <div class=\"col-lg-6 col-xs-12 rechercheAvance\">
              <a href=\"index.php?s=2\">Recherche avancée</a>
            </div>
          </div>        
        </div> <!-- fin row -->
      ";
    }// fin de la function afficherMenuRechercheAvancee()  


    /**
     * Côté utilisateur - Afficher la page d'accueil
     * @param 
     */
    
    public static function afficherListeDesGenres(Genre $oGenre, $sMsg="&nbsp;") {
      echo "
        <p>".$sMsg."</p>
        <div class=\"row\">        
          <!-- COLONNE GAUCHE GENRES -->
          <div class=\"col-lg-3 col-sm-3 hidden-xs\">

            <!-- recherche par genre -->
            <div class=\"listeGenres\">
              <h2>Genres</h2>

              <ul>";
            $aGenres = $oGenre->getGenre();
            for($iGenre=0;$iGenre<count($aGenres);$iGenre++){
              echo "<li><a href=\"#\">".$aGenres[$iGenre]."</a></li>";
            }
            echo "
              </ul>
            </div>
          </div>  <!-- FIN COLONNE GAUCHE GENRES -->
              
      ";
    }// fin de la function afficherListeDesGenres


    /**
     * Fonction qui affiche aléatoirement tous les oeuvres dans la bd
     */      
    public static function afficherOeuvresAccueil($sGenre=""){
          
      $oConnexion = new MySqliLib();
      //Requête de recherche de tous les oeuvres
      if($sGenre){

        $sRequete = "SELECT * FROM ouvrage WHERE sGenre = '$sGenre';";

      }else{ 

        $sRequete = "SELECT * FROM ouvrage;"; 

      }
      //echo  $sRequete;

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

