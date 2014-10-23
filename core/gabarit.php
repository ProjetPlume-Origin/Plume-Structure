<?php 
	include_once "../vues/templates/header.php";
	include_once "../vues/templates/navAdmin.php"; 
?>
		<article class="container">		
			<div class="row">

				<?php
					Controleur::gererSite();
				?>
			</div>

<?php 
	include_once "../vues/templates/footer.php"; 
?>
		