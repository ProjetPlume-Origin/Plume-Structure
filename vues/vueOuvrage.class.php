

    <!-- CONTENEUR PRINCIPAL -->
    <main class="container">  
            
      <?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
class VueOuvrage{

    /**
     * Afficher la liste de tous les Ouvrage
     * @param array $aOuvrage tableau d'objets Ouvrage
     */
    public static function afficherListeOuvrages($aOuvrages, $sMsg="&nbsp;"){
      echo "
      <h1>Liste des ouvrages <a href=\"index.php?s=".$_GET['s']."&action=add\"><button type=\"button\" class=\"btn btn-success\">Ajouter un ouvrage</button></a></h1>
      <p>".$sMsg."</p>";
      if(count($aOuvrages) <= 0){
        echo "<p>Aucun ouvrage n'est disponible. Veuillez en ajouter un.</p>";
        return;
      }
      echo "        
      <ul>";
        for($i=0; $i<count($aOuvrages); $i++){
          echo "
          <li><img class=\"imageOuvrage\" src=". $aOuvrages[$i]->getOuvrageCouverture().">".$aOuvrages[$i]->getOuvrageTitre() 
            ." <a href=\"index.php?s=".$_GET['s']
            ."&action=mod&idOuvrage=".$aOuvrages[$i]->getIdOuvrage()."\">Modifier</a> |
            <a href=\"#\" onclick=\"supprimerUnOuvrage('Voulez-vous supprimer cet ouvrage', ".$_GET['s'].", 'sup', ".$aOuvrages[$i]->getIdOuvrage().")\">Supprimer</a></li>
            ";
          }
          echo "
        </ul>
        ";
      } 

    /**
     * Afficher le formulaire de modification d'un Ouvrage
     * @param Ouvrage $oOuvrage 
     */public static function afficherModifierOuvrage(Ouvrage $oOuvrage, $sMsg="&nbsp;"){

    echo "
    <p>".$sMsg."</p>
    <form class=\"formContact\" action=\"index.php?s=".$_GET['s']."&action=".$_GET['action']."&idOuvrage=".$oOuvrage->getIdOuvrage()."\" method=\"post\">
      <article class=\"form-group\">
        <input type=\"hidden\" name=\"idOuvrage\" value=\"".$oOuvrage->getIdOuvrage()."\" ><br>
        <article class=\"form-group\">
        <input type=\"text\" name=\"txtTitre\" id=\"titre\" value=\"".$oOuvrage->getOuvrageTitre()."\" class=\"form-control\">
        </article>

        <article class=\"form-group\">
        <select name=\"txtGenre\" id=\"genre\" class=\"form-control\"> 
          <option>".$oOuvrage->getOuvrageGenre()."</option>
          <option>Fiction</option> 
          <option>Suspense</option> 
          <option>Amour</option> 
          <option>Thriller</option> 
        </select>
</article>
<article class=\"form-group\">
        <label for=\"contenu\"></label><textarea rows=\"20\" cols=\"50\" name=\"txtContenu\" id=\"contenu\"class=\"form-control\">";
        if (isset($_SESSION['tContenu'])){
        foreach ($_SESSION['tContenu'] as $valeur ) {
          echo $valeur."\n";
        }
        }
        echo "</textarea><br>
        </article>
        <input type=\"submit\" name=\"cmd\" value=\"Enregistrer\">
     </article>

    </form>
    ";
    $_SESSION['tContenu'] = '';
  }
    /**
     * Afficher le formulaire de ajouter un Ouvrage
     * @param $sMsg  
     */
    public static function afficherAjouterOuvrage($sMsg="&nbsp;"){
      echo "
    <p>".$sMsg."</p>
    <form class=\"formContact\" action=\"index.php?s=".$_GET['s']."&action=".$_GET['action']."\" method=\"post\">
      <article class=\"form-group\">
        <input type=\"hidden\" name=\"idOuvrage\" value=\"\" ><br>
        <input type=\"text\" name=\"txtTitre\" id=\"titre\" placeholder=\"Titre\" class=\"form-control\"></article>
<article class=\"form-group\">
        
        <select name=\"txtGenre\" id=\"genre\" class=\"form-control\"> 
          <option>Fiction</option> 
          <option>Suspense</option> 
          <option>Amour</option> 
          <option>Thriller</option> 
        </select>
        </article>   
<article class=\"form-group\">
        <label for=\"contenu\"></label><textarea rows=\"20\" cols=\"50\" name=\"txtContenu\" id=\"contenu\" class=\"form-control\" placeholder=\"Article\"></textarea><br>
    </article>    
        <input type=\"submit\" name=\"cmd\" value=\"Enregistrer\" > 
     
    </form>
        <br>
    ";
    }


/***************************************** CODE FAIT PAR JULIAN ****************************************/ 

    /**
     * Fonction qui affiche aléatoirement tous les oeuvres dans la page d'accueil
     * @author Alex Meyer et Julian Rendon
     * @return array ce tableau contient des objets Ouvrage
     */      
    public static function afficherOeuvresAccueil($sGenre=" "){
          
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

    
    /**
     * Fonction qui affiche le formulaire pour faire la recherce avancée
     * @author Julian Rendon
     * @return array ce tableau contient des objets Ouvrage
     */      
    public static function afficherFormRechercheAvancee(){
      echo "        
        
        <div class=\"row\"> 

          <!-- FORMULAIRE RECHERCHE AVANCEE -->
          <div class=\"col-lg-12 col-sm-12 col-xs-12\">
            
            <!-- Barre Recherche Avancée -->
            <div class=\"barreRecherche col-xs-12\">
              <h1>Recherche Avancée</h1>

              <form class=\"navbar-form navbar-left\" method=\"post\" action=\"index.php?s=2\" role=\"search\">
                <div class=\"form-group\">
                  <input type=\"text\" name=\"motCherche\" class=\"form-control\" placeholder=\"\" autofocus>
                </div>Rechercher par : 
                <label class=\"radio-inline\">
                  <input type=\"radio\" name=\"optradio\" value=\"motCle\">Mot clé
                </label>
                <label class=\"radio-inline\">
                  <input type=\"radio\" name=\"optradio\" value=\"titre\" checked=\"\">Titre
                </label>
                <label class=\"radio-inline\">
                  <input type=\"radio\" name=\"optradio\" value=\"auteur\">Auteur
                </label>
                <button type=\"submit\" class=\"btn btn-default\" name=\"cmd\">Rechercher</button>
              </form>

            </div> <!-- Fin Barre Recherche Avancée -->            

          </div>  <!-- FIN FORMULAIRE RECHERCHE AVANCEE -->

        </div> <!-- Fin Row -->
      ";
    }// fin de la fonction afficherFormRechercheAvancee()


    /**
     * Fonction qui affiche le resultat de la recherce avancée
     * @author Julian Rendon
     * @return array ce tableau contient des objets Ouvrage
     */     
    public static function afficherResultatsRechercheAvancee($aResult){

      if(!(count($aResult) > 0)) {

        echo "
          <p class=\"alert alert-warning msgRecherche\">Aucun ouvrage ne correspond à votre recherche</p>
          ";
      }else {

        echo "        
          <div class=\"row resultatRecherche\"> 

            <!-- RESULTATS RECHERCHE AVANCEE -->
            <div class=\"col-lg-12 col-sm-12 col-xs-12\">
        ";
          for($iOeuvre=0; $iOeuvre<count($aResult) ; $iOeuvre++)
          {
            $oAuteur = new Utilisateur($aResult[$iOeuvre]->getIdUtilisateur());
            $oAuteur->rechercherUnUtilisateur();
            $oAuteur->getNom();
            echo'
                <a href="index.php'.$aResult[$iOeuvre]->getIdOuvrage().'">
                  <div class="col-lg-3 col-sm-6 col-xs-12 produit" >
                    <div class="produit-image">
                        <td><img src='.$aResult[$iOeuvre]->getOuvrageCouverture().'></td>
                    </div>
                    <h2> '.$aResult[$iOeuvre]->getOuvrageTitre().'</h2>
                    <p class="produit-date">Publié en: '.$aResult[$iOeuvre]->getOuvrageDate().'</p>
                    <p class="produit-auteur">Par: '.$oAuteur->getNom().'</p>
                    <img src="img/imgAccueil/view-icon.png" width="20px"><span class="produit-vues"> 25</span>
                    <img src="img/imgAccueil/comment-icon.png" width="13px"><span class="produit-commentaires"> 12</span>
                  </div>
                </a>
            
            ';
          }            
            // foreach($aResult as $value)
            // {
            //   print_r($value);
            // }
        
            echo "
            </div>  <!-- FIN RESULTATS RECHERCHE AVANCEE -->

          </div>  <!-- Fin Row -->
        ";
      }
    }// fin de la fonction afficherResultatsRechercheAvancee()

/***************************************** FIN CODE FAIT PAR JULIAN ****************************************/ 


    }//fin de la classe VueOuvrage

    ?>     
        </main> <!-- /container -->
      