<?php 
	include_once "../vues/templates/header.php";
	include_once "../vues/templates/navAdmin.php"; 
?>
		<!-- CONTENEUR PRINCIPAL --> <!-- la fermeture du div conteneur est incluse dans footer.php -->
		<div class="container conteneur">		
			<div class="row">

				<?php
					Controleur::gererSite();
				?>
			</div>
		<script src="../js/vendor/jquery-2.1.1.min.js"></script>
		<script src="../js/scripts.js"></script>
<?php 
	include_once "../vues/templates/footer.php"; 
?>
		