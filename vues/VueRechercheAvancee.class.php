<?php
	
	class VueRechercheAvancee {
		/**
	     * Côté utilisateur - Affiche le formulaire pour faire la recherce avancée
	     * @param 
	     */
	    public static function afficherFormRechercheAvancee(){
	      echo "
	      	
	      	<p>".$sMsg."</p>
        	<div class=\"row\"> 

	          <!-- COLONNE DROITE -->
	          <div class=\"col-lg-12 col-sm-12 col-xs-12\">
	            
	            <!-- Recherche Avancée -->
	            <div class=\"barreRecherche col-xs-12\">
	              <h1>Recherche Avancée</h1>

	              <form class=\"navbar-form navbar-left\" method=\"get\" action=\"index.php?s=2&\" role=\"search\">
	                <div class=\"form-group\">
	                  <input type=\"text\" name=\"motCherche\" class=\"form-control\" placeholder=\"\" autofocus>
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
	                <button type=\"submit\" class=\"btn btn-default\" name=\"cmd\">Rechercher</button>
	              </form>

	            </div> <!-- Fin Recherche Avancée -->            

	          </div>  <!-- FIN COLONNE DROITE -->

	        </div>  <!-- Fin Row -->
	      ";
	    }// fin de la fonction afficherFormRechercheAvancee()


	    /**
	     * Côté utilisateur - Affiche le formulaire pour faire la recherce avancée
	     * @param 
	     */
	    public static function afficherResultatsRechercheAvancee(){
	      echo "

	      	<p>".$sMsg."</p>
        	<div class=\"row\"> 
	      	
	          <!-- RESULTATS RECHERCHE AVANCEE -->
	          <div class=\"col-lg-12 col-sm-12 col-xs-12\">
	            
	           

	          </div>  <!-- FIN RESULTATS RECHERCHE AVANCEE -->

	        </div>  <!-- Fin Row -->
	      ";
	    }// fin de la fonction afficherResultatsRechercheAvancee()

    } // fin classe VueRechercheAvancee

?>