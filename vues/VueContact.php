<?php
  class VueContact{
    
    /**
     * Fonction qui affiche le formulaire de contact cotê utilisateur
     * @author Julian Rendon     
     */
    public static function afficherFormContact() {

      echo'<article class="col-md-5 col-md-offset-3 moduleUtilisateur">';
      echo "
          
          <form action=\"#\" method=\"post\" id=\"#\">

            <fieldset>
              <legend>Contact</legend>

              <div class=\"form-group\">
                <label for=\"exampleInputNom1\">Courriel électronique</label>
                <input type=\"email\"  id=\"Email\" class=\"form-control\" name=\"txtEmail\" placeholder=\"Courriel électronique\">
                <span class=\"erreur\"></span>
              </div>

              <div class=\"form-group\">
                <textarea rows=\"20\" cols=\"40\" class=\"form-control\" placeholder=\"message\"></textarea>
              </div>
              
              <button type=\"button\" name=\"cmd\" value=\"envoyer\" id=\"envoyer\">Envoyer</button>
            </fieldset>

          </form>
        </article>    
        ";
    }// fin de la function afficherFormContact() 
    
  } // fin classe VueContact
    

?>

