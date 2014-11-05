
<?php 
	include_once "../vues/templates/header.php";
	
    if(isset($_SESSION["IdUtilisateur"])){
		include_once "../vues/templates/navConnecte.php";
		//echo "session" .$_SESSION["IdUtilisateur"];
	}else{
		include_once "../vues/templates/nav.php";
	}   
?>
		<!-- CONTENEUR PRINCIPAL --> <!-- la fermeture du div conteneur est incluse dans footer.php -->
	    <div class="container conteneur">

	    	<?php
	    		Controleur::gererSite();


	include_once "../vues/templates/footer.php"; 
?>
    <script src="../js/principale.js"></script>
    <script src="../js/suppOuvrage.js"></script>