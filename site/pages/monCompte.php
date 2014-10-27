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

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
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
            
      

                <!-- Tab panes -->
              
                    <div id="mesOeuvres">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                
                                <nav>
                                    <ul>
                                        <li><a href="index.php?s=monCompte">Ma liste des ouvrages</a></li>
                                    </ul>

                                </nav>
                                <?php

                                Controleur::gererSiteOuvrage();
                                include_once "../../vues/templates/footer.php"; 
                                ?>
                            </div>                
                            
                        </div>
                        
                        
                    </div>
                   
               
        </main> <!-- /container -->
      
      <script src="../lib/js/scripts.js"></script>
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
