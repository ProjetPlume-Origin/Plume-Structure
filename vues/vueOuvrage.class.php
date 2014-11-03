
            
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
      <h1>Liste des ouvrages &nbsp;&nbsp;<a href=\"index.php?s=".$_GET['s']."&action=add\"><button type=\"button\" class=\"btn btn-success\">Ajouter un ouvrage</button></a></h1>
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
            ."&action=aff&idOuvrage=".$aOuvrages[$i]->getIdOuvrage()."\"><img class=\"imageOuvrage\" src=". $aOuvrages[$i]->getOuvrageCouverture()."></a><a href=\"index.php?s=".$_GET['s']
            ."&action=aff&idOuvrage=".$aOuvrages[$i]->getIdOuvrage()."\"><span class=\"titre\">".$aOuvrages[$i]->getOuvrageTitre() 
            ." </span><td></a><a href=\"index.php?s=".$_GET['s']
            ."&action=mod&idOuvrage=".$aOuvrages[$i]->getIdOuvrage()."\"><img src=\"img/modif.png\"></a></td> 
            <td><a href=\"index.php?s=".$_GET['s']
            ."&action=sup&idOuvrage=".$aOuvrages[$i]->getIdOuvrage()."\" onClick=\"return confirm('Voulez vous vraiment supprimer cet ouvrage!');\"><img src=\"img/supp.png\"></a>
            </td>
            </tr>
            </table>
            ";
          }
          echo "
        </tr>
        ";
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
        <input type=\"submit\" name=\"cmd\" value=\"Mettre à jour\">
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
        <input type=\"submit\" name=\"cmd\" value=\"Enregistrer\" > 
     
    </form>
        <br>
    ";
    }



    /**
     * Afficher le formulaire de modification d'un Ouvrage
     * @param Ouvrage $oOuvrage 
     */public static function afficherOuvrage(Ouvrage $oOuvrage, $sMsg="&nbsp;"){
    //echo $oOuvrage->getIdOuvrage();
    echo "
    <h1>Affichage d'un ouvrage</h1>
    <p>".$sMsg."</p>";
      echo "<article class='visualiserOuvrage'>";
      echo "Titre : <span class= 'titre'>".$oOuvrage->getOuvrageTitre()."</span><br>";
      echo "Genre : ".$oOuvrage->getOuvrageGenre()."<br><br><br>";
        if (isset($_SESSION['tContenu'])){
        foreach ($_SESSION['tContenu'] as $valeur ) {
          echo $valeur."<br><br>";
        }
        }
       echo "</article>";
    $_SESSION['tContenu'] = '';
  }

    }//fin de la classe VueOuvrage

    ?>     
     