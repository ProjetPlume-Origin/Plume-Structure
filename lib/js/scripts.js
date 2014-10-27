/**
 * @author cmartin
 */

/**
 * demande une confirmation de suppression et redirige l'internaute pour effectuer la suppression
 * @param {string} sMsg le message à afficher dans la confirmation
 * @param {integer} iSection la section à utiliser pour la redirection
 * @param {string} sAction l'action à utiliser pour la redirection
 * @param {integer} idEtudiant numéor de l'étudiant à supprimer
 */
function supprimerUnOuvrage(sMsg, iSection, sAction, idOuvrage){
	var bConfirm = confirm(sMsg);
	if(bConfirm == true){
		//Redirection
		document.location="../lib/ajax/gererOuvrage.php?s="+iSection
							+"&action="+sAction
							+"&idOuvrage="+idOuvrage;
	}
}
