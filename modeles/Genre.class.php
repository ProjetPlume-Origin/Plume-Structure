<?php
	class Genre{
		private $aGenres = array("Amour","Fiction","Suspense","Thriller");

		public function getGenre(){
			return $this->aGenres;
		} // fin function getGenre()

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
	    } // fin de la fonction afficherOeuvresAccueil()



	}//fin de la classe Genre
?>
