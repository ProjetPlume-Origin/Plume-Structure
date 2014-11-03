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
            <a class="navbar-brand" href="../../site/index.php"><img src="<?php echo RACINE.DS; ?>site/img/Logo/logoplume.png" alt="Logo Plume"></a>            
          </div>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left navPrincipal">
              <li><a href="<?php echo TEST.DS; ?>index.php?s=1">Accueil</a></li>
             <li><a href='index.php?s=5'>AjouterCommentaire</a></li> <!-- fait par samuel-->         
              <li><a href="pages/contact.html">Contact</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="#">Se connecter</a></li>
                <li><a href="#">Créer un compte</a></li> -->                
				        <li><a href="index.php?s=3"><button class="btn btn-blue btnNav">Se connecter</button></a></li>
                <li><a href="index.php?s=4"><button class="btn btn-blue btnNav">Créer un compte</button></a></li>				
          </ul>

        </div><!-- navbar-collapse -->
      </div>
    </div> <!-- FIN ENTETE DU SITE -->



		