/**
 * valider.js
 * Liste des fonctions :
 *		function estUneDate(strValue)
 *		function estSaisi(oTexte)
 *		function estString(oTexte)
 *		function estNumerique(oTexte)
 *		function estCoche(oTexte)
 *		function estSelectionne(oTexte)
 *		function changerAspect(oElement, sCouleur, sWeight)
 *		function remettreParDefaut(aElements)
 *		function validerForm(aElements)
 *		function traiterFormulaire()
 *		
 * @author Caroline Martin cmartin@cmaisonneuve.qc.ca
 * @version 1.0 Automne 2010
 */
 
 /**
 * Constantes 
 */
const COLOR = "#7E7E7E";
const COLOR_ERR = "#CC081E";
const POIDS ="normal";
const POIDS_ERR ="bold";
const ERR_NUM ="Ce champ doit être de type numérique, ex. : 22.";
const ERR_STR ="Ce champ doit être de type chaîne de caractères, ex. : Marc.";
const ERR_DATE ="Ce champ doit être une date sous la forme dd/mm/yyyy.";
const ERR_RAD ="Veuillez cocher le radio bouton";
const ERR_LST ="Veuillez sélectionner une option.";
const ERR_LST_MULT ="Veuillez, au moins, sélectionner une option.";



/**
*
* Validates that a string contains only
    valid dates with 2 digit month, 2 digit day,
    4 digit year. Date separator can be ., -, or /.
    Uses combination of regular expressions and
    string parsing to validate date.
    Ex. dd/mm/yyyy or dd-mm-yyyy or dd.mm.yyyy
     
* @param {String} strValue String to be tested for validity
* @return {Boolean} True if valid, otherwise false.
*/
function estUneDate(strValue) {
	
	  var objRegExp = /^\d{1,2}(\/)\d{1,2}\1\d{4}$/;
	 
	  //check to see if in correct format
	  if(!objRegExp.test(strValue))
	    return false; //doesn't match pattern, bad date
	  else{
	    var strSeparator = strValue.substring(2,3) ;
	    var arrayDate = strValue.split(strSeparator); 
	    //create a lookup for months not equal to Feb.
	    var arrayLookup = { '01' : 31,'03' : 31, 
	                        '04' : 30,'05' : 31,
	                        '06' : 30,'07' : 31,
	                        '08' : 31,'09' : 30,
	                        '10' : 31,'11' : 30,'12' : 31};
	    var intDay = parseInt(arrayDate[0],10); 

	    //check if month value and day value agree
	    if(arrayLookup[arrayDate[1]] != null) {
	      if(intDay <= arrayLookup[arrayDate[1]] && intDay != 0)
	        return true; //found in lookup table, good date
	    }
	    
	    //check for February (bugfix 20050322)
	    //bugfix  for parseInt kevin
	    //bugfix  biss year  O.Jp Voutat
	    var intMonth = parseInt(arrayDate[1],10);
	    if (intMonth == 2) { 
	       var intYear = parseInt(arrayDate[2]);
	       if (intDay > 0 && intDay < 29) {
	           return true;
	       }
	       else if (intDay == 29) {
	         if ((intYear % 4 == 0) && (intYear % 100 != 0) || 
	             (intYear % 400 == 0)) {
	              // year div by 4 and ((not div by 100) or div by 400) ->ok
	             return true;
	         }   
	       }
	    }
	  }  
	  return false; //any other values, bad date
	}




/**
 *
 * @description vérifie si l'objet texte passé en paramètre est saisi 
 * @param {Object} oTexte zone de texte du formulaire
 * @return {Boolean} true si le champ contient des informations (!="")
 * false si le champ ne contient rien (=="")
 */
function estSaisi(oTexte){
    if (oTexte.value == "" || oTexte.value.indexOf("Saisir") !=-1) {        
        oTexte.focus();
        return false;
    }
    return true;
}//fin de la fonction estSaisi()
/**
 *
 * @description vérifie si l'objet texte passé en paramètre est une chaîne de caractères 
 * @param {Object} oTexte zone de texte du formulaire
 * @return {Boolean} true si le champ est de type numérique
 * false dans les autres cas
 */
function estString(oTexte){
    if (isNaN(oTexte.value) == false) {       
        oTexte.focus();
        oTexte.select();
        return false;
    }
    return true;
    
}//fin de la fonction estString()
/**
 *
 * @description vérifie si l'objet texte passé en paramètre est numérique 
 * @param {Object} oTexte zone de texte du formulaire
 * @return {Boolean} true si le champ est de type numérique
 * false dans les autres cas
 */
function estNumerique(oTexte){
    if (isNaN(oTexte.value) == true) {       
        oTexte.focus();
        oTexte.select();
        return false;
    }
    return true;
    
}//fin de la fonction estNumerique()
/**
 *
 * @description vérifie si l'objet radio ou case à cocher passé en paramètre  est coché
 * @param {Object} oTexte radio ou case à cocher du formulaire
 * @return {Boolean} true si le l'objet radio ou case à cocher passé en paramètre est coché
 * false dans le cas contraire
 */
function estCoche(oTexte){    
	if (oTexte.checked == false) {       
        oTexte.focus();
        return false;
    }
    return true;
}//fin de la fonction estCoche()
/**
 *
 * @description vérifie si l'objet option de la liste passé en paramètre est sélectionné 
 * @param {Object} oTexte option de la iste du formulaire
 * @return {Boolean} true si le l'objet option passé en paramètre est sélectionné 
 * false dans le cas contraire
 */
function estSelectionne(oTexte){
    if (oTexte.selected == false) {        
        return false;
    }
    return true;
}//fin de la fonction estSelectionne()
/**
 * 
 * @description change l'aspect d'un objet de la page HTML (couleur et poids de la police)
 * @param {Object} oElement objet du document HTML
 * @param {String} sCouleur couleur du texte
 * @param {String} sWeight poids de la police (bold, normal, etc.)
 */
function changerAspect(oElement, sCouleur, sWeight){
    
	oElement.style.color = sCouleur;
    oElement.style.fontWeight = sWeight;
    
}//fin de la fonction changerAspect()
/**
 * 
 * @description remet les valeurs par défaut (aspect graphiques et chaîne vide)
 * @param {Array} aElements tableau d'objets éléments du formulaire
 */
function remettreParDefaut(aElements){
    //d?claration de variables
	var sId;
	var oLabel;
    for (var iElem = 0; iElem < aElements.length; iElem++) {
		if (aElements[iElem].type == "text" || aElements[iElem].type=="radio" || aElements[iElem].type=="checkbox" 
		|| aElements[iElem].type == "select-one" || aElements[iElem].type == "select-multiple") { 
			sId = "lbl_" + aElements[iElem].name;
			sIdErr = "err_" + aElements[iElem].name;
			/* les labels */
			oLabel = document.getElementById(sId);
			changerAspect(oLabel, COLOR, POIDS);
			
			/* les zones de texte */
			aElements[iElem].value="";
						
			/* le bloc de document erreur */			
	        document.getElementById(sIdErr).innerHTML="";	
		}
	}//fin du for
    
}//fin de la fonction changerAspect()


/**
 * 
 * @param {Object} aElements
 * @return {Boolean} true si tous les zones de texte du formulaire sont saisies, numériques et positives
 * false dans tous les autres cas
 */
function validerForm(aElements){
    /* Déclaration */
    var oLabel;
    var sId;
    var iElem;
	var sType;
    var bValide = true;
    var bRadio = false;
    /*initialisation */
    iElem = 1;
    while (iElem < aElements.length) {/*test d'arrêt*/
        switch(aElements[iElem].type ) { 
            case "text": case "password": /* si l'élément est une zone de texte du formulaire */
				sId = "lbl_" + aElements[iElem].name;
	            oLabel = document.getElementById(sId);
				
	            changerAspect(oLabel, COLOR, POIDS);
				sIdErr = "err_" + aElements[iElem].name;
	            document.getElementById(sIdErr).innerHTML="";	
				sType = aElements[iElem].name.substr(3,1);
				
	            if (estSaisi(aElements[iElem]) == true) {/* si l'élément texte est saisi */	                
	               
				    switch(sType){
						case "s"://string
							if(estString(aElements[iElem]) == false){
								document.getElementById(sIdErr).innerHTML=ERR_STR;
								//changer la couleur du texte du label associé l'élément du formulaire invalide
								changerAspect(oLabel, COLOR_ERR, POIDS_ERR);
								bValide = false;
							}
						break;
						case "n"://number
							if(estNumerique(aElements[iElem]) == false){
								document.getElementById(sIdErr).innerHTML=ERR_NUM;
								//changer la couleur du texte du label associé l'élément du formulaire invalide
								changerAspect(oLabel, COLOR_ERR, POIDS_ERR);
								bValide = false;
							}
						break;
						case "d"://date
							if(estUneDate(aElements[iElem].value) == false){
								document.getElementById(sIdErr).innerHTML=ERR_DATE;
								//changer la couleur du texte du label associé l'élément du formulaire invalide
								changerAspect(oLabel, COLOR_ERR, POIDS_ERR);
								bValide = false;
							}
						break;
					}
					
	            }else{
					
					bValide = false;
					document.getElementById(sIdErr).innerHTML="Veuillez saisir le champ.";		            
	                //changer la couleur du texte du label associé à l'élément du formulaire invalide
	                changerAspect(oLabel, COLOR_ERR, POIDS_ERR);
	            }
            break;
			case "radio":case "checkbox":						
				
				sId = "lbl_" + aElements[iElem].name;
				sIdErr = "err_" + aElements[iElem].name;
				document.getElementById(sIdErr).innerHTML="";
				oLabel = document.getElementById(sId);
				changerAspect(oLabel, COLOR, POIDS);
				if(aElements[iElem-1].name != aElements[iElem].name){
							bRadio = false;
				}
				if (estCoche(aElements[iElem]) == false && bRadio == false){	
						if(aElements[iElem+1].name != aElements[iElem].name){
							bValide = false;
							bRadio = false;
							document.getElementById(sIdErr).innerHTML =ERR_RAD+aElements[iElem].type+".";					
							changerAspect(oLabel, COLOR_ERR, POIDS_ERR);
						}
				}else{
					bRadio = true;
				}
				
			break;
			case "select-one":
				sId = "lbl_" + aElements[iElem].name;
				sIdErr = "err_" + aElements[iElem].name;
				 document.getElementById(sIdErr).innerHTML="";
				oLabel = document.getElementById(sId);
				if(aElements[iElem].selectedIndex==0){
					
					document.getElementById(sIdErr).innerHTML =ERR_LST;
					changerAspect(oLabel, COLOR_ERR, POIDS_ERR);
					bValide=false;
				}
				else{
					changerAspect(oLabel, COLOR, POIDS);
				}
				
			break;
			case "select-multiple":
				var iOption=0;
				var bListe=false;
				while ( iOption < aElements[iElem].options.length && bListe==false){
					if (estSelectionne(aElements[iElem].options[iOption])==true){
						bListe=true;
					}
					iOption++;
				}
				sId = "lbl_" + aElements[iElem].name;
				sIdErr = "err_" + aElements[iElem].name;
				document.getElementById(sIdErr).innerHTML="";
				oLabel = document.getElementById(sId);
				changerAspect(oLabel, COLOR, POIDS);
				
				if(bListe==false){
					bValide = false;
					document.getElementById(sIdErr).innerHTML =ERR_LST_MULT;
					changerAspect(oLabel, COLOR_ERR, POIDS_ERR);
				}
				
			break;
        }//fin du switch sur type
        /* incrémentation */
        iElem++;
    }//fin du while
    return bValide;
}//fin de la fonction validerForm()

/**
 * @description traite le formulaire. Ainsi, les champs de ce dernier sont validés 
 */
function traiterFormulaire(){
	
	if (validerForm(document.forms[0].elements) == true) {
		document.forms[0].submit();
	}
}//fin de la fonction traiterFormulaire()

