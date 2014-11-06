            
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
      <h1>Liste des ouvrages &nbsp;&nbsp;<a href=\"index.php?s=".$_GET['s']."&action=add\"><button type=\"button\" class=\"btn btn-primary\">Ajouter un ouvrage</button></a></h1>
      <p>".$sMsg."</p>";
      if(count($aOuvrages) <= 0){
        echo "<p>Aucun ouvrage n'est disponible. Veuillez en ajouter un.</p>";
        return;
      }

      echo "        
      <tr>";
        for($i=0; $i<count($aOuvrages); $i++){
          echo "
          <table border=\"0\">
          <tr>
          <td>
          <a href=\"index.php?s=".$_GET['s']
            ."&action=affUn&idOuvrage=".$aOuvrages[$i]->getIdOuvrage()."\"><img class=\"imageOuvrage\" src=". $aOuvrages[$i]->getOuvrageCouverture()."></a><a href=\"index.php?s=".$_GET['s']
            ."&action=affUn&idOuvrage=".$aOuvrages[$i]->getIdOuvrage()."\"><span class=\"titre\">".$aOuvrages[$i]->getOuvrageTitre() 
            ." </span><td></a><a href=\"index.php?s=".$_GET['s']
            ."&action=mod&idOuvrage=".$aOuvrages[$i]->getIdOuvrage()."\"><img src=\"img/modif.png\"></a></td> 
            <td>
            <a href=\"index.php?s=".$_GET['s']
            ."&action=affSupp&idOuvrage=".$aOuvrages[$i]->getIdOuvrage()."\"><img src=\"img/supp.png\"></a><br>
            
            </td>
            </tr>
            </table>
            ";
          }
          
          
      }  

      /*
     * Afficher le formulaire de modification d'un Ouvrage
     * @param Ouvrage $oOuvrage 
     */public static function afficherUnOuvrage(Ouvrage $oOuvrage, $sMsg="&nbsp;"){
    //echo $oOuvrage->getIdOuvrage();
    echo "
    <p>".$sMsg."</p>
    <h1>Visualisation d'un ouvrage</h1>";
    echo "<article class='visualiserOuvrage col-xs-12 col-md-9 col-lg-9' id='lecture'>";
    echo "<span class= 'titre'>".$oOuvrage->getOuvrageTitre()."</span><br>";
    echo "Genre : ".$oOuvrage->getOuvrageGenre()."<br><br><br>";
    if (isset($_SESSION['tContenu'])){
      foreach ($_SESSION['tContenu'] as $valeur ) {
        echo  "<p>".$valeur."</p>";
        //commentaires 
      }
    }
    echo "</article>";
    $_SESSION['tContenu'] = '';
     echo '            <div class="hidden-xs col-md-3 col-sm-3 col-lg-3">
      <div class="tabbable tabs-right">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#1" data-toggle="tab"><img src="../site/img/imgAccueil/font.jpg" width="25px"></a></li>
          <li><a href="#2" data-toggle="tab"><img src="../site/img/imgAccueil/Gear_icon.png" width="22px"></a></li>
          <li><a href="#3" data-toggle="tab"><img src="../site/img/imgAccueil/comment-icon.png" width="20px"></a></li>
        </ul>
        <div class="tab-content">
         <div class="tab-pane active" id="1">
         <form action="index.php?s=10" method="GET">
             <p>Police d\'affichage</p>
             <select id="typePolice" name="typePolice">
                <option '.Preference::selectedOptionTypePolice()[0].' value="playfair">Playfair</option>
                 <option '.Preference::selectedOptionTypePolice()[1].' value="oswald">Oswald</option>
                 <option '.Preference::selectedOptionTypePolice()[2].' value="lobster">Lobster</option>
                 <option '.Preference::selectedOptionTypePolice()[3].' value="shadow">Shadows Into Light</option>
             </select>
             </br>
            </br>
            <p>Taille de la police</p>
             <select id="taillePolice" name="taillePolice">
                <option '.Preference::selectedOptionTaillePolice()[0].' value="12">12 pt</option>
                 <option '.Preference::selectedOptionTaillePolice()[1].' value="14">14 pt</option>
                <option '.Preference::selectedOptionTaillePolice()[2].' value="16">16 pt</option>
                 <option '.Preference::selectedOptionTaillePolice()[3].' value="18">18 pt</option>
                <option '.Preference::selectedOptionTaillePolice()[4].' value="20">20 pt</option>
                 <option '.Preference::selectedOptionTaillePolice()[5].' value="22">22 pt</option>
                <option '.Preference::selectedOptionTaillePolice()[6].' value="24">24 pt</option>
             </select>
             </br>
            </br>
    
        <p>Luminositée de la police</p>
              <select id="couleurPolice" name="couleurPolice">
                 <option '.Preference::selectedOptionTextLumino()[0].' value="textLumino1">1</option>
                 <option '.Preference::selectedOptionTextLumino()[1].' value="textLumino2">2</option>
                 <option '.Preference::selectedOptionTextLumino()[2].' value="textLumino3">3</option>
                 <option '.Preference::selectedOptionTextLumino()[3].' value="textLumino4">4</option>
                 <option '.Preference::selectedOptionTextLumino()[4].' value="textLumino5">5</option>
             </select>

            </br>
            </br>
            <input type="submit" name="submitPreference" value="Sauvegarder">
        </form>
         </div>
         <div class="tab-pane" id="2">
            <input type="button" value="ajouter un signet">
             </br>
             </br>
        <input type="button" value="Plein écran">
                 </br>
             </br>
        <input type="button" value="partager">
        </div>
         <div class="tab-pane" id="3">
            <input type="checkbox">Toujours afficher les commentaires.
             </br>
             </br>
        <input type="checkbox">Commentaires compactes.
             </br>
             </br>
        <input type="checkbox">Ne pas m\'offrir d\'écrire de commentaires.
            </br>
            </br>
<input type="button" value="Sauvegarder">
        </div>
        </div>
      </div>

        </div>  <!-- FIN COLONNE DROITE -->';
  }


    /**
     * Afficher le formulaire de modification d'un Ouvrage
     * @param Ouvrage $oOuvrage 
     */public static function afficherModifierOuvrage(Ouvrage $oOuvrage, $sMsg="&nbsp;"){
    //echo $oOuvrage->getIdOuvrage();
    echo "
    <h1>Modification d'un ouvrage</h1>
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
        <input type=\"submit\" name=\"cmd\" class=\"btn btn-primary\" value=\"Mettre à jour\">
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
      <h1>Ajout d'un nouveau ouvrage</h1>
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
          <input type=\"submit\" name=\"cmd\" class=\"btn btn-primary\" value=\"Enregistrer\" > 
          
        </form>
        <br>
        ";
      }

/***************************************** CODE FAIT PAR JULIAN ****************************************/ 

    /**
     * Fonction qui affiche aléatoirement tous les oeuvres dans la page d'accueil
     * @author Alex Mayer et Julian Rendon
     * @return array ce tableau contient des objets Ouvrage
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
              <a href="index.php?s=10&idOuvrage='.$aOeuvre[$iOeuvre]["idOuvrage"].'">
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

              <form class=\"navbar-form navbar-left\" method=\"post\" action=\"index.php?s=rech_avancee\" role=\"search\">
                <div class=\"form-group\">
                  <input type=\"text\" name=\"motCherche\" class=\"form-control\" placeholder=\"\" autofocus>
                </div>Rechercher par :                 
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
            <p class=\"alert alert-success\">Mot(s) cherché(s): <b>" 
            .$_POST['motCherche']."</b>&nbsp&nbsp&nbsp&nbsp&nbsp"."Resultats trouvés: <b>".count($aResult)."</b>
            </p>
        ";
          for($iOeuvre=0; $iOeuvre<count($aResult) ; $iOeuvre++)
          {
            $oAuteur = new Utilisateur($aResult[$iOeuvre]->getIdUtilisateur());
            $oAuteur->rechercherUnUtilisateur();
            $oAuteur->getNom();
            echo'
                <a href="index.php'.$aResult[$iOeuvre]->getIdOuvrage().'">
                  <div class="col-lg-3 col-sm-4 col-xs-12 produitRechAvancee" >
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


    /*
     * Afficher le formulaire de modification d'un Ouvrage
     * @param Ouvrage $oOuvrage 
     */public static function afficherOuvrage(Ouvrage $oOuvrage, $sMsg="&nbsp;"){
    //echo $oOuvrage->getIdOuvrage();
    echo "
    <p>".$sMsg."</p>
    <h1>Visualisation d'un ouvrage</h1>";
    echo "<article class='visualiserOuvrage col-xs-12 col-md-9 col-lg-9' id='lecture'>";
    echo "<span class= 'titre'>".$oOuvrage->getOuvrageTitre()."</span><br>";
    echo "Genre : ".$oOuvrage->getOuvrageGenre()."<br><br><br>";
    if (isset($_SESSION['tContenu'])){
      foreach ($_SESSION['tContenu'] as $valeur ) {
          
        echo  "<p>".$valeur['cont']."</p>";
          
        //commentaires 
        
       


                  //echo "<p class='parag' data-pid='".$valeur['id']."'>".$valeur['cont']."</p>

                  echo "<p class='parag' data-pid='".$valeur['id']."'>".$valeur['cont']."</p>


        <br>

            <form method='post' action='index.php?s=7'>

                <div>
                    <label for='sContenuCommentaire'>Ajouter Commentaire</label>
                    <textarea name='sContenuCommentaire'></textarea>
                </div>


                <input name='idParagraphe' value='".$valeur['id']."'  type='hidden'>

                <input type= 'submit' value='Envoyer'>
            </form>

         <br>
         <h2>Commentaires</h2>";

                  foreach ($valeur['commentaires'] as $comment) {
                      echo "<p>" . $comment['sNomUtilisateur'] . ": " . $comment['sContenuCommentaire'] . "</p>";
                  }

                  
        
        
        
        
        
        
      }
    }
    echo "</article>";
    $_SESSION['tContenu'] = '';
    

         

    
        echo '            <div class="hidden-xs col-md-3 col-sm-3 col-lg-3">
      <div class="tabbable tabs-right">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#1" data-toggle="tab"><img src="../site/img/imgAccueil/font.jpg" width="25px"></a></li>
          <li><a href="#2" data-toggle="tab"><img src="../site/img/imgAccueil/Gear_icon.png" width="22px"></a></li>
          <li><a href="#3" data-toggle="tab"><img src="../site/img/imgAccueil/comment-icon.png" width="20px"></a></li>
        </ul>
        <div class="tab-content">
         <div class="tab-pane active" id="1">';
         
         if(isset($_GET['action']))
         {
            echo '<form action="index.php?s='.$_GET['s'].'&action='.$_GET['action'].'&idOuvrage='.$_GET['idOuvrage'].'" method="POST">';
         }
         else
         {
            echo '<form action="index.php?s='.$_GET['s'].'&idOuvrage='.$_GET['idOuvrage'].'" method="POST">';
         }
             echo '<p>Police d\'affichage</p>
             <select id="typePolice" name="typePolice">
                <option '.Preference::selectedOptionTypePolice()[0].' value="playfair">Playfair</option>
                 <option '.Preference::selectedOptionTypePolice()[1].' value="oswald">Oswald</option>
                 <option '.Preference::selectedOptionTypePolice()[2].' value="lobster">Lobster</option>
                 <option '.Preference::selectedOptionTypePolice()[3].' value="shadow">Shadows Into Light</option>
             </select>
             </br>
            </br>
            <p>Taille de la police</p>
             <select id="taillePolice" name="taillePolice">
                <option '.Preference::selectedOptionTaillePolice()[0].' value="12">12 pt</option>
                 <option '.Preference::selectedOptionTaillePolice()[1].' value="14">14 pt</option>
                <option '.Preference::selectedOptionTaillePolice()[2].' value="16">16 pt</option>
                 <option '.Preference::selectedOptionTaillePolice()[3].' value="18">18 pt</option>
                <option '.Preference::selectedOptionTaillePolice()[4].' value="20">20 pt</option>
                 <option '.Preference::selectedOptionTaillePolice()[5].' value="22">22 pt</option>
                <option '.Preference::selectedOptionTaillePolice()[6].' value="24">24 pt</option>
             </select>
             </br>
            </br>
    
        <p>Luminositée de la police</p>
              <select id="couleurPolice" name="couleurPolice">
                 <option '.Preference::selectedOptionTextLumino()[0].' value="textLumino1">1</option>
                 <option '.Preference::selectedOptionTextLumino()[1].' value="textLumino2">2</option>
                 <option '.Preference::selectedOptionTextLumino()[2].' value="textLumino3">3</option>
                 <option '.Preference::selectedOptionTextLumino()[3].' value="textLumino4">4</option>
                 <option '.Preference::selectedOptionTextLumino()[4].' value="textLumino5">5</option>
             </select>

            </br>
            </br>
            <input type="submit" '.Preference::disableSubmit().' name="submitPreference" value="Sauvegarder">
        </form>
         </div>
         <div class="tab-pane" id="2">
            <input type="button" value="ajouter un signet">
             </br>
             </br>
        <input type="button" value="Plein écran">
                 </br>
             </br>
        <input type="button" value="partager">
        </div>
         <div class="tab-pane" id="3">
            <input type="checkbox">Toujours afficher les commentaires.
             </br>
             </br>
        <input type="checkbox">Commentaires compactes.
             </br>
             </br>
        <input type="checkbox">Ne pas m\'offrir d\'écrire de commentaires.
            </br>
            </br>
<input type="button" value="Sauvegarder">
        </div>
        </div>
      </div>

        </div>  <!-- FIN COLONNE DROITE -->';
    }

     /**
     * Afficher confirmation suppression
     * @param Ouvrage $oOuvrage 
     */public static function confirmerSuppOuvrage(Ouvrage $oOuvrage, $sMsg="&nbsp;"){
    //echo $oOuvrage->getIdOuvrage();
    echo "
    <h1>Confirmation de suppression!</h1>
    <p>".$sMsg."</p>";
    
      echo '<p>Voulez vous vraiment supprimer cet ouvrage?</p>';
      echo "<article>";
      echo "Titre : <span class= 'titre'>".$oOuvrage->getOuvrageTitre()."</span><br>";
      echo "Genre : ".$oOuvrage->getOuvrageGenre()."<br><br>";
      
       echo "</article>
       <a href=\"index.php?s=".$_GET['s']
            ."&action=sup&idOuvrage=".$oOuvrage->getIdOuvrage()."\"><button type=\"button\" class=\"btn btn-danger\">Supprimer</button></a>
    <a href=\"index.php?s=".$_GET['s']."&aff=\"><button type=\"button\" class=\"btn btn-primary\" href=\"#\">Annuler</button></a>
       ";
    
  }
    

    
    
    }//fin de la classe VueOuvrage

    ?>     

