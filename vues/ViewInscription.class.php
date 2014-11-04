
<?php
	


    class ViewInscription{
	
         
        
        public static function afficherAjouterUtilisateur( $sMsg=""){
      	// echo 'get s'.$_GET['s'];
        echo'<article class="col-md-5 col-md-offset-3 moduleUtilisateur">';
        echo "
            <p>".$sMsg."</p>
            	<form action=\"index.php?s=".$_GET['s']."&valid=\"valid\"\" method=\"post\" id=\"info_AjouterAdmin\">
					<fieldset>
						<legend>Inscription</legend> 
						<div class=\"form-group\">
							<label for=\"exampleInputNom1\">Nom</label>
							<input type=\"text\"  id=\"nom\" class=\"form-control\" name=\"txtNom\" placeholder=\"nom\"><span class=\"erreur\"></span>
						</div>
						<div class=\"form-group\">
							<label for=\"exampleInputEmail1\">Courriel électronique</label>
							<input type\"email\" id=\"email\" class=\"form-control\" id=\"exampleInputEmail1\"  name=\"txtCourriel\" placeholder=\"Courriel électronique\"><span class=\"erreur\"></span>
						</div>
						<div class=\"form-group\">
							<label for=\"exampleInputPassword1\">Mot de Passe</label>
							<input type=\"password\" id=\"pass\" class=\"form-control\" id=\"exampleInputPassword1\"  name=\"txtPass\" placeholder=\"Mot de passe\"><span class=\"erreur\"></span>
						</div>
						<div class=\"form-group\">
							<label for=\"exampleInputPassword1\"> Confirmation Mot de Passe</label>
							<input type=\"password\" id=\"passcon\"class=\"form-control\" id=\"exampleInputPassword11\" name=\"txtPassConfirm\"  placeholder=\"Confirmation mot de passe\"><span class=\"erreur\"></span>
						</div>
						
						<button type=\"button\" name=\"cmd\" value=\"inscription\" id=\"ajouter\">Créer un compte</button>
					</fieldset>	
					
				</form>
			</article>
		
		  ";
		}
        
        
/*----------------------------------------------------------------------------------------------------------------------------------*/        
         
        public static function afficherConnexionUtilisateur( $sMsg=""){
        echo'<article class="col-md-5 col-md-offset-3 moduleUtilisateur">';
        echo "
            <p class=\"alert alert-success\">".$sMsg."</p>
        
        		<form action=\"index.php?s=".$_GET['s']."&valid=\"valid\"\" method=\"post\" id=\"info_Connexion\">
					<fieldset>
						<legend>Connexion</legend> 

						<div class=\"form-group\">
							<label for=\"exampleInputEmail1\">Courriel électronique</label>
							<input type=\"email\"  id=\"email\" class=\"form-control\" id=\"exampleInputEmail1\" placeholder=\"Courriel électronique\"  name=\"txtCourriel\"><span class=\"erreur\"></span>
						</div>
						<div class=\"form-group\">
							<label for=\"exampleInputPassword1\">Mot de Passe</label>
							<input type=\"password\"  id=\"pass\" class=\"form-control\"  placeholder=\"mot de passe\"  name=\"txtPass\"><span class=\"erreur\"></span>
						</div>
					</fieldset>	
               
                <input type=\"button\" class=\"btn btn-default\" name=\"cmd\" value=\"Se connecter\" id=\"connexion\"> 
					
					<div class=\"auser\">
						<a href=\"index.php?s=20\">Mot de passe oublié ? </a>
					</div>
				</form>
			</article>
            ";
        }
       	
  /*--------------------------------------------------------------------------------------------------------------------------*/      
        
   		public static function afficherListeUtilisateurs(array $aUtilisateurs , $sMsg="&nbsp;"){
		//var_dump($aUtilisateurs);
		
		echo "
			<h1 class=\"admin_h1\">Liste des Utilisateurs  <a href=\"index.php?s=".$_GET['s']."&action=add\">Ajouter <img src=\"../core/img/ajouter.png\" width=\"15\" height=\"15\"></a> </h1>
			<p class=\"alert alert-success\">".$sMsg."</p>
			";
			if(empty($aUtilisateurs)!=true){
				echo "
					<div class=\"table-responsive\">
						<table class=\"table table-hover\">
							<thead>
					        	<tr>
	                                <th>Nom</th>
	                                <th>Courriel</th>
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
                            <td>".$aUtilisateurs[$iEnrg]->getStatus()." </td>
                            <td>".$aUtilisateurs[$iEnrg]->getTypeUtilisateur()." </td>
                            <td>".$aUtilisateurs[$iEnrg]->getAvatar()." </td>
                       		<td><a href=\"index.php?s=".$_GET['s']
                       		."&action=mod&idUtilisateur=".$aUtilisateurs[$iEnrg]->getIdUtilisateur()."\"><img src=\"../core/img/modifier.png\" width=\"15\" height=\"15\"></a> |

                       		<a href=\"#\" onclick=\"supprimerUnUtilisateur('Voulez-vous supprimer ce utilisateur', ".$_GET['s'].", 'sup',".$aUtilisateurs[$iEnrg]->getIdUtilisateur().")\">
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
        
        
  /*---------------------------------------------------------------------------------*/
        
        
        public static function afficherModifierUtilisateurAdmin(Utilisateur $oUtilisateur, $sMsg=""){
            echo'<article class="col-md-5 col-md-offset-3 moduleUtilisateur">';
            echo "
				<p class=\"alert alert-success\">".$sMsg."</p>
				<form action=\"index.php?s=".$_GET['s']."&action=".$_GET['action']."&idUtilisateur=".$oUtilisateur->getIdUtilisateur()."&valid=\"valid\"\" method=\"post\" id=\"info_ModifierAdmin\">
					<fieldset>
						<legend>Modification Utilisateur</legend>
						<input type=\"hidden\" name=\"iUtilisateur\"  class=\"form-control\" value=\"".$oUtilisateur->getIdUtilisateur()."\" ><br>
						<label for=\"nom\">Nom</label>
                        <input type=\"text\" name=\"txtNom\" id=\"nom\"  class=\"form-control\" value=\"".$oUtilisateur->getNom()."\" ><span class=\"erreur\"></span><br>
						
                        <label for=\"TypeUtilisateur\">Type Utilisateur</label>
                        <input type=\"text\" name=\"txtType\"  id=\"typeUtilisateur\" class=\"form-control\" value=\"".$oUtilisateur->getTypeUtilisateur()."\" ><span class=\"erreur\"></span><br>
                         <label for=\"Status\">Statut</label>
                         <input type=\"text\" name=\"txtStatus\" id=\"statut\" class=\"form-control\" value=\"".$oUtilisateur->getStatus()."\" ><span class=\"erreur\"></span><br>
												
						<input type=\"button\" name=\"cmd\" value=\"Enregistrer\" id=\"modifierAdmin\"> <a href=\"index.php?s=".$_GET['s']."\">Retour</a>
					</fieldset>
				</form>
                </article>
			";
		}
        
        
        
 /*------------------------------------------------------------------------------------------------------------*/
 /* public static function afficherAjouterUtilisateurAdmin($sMsg=""){
			
			$oUtilisateur = new Utilisateur();
          //  var_dump($oProduit);
			      
        echo'<article class="col-md-5 col-md-offset-3 moduleUtilisateur">';
        echo "
            <p>".$sMsg."</p>
            <form action=\"index.php?s=".$_GET['s']."&action=".$_GET['action']."&idUtilisateur=".$oUtilisateur->getIdUtilisateur()."\" method=\"post\">
				<fieldset>
					<legend>L'ajout d'un utilisateur</legend> 
					<div class=\"form-group\">
                        <label for=\"exampleInputNom1\">Nom</label>
                        <input type=\"text\" class=\"form-control\" name=\"txtNom\" placeholder=\"nom\" id=\"Nom\" data-type=\"s\">
                        <div id=\"err_txtNom\"></div>
					</div>
					<div class=\"form-group\">
						<label for=\"exampleInputEmail1\">Courriel électronique</label>
						<input type=\"email\" class=\"form-control\"  name=\"txtCourriel\"  id=\"Courriel\" placeholder=\"Courriel électronique\" data-type=\"c\">
                        <div id=\"err_txtCourriel\"></div>
					</div>
					<div class=\"form-group\">
						<label for=\"exampleInputPassword1\">Mot de Passe</label>
						<input type=\"password\" class=\"form-control\"   name=\"txtPass\" placeholder=\"Mot de passe\" data-type=\"p\">
                        <div id=\"err_txtPass\"></div>
					</div>
					<div class=\"form-group\">
						<label for=\"exampleInputPassword1\"> Confirmation Mot de Passe</label>
						<input type=\"password\" class=\"form-control\" id=\"exampleInputPassword11\" name=\"txtPassConfirm\"  placeholder=\"Confirmation mot de passe\" data-type=\"p\">
                        <div id=\"err_txtPassConfirm\"></div>
					</div>
					<!--<div class=\"form-group\">
						<label for=\"exampleInputFile\">Avatar</label>
						<input type=\"file\" id=\"exampleInputFile\">
					</div>-->
					<button type=\"button\" name=\"cmd\" value=\"inscription\"  onclick=\"traiterFormulaire();\" class=\"clearFloat\">Créer un compte</button>
                   
				</fieldset>	
				
			</form>
        </article>
		
		  ";
		}*/
          
    // <input type="button" name="cmd" value="Rechercher" onclick="traiterFormulaire();" class="clearFloat">
        
 /*-----------------------------------*/       
        
        
       public static function afficherAjouterUtilisateurAdmin($sMsg=""){
			
			$oUtilisateur = new Utilisateur();
          //  var_dump($oProduit);
			      
        echo'<article class="col-md-5 col-md-offset-3 moduleUtilisateur">';
        echo "
            <p>".$sMsg."</p>
            <form action=\"index.php?s=".$_GET['s']."&action=".$_GET['action']."&idUtilisateur=".$oUtilisateur->getIdUtilisateur()."&valid=\"valid\"\" method=\"post\" id=\"info_AjouterAdmin\">
				<fieldset>
					<legend>L'ajout d'un utilisateur</legend> 
					<div class=\"form-group\">
								<label for=\"exampleInputNom1\">Nom</label>
								<input type=\"text\" class=\"form-control\"  id=\"nom\" name=\"txtNom\" placeholder=\"nom\"><span class=\"erreur\"></span>
					</div>
					<div class=\"form-group\">
						<label for=\"exampleInputEmail1\">Courriel Ã©lectronique</label>
						<input type=\"email\" class=\"form-control\"  id=\"email\" name=\"txtCourriel\" placeholder=\"Courriel Ã©lectronique\"><span class=\"erreur\"></span>
					</div>
					<div class=\"form-group\">
						<label for=\"exampleInputPassword1\">Mot de Passe</label>
						<input type=\"password\" class=\"form-control\" id=\"pass\"  name=\"txtPass\" placeholder=\"Mot de passe\"><span class=\"erreur\"></span>
					</div>
					<div class=\"form-group\">
						<label for=\"exampleInputPassword1\"> Confirmation Mot de Passe</label>
						<input type=\"password\" class=\"form-control\" id=\"passcon\" name=\"txtPassConfirm\"  placeholder=\"Confirmation mot de passe\"><span class=\"erreur\"></span>
					</div>
					<!--<div class=\"form-group\">
						<label for=\"exampleInputFile\">Avatar</label>
						<input type=\"file\" id=\"exampleInputFile\">
					</div>-->
					<button type=\"button\" name=\"cmd\" value=\"inscription\" id=\"ajouterAdmin\">CrÃ©er un compte</button>
				</fieldset>	
				
			</form>
        </article>
		
		  ";
		}
             
        
     /*---------------------------------------------------------------------------------------------------*/  
         public static function afficherOublierMotDePasseUtilisateur( $sMsg=""){
        echo'<article class="col-md-5 col-md-offset-3 moduleUtilisateur">';
        echo "
            <p class=\"alert alert-success\">".$sMsg."</p>
        
        		<form action=\"index.php?s=".$_GET['s']."\" method=\"post\" id=\"info_oublier\">
					<fieldset>
						<legend>Mot De Passe Oublié</legend> 

						<div class=\"form-group\">
							<p>Vous avez oublié votre mot de passe ? Pas de panique ! Indiquez-nous votre adresse mail .</p>
						</div>
                        
                        <div class=\"form-group\">
							<p>Courriel électronique</label>
							<input type=\"email\" id=\"email\"  class=\"form-control\"  placeholder=\"Courriel électronique\"  name=\"txtCourriel\"><span class=\"erreur\"></span>
						</div>
						
					</fieldset>	
               
					<button type=\"button\" class=\"btn btn-default\" id=\"oublier\" name=\"cmd\" value=\"envoyer1\">Envoyer</button>	
					
				</form>
			</article>
            ";
        }
        
        
     /*------------------------------------------------------------------------*/
        
        
         public static function afficherRedefinirMotDePasseUtilisateur($aUtilisateur, $sMsg=""){
            
             if($aUtilisateur){
                $idUtilisateur= $aUtilisateur[0]['idUtilisateur'];
             }else{
               $idUtilisateur=$_GET['idUtilisateur'] ; 
             }
        echo'<article class="col-md-5 col-md-offset-3 moduleUtilisateur">';
        echo "
            <p class=\"alert alert-success\">".$sMsg."</p>
        
        		<form action=\"index.php?s=21&idUtilisateur=$idUtilisateur&valid=\"valid\"\" method=\"post\"id=\"info_RedefinitionMotPass\">
					<fieldset>
						<legend>Mot De Passe Oublié</legend> 
                        <input type=\"hidden\" name=\"idUtilisateur\"  class=\"form-control\" value=\"".$idUtilisateur."\" ><br>
						<div class=\"form-group\">
							<label for=\"exampleInputPassword1\">Mot de Passe</label>
							<input type=\"password\" id=\"pass\"  class=\"form-control\"  name=\"txtPass\" placeholder=\"Mot de passe\"><span class=\"erreur\"></span>
						</div>
						<div class=\"form-group\">
							<label for=\"exampleInputPassword1\"> Confirmation Mot de Passe</label>
							<input type=\"password\"  id=\"passcon\" class=\"form-control\" name=\"txtPassConfirm\"  placeholder=\"Confirmation mot de passe\"><span class=\"erreur\"></span>
						</div>
						
					</fieldset>	
                    <input type=\"button\" name=\"cmd\" value=\"Envoyer\" id=\"RedefinitionMotPass\">
					
					
				</form>
			</article>
            ";
        }
        
        
        //<button type=\"button\" class=\"btn btn-default\" name=\"cmd\"  id=\"RedefinitionMotPass\" value=\"envoyer\">Envoyer</button>	
        
    }

?>