function supprimerUnUtilisateur(sMsg, iSection, sAction, idUtilisateur)
{
	//var bConfirm = confirm(sMsg);
	//if(bConfirm == true){
		//Redirection
        var ajax = new XMLHttpRequest();
        ajax.open("GET","http://e1395754.webdev.cmaisonneuve.qc.ca/Plume-Structure/ajax/gererUtilisateur.php?s="+iSection+"&idUtilisateur="+idUtilisateur+"&action="+sAction);
        ajax.addEventListener('load', function(e){
            console.log(e.target.responseText);
            var data = JSON.parse(e.target.responseText);
            console.log(data);
            data.idUtilisateur;
         // console.log(data.idUtilisateur);
           //document.querySelector('tr').outerHTML = "";
            //console.log( document.getElementById("62"));
            document.getElementById(data.idUtilisateur).outerHTML="";
           
        });
        ajax.send();
        
		
       
        
	//}
}