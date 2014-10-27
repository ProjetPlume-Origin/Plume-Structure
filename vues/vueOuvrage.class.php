<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Plume</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../site/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="../site/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../site/css/main.css">
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Esteban' rel='stylesheet' type='text/css'>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- ENTETE DU SITE -->    
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container arriereLogoEntete">
        <div class="row navLogoPlume">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.html"><img src="img/logo/logoplume.png" alt="Logo Plume"></a>
          </div>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left navPrincipal">
              <li><a href="../index.html">Accueil</a></li>
              <li><a href="monCompte.html">Mes oeuvres</a></li>
              <li><a href="modifierMonCompte.html">Mon compte</a></li>
              <li><a href="contact.html">Contact</a></li>
          </ul>

          
        </div><!-- navbar-collapse -->
      </div>
    </div> <!-- FIN ENTETE DU SITE -->

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

    }//fin de la classe VueOuvrage

    ?>     
        </main> <!-- /container -->
      <!-- Pie de Page --> 
      <footer class="row">       
            <div class="col-md-12">              
              <ul class="icons social">
                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                <li><a href="#"><span class="fa fa-envelope-o"></span></a></li>
              </ul>
              <p class="copy">&copy; Plume 2014</p>
            </div>
      </footer><!-- Fin Pie de Page --> 
      
          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
