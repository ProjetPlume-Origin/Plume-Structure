function supprimerUnUtilisateur(sMsg, iSection, sAction, idUtilisateur)
{
	var bConfirm = confirm(sMsg);
	if(bConfirm == true){
		//Redirection
		document.location="../ajax/gererUtilisateur.php?s="+iSection+"&idUtilisateur="+idUtilisateur;
	}
}