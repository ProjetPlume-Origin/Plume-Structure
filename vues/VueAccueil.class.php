<?php
  class VueAccueil {
    /**
     * Côté utilisateur - Afficher la page d'accueil
     * @param array $aProduits tableau d'objets Produit
     */
    
    public static function afficherListeDesCategories($sMsg="&nbsp;") {
      echo "

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
              <a href=\"#\">Recherche avancée</a>
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
                <li><a href=\"#\">Science-fiction et fantastique</a></li>
                <li><a href=\"#\">Romans policiers</a></li>
                <li><a href=\"#\">Romans d'épouvante</a></li>
                <li><a href=\"#\">Poésie et théâtre</a></li>
                <li><a href=\"#\">Littérature étrangèr</a></li>
                <li><a href=\"#\">Littérature Québécoise</a></li>
                <li><a href=\"#\">Littérature érotique</a></li>
              </ul>
            </div>

          </div>  <!-- FIN COLONNE GAUCHE GENRES -->
        </div>      
      ";
    }// fin de la function afficherListeDesCategories

  } // fin de la classe VueAccueil()

	
?>

