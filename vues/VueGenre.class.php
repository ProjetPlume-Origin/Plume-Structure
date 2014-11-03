<?php
  class VueGenre{
    
    /**
     * Fonction qui affiche le menu deroulant dans les petits ecrans
     * @author Julian Rendon
     * @return array ce tableau contient des objets Genres
     */
    public static function afficherGenresDeroulant(Genre $oGenre, $sMsg="&nbsp;") {
      echo "
        
        <div class=\"row\">
          <!-- Trier par genre -->
          <div class=\"btn-Categories\">
            <div class=\"btn-group hidden-lg hidden-sm col-xs-12\">
              <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\">
                Trier par genre <span class=\"caret\"></span>
              </button>
              <ul class=\"dropdown-menu\" role=\"menu\">";
            $aGenres = $oGenre->getGenre();
            for($iGenre=0;$iGenre<count($aGenres);$iGenre++){
              echo "<li><a href=\"index.php?s=".$_GET['s']."&display=affichageParGenre&genre=".$iGenre."\">".$aGenres[$iGenre]."</a></li>";
            }
            echo "
              </ul>
            </div>
            <!-- Lien Recherche avancée -->
            <div class=\"col-lg-6 col-xs-12 rechercheAvance\">
              <a href=\"index.php?s=rech_avancee\">Recherche avancée</a>
            </div>
          </div>        
        </div> <!-- fin row -->
      ";
    }// fin de la function afficherGenresDeroulant()  


    /**
     * Fonction qui affiche le menu avec la liste de genres
     * @author Julian Rendon
     * @return array ce tableau contient des objets Genres
     */
    public static function afficherListeDesGenres(Genre $oGenre, $sMsg="&nbsp;") {
      echo "
        
        <div class=\"row\">        
          <!-- COLONNE GAUCHE GENRES -->
          <div class=\"col-lg-3 col-sm-3 hidden-xs\">

            <!-- recherche par genre -->
            <div class=\"listeGenres\">
              <h2>Genres</h2>

              <ul>";
            $aGenres = $oGenre->getGenre();
            for($iGenre=0;$iGenre<count($aGenres);$iGenre++){
              echo "<li><a href=\"index.php?s=".$_GET['s']."&display=affichageParGenre&genre=".$iGenre."\">".$aGenres[$iGenre]."</a></li>";
            }
            echo "
              </ul>
            </div>
          </div>  <!-- FIN COLONNE GAUCHE GENRES -->
              
      ";
    }// fin de la function afficherListeDesGenres

  } // fin classe VueGenre
    

?>

