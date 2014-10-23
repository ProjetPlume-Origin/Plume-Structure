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
						<li><a href="<?php echo TEST.DS; ?>">Accueil Admin</a></li>
					</ul>
					<!-- .nav, .navbar-search, .navbar-form, etc -->
                    <form class="navbar-form navbar-right" action="index.php?s=3" method="post">
                        <li><button id="btnConnexion" type="submit" class="btn btn-success">Deconnecter</button></li>
                    </form>
				</div><!--/.navbar-collapse -->
			</div>			
		</nav>

		