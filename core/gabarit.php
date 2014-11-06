<?php 
	include_once "../vues/templates/header.php";
	include_once "../vues/templates/navAdmin.php"; 
?>
		<div class="container conteneur colorCore">		
			

				<?php
					Controleur::gererSite();
				?>

		<script src="../js/vendor/jquery-2.1.1.min.js"></script>
		<script src="../js/scripts.js"></script>
       <script src="../js/principale.js"></script>  
         
<?php 
	include_once "../vues/templates/footer.php"; 
?>
		