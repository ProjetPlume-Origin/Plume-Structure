		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo RACINE.DS; ?>">Redwood</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo TEST.DS; ?>">Accueil</a></li>
					</ul>

<?php
		if(!isset($_SESSION['nom'])) {
?>
					<form class="navbar-form navbar-right" id="formConnexion" role="form" action="index.php?s=4" method="post">
						<div class="form-group">
							<input type="text" name="nomUtilisateur" placeholder="Nom utilisateur toto" class="form-control">
						</div>
						<div class="form-group">
							<input type="password" name="pass" placeholder="Mot de passe 1234" class="form-control">
						</div>
						<button id="btnConnexion" type="submit" class="btn btn-success">Se connecter</button>
					</form>

<?php
			if(isset($_SESSION['erreur'])) {
?>
		        <div class="divBloc">
		            <?php echo $_SESSION['erreur']; ?>
		        </div>
<?php
	    	} 
		    else
		    {
?>
				<div class="divBloc" hidden="hidden"></div>
<?php
			}

		}
		else
		{
?>
		    <div id="compteUtilisateur">
		        <span class="titre">Bienvenue:
<?php echo strtoupper($_SESSION['nom']);
?>
	        	</span>
	        	<p>Vous pouvez modifier vos produits maintenent! Bonne journée!</p>
	        	<hr>
	    	</div>

<?php
		}
?>	

				</div><!--/.navbar-collapse -->
			</div>			
		</nav>

		