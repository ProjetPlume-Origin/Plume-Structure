
<?php
	


    class ViewInscription{
	
         
        
        public static function afficherAjouterUtilisateur( $sMsg=""){
      	// echo 'get s'.$_GET['s'];
        echo'<article class="col-md-5 col-md-offset-3 moduleUtilisateur">';
        echo "
            <p>".$sMsg."</p>
            	<form action=\"index.php?s=".$_GET['s']."\" method=\"post\">
					<fieldset>
						<legend>Inscription</legend> 
						<div class=\"form-group\">
							<label for=\"exampleInputNom1\">Nom</label>
							<input type=\"text\"  class=\"form-control\" name=\"txtNom\" placeholder=\"nom\">
						</div>
						<div class=\"form-group\">
							<label for=\"exampleInputEmail1\">Courriel électronique</label>
							<input type\"email\" class=\"form-control\" id=\"exampleInputEmail1\"  name=\"txtCourriel\" placeholder=\"Courriel électronique\">
						</div>
						<div class=\"form-group\">
							<label for=\"exampleInputPassword1\">Mot de Passe</label>
							<input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\"  name=\"txtPass\" placeholder=\"Mot de passe\">
						</div>
						<div class=\"form-group\">
							<label for=\"exampleInputPassword1\"> Confirmation Mot de Passe</label>
							<input type=\"password\" class=\"form-control\" id=\"exampleInputPassword11\" name=\"txtPassConfirm\"  placeholder=\"Confirmation mot de passe\">
						</div>
						<!--<div class=\"form-group\">
							<label for=\"exampleInputFile\">Avatar</label>
							<input type=\"file\" id=\"exampleInputFile\">
						</div>-->
						<button type=\"submit\" name=\"cmd\" value=\"inscription\">Créer un compte</button>
					</fieldset>	
					
				</form>
			</article>
		
		  ";
		}
        
        
/*----------------------------------------------------------------------------------------------------------------------------------*/        
         
        public static function afficherConnexionUtilisateur( $sMsg=""){
        echo'<article class="col-md-5 col-md-offset-3 moduleUtilisateur">';
        echo "
            <p>".$sMsg."</p>
        
        		<form action=\"index.php?s=".$_GET['s']."\" method=\"post\">
					<fieldset>
						<legend>Connexion</legend> 

						<div class=\"form-group\">
							<label for=\"exampleInputEmail1\">Courriel électronique</label>
							<input type=\"email\" class=\"form-control\" id=\"exampleInputEmail1\" placeholder=\"Courriel électronique\"  name=\"txtCourriel\">
						</div>
						<div class=\"form-group\">
							<label for=\"exampleInputPassword1\">Mot de Passe</label>
							<input type=\"password\" class=\"form-control\"  placeholder=\"mot de passe\"  name=\"txtPass\">
						</div>
					</fieldset>	
               
					<button type=\"submit\" class=\"btn btn-default\" name=\"cmd\" value=\"connecter\">Se connecter</button>	
					<div class=\"auser\">
						<a href=\"mdpOublier.html\">Mot de passe oublié ? </a>
					</div>
				</form>
			</article>
            ";
        }
        
  /*--------------------------------------------------------------------------------------------------------------------------*/      
        
   		public static function afficherListeUtilisateurs(array $aUtilisateurs , $sMsg="&nbsp;"){
			//var_dump($aUtilisateurs);
			
			echo "
				<h1>Liste des Utilisateurs  <a href=\"index.php?s=".$_GET['s']."&action=add\">Ajouter <img src=\"../core/img/ajouter.png\" width=\"15\" height=\"15\"></a> </h1>
				<p class=\"alert alert-success\">".$sMsg."</p>
				";
				if(empty($aUtilisateurs)!=true){
					echo "
						<div class=\"table-responsive\">
							<table class=\"table\">
								<thead>
						        	<tr>
		                                <th>Nom</th>
		                                <th>Courriel</th>
		                                <th>mot de passe </th>
		                                <th>Status</th>
		                                <th>Type Utilisateur</th>
		                                <th>Avatar</th>
		                                <th>Action</th>
		                            </tr>
	                            </thead>
				      			<tbody>
						";
                   for($iEnrg = 0; $iEnrg<count($aUtilisateurs); $iEnrg++){
						echo "
					   		<tr>
	                            <td>".$aUtilisateurs[$iEnrg]->getNom()." </td>
	                            <td>".$aUtilisateurs[$iEnrg]->getCourriel()." </td>
	                            <td>".$aUtilisateurs[$iEnrg]->getMotDePasse()." </td>
	                            <td>".$aUtilisateurs[$iEnrg]->getStatus()." </td>
	                            <td>".$aUtilisateurs[$iEnrg]->getTypeUtilisateur()." </td>
	                            <td>".$aUtilisateurs[$iEnrg]->getAvatar()." </td>
                           		<td><a href=\"index.php?s=".$_GET['s']
                           		."&action=mod&idUtilisateur=".$aUtilisateurs[$iEnrg]->getIdUtilisateur()."\"><img src=\"../core/img/modifier.png\" width=\"15\" height=\"15\"></a> |

                           		<a href=\"#\" onclick=\"supprimerUnUtilisateur('Voulez-vous supprimer ce Utilisateurt', ".$_GET['s'].", 'sup',".$aUtilisateurs[$iEnrg]->getIdUtilisateur().")\">
                           		<img src=\"../core/img/supprimer.png\" width=\"15\" height=\"15\"></a> </td>
                       		</tr>
							";
                    }
					echo "								
			         			</tbody>
	   						</table>
						</div>				
						";
					}else{
						echo '<p>Aucun utilisateur n’est disponible à l’heure actuelle. Vous pouvez en ajouter un.</p>';
				    }
					
		} //fin de la fonction afficherListeUtilisateurs()

        
        /*<th>".$aUtilisateurs[$iEnrg]->getTypeUtilisateur()." </th>
                                   <th>".$aUtilisateurs[$iEnrg]->getStatut()." </th>*/
        
        
    } // Fin de la classe ViewInscription()

?>