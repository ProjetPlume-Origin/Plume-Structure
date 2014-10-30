<?php

	/**
     * Côté utilisateur - Affiche le formulaire pour faire la recherce avancée
     * @param 
     */
    public static function afficherFormRechercheAvancee() {
      echo "
      
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
    }// fin de la fonction afficherFormRechercheAvancee()

?>