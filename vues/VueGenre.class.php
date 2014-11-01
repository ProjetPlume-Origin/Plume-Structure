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
              echo "<li><a href=\"index.php?s=1&display=affichageParGenre&genre=".$iGenre."\">".$aGenres[$iGenre]."</a></li>";
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
              echo "<li><a href=\"index.php?s=1&display=affichageParGenre&genre=".$iGenre."\">".$aGenres[$iGenre]."</a></li>";
            }
            echo "
              </ul>
            </div>
          </div>  <!-- FIN COLONNE GAUCHE GENRES -->
              
      ";
    }// fin de la function afficherListeDesGenres

  } // fin classe VueGenre
    

?>

