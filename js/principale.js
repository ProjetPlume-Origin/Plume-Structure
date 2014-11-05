/**
 * validation du formulaire en javaScript en utilisant les regex
 * @author Hanaa EL Hamoumi
 * @version final
 * @date 2014-11-03
 */

window.addEventListener('load', function () {
    //console.log("init");
    //valide();
    
    var ajouterAdmin = document.getElementById('ajouterAdmin');
    //console.log(ajouterAdmin);
    if(ajouterAdmin){
        ajouterAdmin.addEventListener('click', valide);
        // positionner le curseur sur le premier champs
        var nom = document.getElementById('nom');
        nom.focus();
    }
    /*------------------------------ validation le formulaire de modification-----------------------------------------------*/
    
    var modifierAdmin = document.getElementById('modifierAdmin');
    console.log(modifierAdmin);
    if(modifierAdmin){
        console.log('je suis la ');
        modifierAdmin.addEventListener('click', valide1);
        // positionner le curseur sur le premier champs
        var nom = document.getElementById('nom');
        nom.focus();
    }
    
     /*----------------------------- validation le formulaire de connexion -------------------------------------------------*/
    
    var connexion = document.getElementById('connexion');
  //  console.log(connexion);
    if(connexion){
       
        connexion.addEventListener('click', valide2);
        // positionner le curseur sur le premier champs
        var email = document.getElementById('email');
        email.focus();
    }
    
    
     /*------------------------------ validation le formulaire ajouter site-----------------------------------------------*/
    
    var ajouter = document.getElementById('ajouter');
   if(ajouter){
       ajouter.addEventListener('click', valide);
        // positionner le curseur sur le premier champs
        var nom = document.getElementById('nom');
        nom.focus();
    }

      /*------------------------------ validation le formulaire oublie un mot depasse-----------------------------------------*/
    
    var oublier = document.getElementById('oublier');
    if(oublier){
         oublier.addEventListener('click', valide3);
        // positionner le curseur sur le premier champs
        var email = document.getElementById('email');
        email.focus();
    }
     /*----------------------- validation le formulaire redefinition  mot depasse oublie--------------------------------------*/
    
    var RedefinitionMotPass = document.getElementById('RedefinitionMotPass');
    console.log('lalalalalala');
    if(RedefinitionMotPass){
         console.log('je suis la ');
        RedefinitionMotPass.addEventListener('click', valide4);
        // positionner le curseur sur le premier champs
        var email = document.getElementById('email');
        email.focus();
    }
    
});

/*--------------------------------------------------------------------------------------------------------------------------*/
function valide() {

    $etape = 0;
    var sansErreur = true;
	var premiereErreur = '';//pour l'utilisation curseur
	   
    var tousLesSpans = document.querySelectorAll('span.erreur');
    for (var i = 0; i < tousLesSpans.length; i++) 
    { 
        tousLesSpans[i].innerHTML = '';  //enlever toutes les erreurs
    }

    var nom = document.getElementById('nom');
    var valeurNom1 = nom.value;
    console.log(valeurNom1);
    var valeurNom = nettoieEspaces(valeurNom1);
    valeurNom = valeurNom.toLowerCase();
    var regexNomPrenom = /[^a-zéèë\s-]|^-|-$|\s-|-\s|--/; // regex pour que l'utilisateur ne rentre pas les caracteres non desirer


  
    var email = document.getElementById('email');
     
    var valeurEmail1 = email.value;
    console.log(valeurEmail1);
    var valeurEmail = nettoieEspaces(valeurEmail1);
    var regexCourriel = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+$/;

   
/*---*/
    
    var pass = document.getElementById('pass');
     
    var valeurPass1 = pass.value;
    console.log(valeurPass1);
    var valeurPass = nettoieEspaces(valeurPass1);
   

   
     
    var passcon = document.getElementById('passcon');
     
    var valeurPasscon1 = passcon.value;
    console.log(valeurPasscon1);
    var valeurPasscon = nettoieEspaces(valeurPasscon1);
    

/*-----*/

    if (valeurNom == '') {
        nom.nextElementSibling.innerHTML = "Veuillez remplir ce champ";
        if(premiereErreur == '')
        {
            premiereErreur = nom;
		}
        sansErreur = false;
    } else
    if (regexNomPrenom.test(valeurNom)) {
        nom.nextElementSibling.innerHTML = "Ce champs comporte des caractères invalides.";
        if(premiereErreur == '')
        {
            premiereErreur = nom;
		}
        sansErreur = false;
    } else {
        $etape++;
    }

  

    if (valeurEmail == '') {
        email.nextElementSibling.innerHTML = "Veuillez remplir ce champ";
        if(premiereErreur == '')
        {
            premiereErreur = email;
		}
        sansErreur = false;

    } else
    if (!regexCourriel.test(valeurEmail)) {
        email.nextElementSibling.innerHTML = " Vous devez inscrire un courriel valide";
        if(premiereErreur == '')
        {
            premiereErreur = email;
		}
        sansErreur = false;
    } else {

        $etape++;
       
    }

    
    
    
    if (valeurPass == '') { //test de validation le champ message
        pass.nextElementSibling.innerHTML = "Veuillez remplir ce champ";
        if(premiereErreur == '')
        {
            premiereErreur = pass;
		}
        sansErreur = false;

    }
    else if (valeurPass.length < 8) {
        pass.nextElementSibling.innerHTML = "Ce champs est trop court, 8 caractères minimum";
        if(premiereErreur == '')
        {
            premiereErreur = pass;
		}
        sansErreur = false;
    } 
    else if (valeurPass.length > 15) {
        pass.nextElementSibling.innerHTML = "Ce champs est trop long,15 caractères maximum";
        if(premiereErreur == '')
        {
            premiereErreur = pass;
		}
        sansErreur = false;
    }else {

        $etape++;
    }
    
    /*-------confirmation de mot de passe---------*/
    
     if (valeurPasscon == '') { //test de validation le champ message
        passcon.nextElementSibling.innerHTML = "Veuillez remplir ce champ";
        if(premiereErreur == '')
        {
            premiereErreur = passcon;
		}
        sansErreur = false;

    }
    else if (valeurPasscon.length < 8) {
        passcon.nextElementSibling.innerHTML = "Ce champs est trop court, 8 caractères minimum";
        if(premiereErreur == '')
        {
            premiereErreur = passcon;
		}
        sansErreur = false;
    } 
    else if (valeurPasscon.length > 15) {
        passcon.nextElementSibling.innerHTML = "Ce champs est trop long,15 caractères maximum";
        if(premiereErreur == '')
        {
            premiereErreur = passcon;
		}
        sansErreur = false;
    }else{

        $etape++;
    }
    
    
    /* validation que les 2 mots de passe sont identique*/

    if (valeurPasscon !=  valeurPass) {
        passcon.nextElementSibling.innerHTML = "Les 2 mots de passe sont différents ";
        if(premiereErreur == '')
        {
            premiereErreur = passcon;
		}
        sansErreur = false;
    }else {

        $etape++;
    }
    
    
    
    
    /*----**/
  
    if(premiereErreur != '')
	{
		premiereErreur.focus();
    }
    if ($etape == 5) {
        
        document.querySelector("#info_AjouterAdmin").submit();
       
     
    }

    return sansErreur;
}

/*-----------------------------------------------------------------------------------------------------------------------------*/




function valide1() {
    console.log(' interieur' );
    $etape = 0;
    var sansErreur = true;
	var premiereErreur = '';//pour l'utilisation curseur
	   
    var tousLesSpans = document.querySelectorAll('span.erreur');
    for (var i = 0; i < tousLesSpans.length; i++) 
    { 
        tousLesSpans[i].innerHTML = '';  //enlever toutes les erreurs
    }

    var nom = document.getElementById('nom');
    var valeurNom1 = nom.value;
    console.log(valeurNom1);
    var valeurNom = nettoieEspaces(valeurNom1);
    valeurNom = valeurNom.toLowerCase();
    var regexNomPrenom = /[^a-zéèë\s-]|^-|-$|\s-|-\s|--/; // regex pour que l'utilisateur ne rentre pas les caracteres non desirer


  
    var typeUtilisateur = document.getElementById('typeUtilisateur');
    var valeurTypeUtilisateur1 = typeUtilisateur.value;
    var valeurTypeUtilisateur = nettoieEspaces(valeurTypeUtilisateur1);
    valeurTypeUtilisateur = valeurTypeUtilisateur.toLowerCase();

   
/*---*/
    
    var statut = document.getElementById('statut');  
    var valeurStatut1 = statut.value;
    var valeurStatut = nettoieEspaces(valeurStatut1);
    valeurStatut = valeurStatut.toLowerCase();

   
     
   
    

/*-----*/

    if (valeurNom == '') {
        nom.nextElementSibling.innerHTML = "Veuillez remplir ce champ.";
        if(premiereErreur == '')
        {
            premiereErreur = nom;
		}
        sansErreur = false;
    } else
    if (regexNomPrenom.test(valeurNom)) {
        nom.nextElementSibling.innerHTML = "Ce champs comporte des caractères invalides.";
        if(premiereErreur == '')
        {
            premiereErreur = nom;
		}
        sansErreur = false;
    } else {

        $etape++;
        
    }

  
/**type utilisateur****/
    
    if (valeurTypeUtilisateur == '') {
        typeUtilisateur.nextElementSibling.innerHTML = "Veuillez remplir ce champ.";
        if(premiereErreur == '')
        {
            premiereErreur = typeUtilisateur;
		}
        sansErreur = false;
    } else
    if (regexNomPrenom.test(valeurTypeUtilisateur)) {
        typeUtilisateur.nextElementSibling.innerHTML = "Ce champs comporte des caractères invalides.";
        if(premiereErreur == '')
        {
            premiereErreur = typeUtilisateur;
		}
        sansErreur = false;
    } else {

        $etape++;
        
    }
    
/**** statut****/    
    
    if (valeurStatut == '') {
        statut.nextElementSibling.innerHTML = "Veuillez remplir ce champ.";
        if(premiereErreur == '')
        {
            premiereErreur = statut;
		}
        sansErreur = false;
    } else
    if (regexNomPrenom.test(valeurStatut)) {
        statut.nextElementSibling.innerHTML = "Ce champs comporte des caractères invalides.";
        if(premiereErreur == '')
        {
            premiereErreur = statut;
		}
        sansErreur = false;
    } else {

        $etape++;
        
       
    }

  
    
    
    
    
    
    /*----**/
  
    if(premiereErreur != '')
	{
		premiereErreur.focus();
    }
    if ($etape == 3) {
        
        document.querySelector("#info_ModifierAdmin").submit();
       
     
    }

    return sansErreur;
}



/*---------------------------------*/

function valide2() {

    $etape = 0;
    var sansErreur = true;
	var premiereErreur = '';//pour l'utilisation curseur
	   
    var tousLesSpans = document.querySelectorAll('span.erreur');
    for (var i = 0; i < tousLesSpans.length; i++) 
    { 
        tousLesSpans[i].innerHTML = '';  //enlever toutes les erreurs
    }

   
    var email = document.getElementById('email');
     
    var valeurEmail1 = email.value;
    console.log(valeurEmail1);
    var valeurEmail = nettoieEspaces(valeurEmail1);
    var regexCourriel = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+$/;

   
/*---*/
    
    var pass = document.getElementById('pass');
     
    var valeurPass1 = pass.value;
    console.log(valeurPass1);
    var valeurPass = nettoieEspaces(valeurPass1);
   

   
/*-----*/

 
    if (valeurEmail == '') {
        email.nextElementSibling.innerHTML = "Veuillez remplir ce champ";
        if(premiereErreur == '')
        {
            premiereErreur = email;
		}
        sansErreur = false;

    } else
    if (!regexCourriel.test(valeurEmail)) {
        email.nextElementSibling.innerHTML = " Vous devez inscrire un courriel valide";
        if(premiereErreur == '')
        {
            premiereErreur = email;
		}
        sansErreur = false;
    } else {

        $etape++;
        
    }

    
    if (valeurPass == '') { //test de validation le champ message
        pass.nextElementSibling.innerHTML = "Veuillez remplir ce champ";
        if(premiereErreur == '')
        {
            premiereErreur = pass;
		}
        sansErreur = false;

    }
    console.log('valeurPass' + valeurPass);
    if (valeurPass.length < 8) {
        pass.nextElementSibling.innerHTML = "Ce champs est trop court, 8 caractères minimum";
        if(premiereErreur == '')
        {
            premiereErreur = pass;
		}
        sansErreur = false;
    } 
    else if (valeurPass.length > 15) {
        pass.nextElementSibling.innerHTML = "Ce champs est trop long,15 caractères maximum";
        if(premiereErreur == '')
        {
            premiereErreur = pass;
		}
        sansErreur = false;
    }else{

        $etape++;
    }
    
   
    
        
    
    /*----**/
  
    if(premiereErreur != '')
	{
		premiereErreur.focus();
    }
    if ($etape == 2) {
        
        document.querySelector("#info_Connexion").submit();
       
     
    }

    return sansErreur;
}

/******-------------------------------------------------------*/




function valide3() {

    $etape = 0;
    var sansErreur = true;
	var premiereErreur = '';//pour l'utilisation curseur
	   
    var tousLesSpans = document.querySelectorAll('span.erreur');
    for (var i = 0; i < tousLesSpans.length; i++) 
    { 
        tousLesSpans[i].innerHTML = '';  //enlever toutes les erreurs
    }

  
    var email = document.getElementById('email');
     
    var valeurEmail1 = email.value;
    console.log(valeurEmail1);
    var valeurEmail = nettoieEspaces(valeurEmail1);
    var regexCourriel = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+$/;

   
/*---*/

  

    if (valeurEmail == '') {
        email.nextElementSibling.innerHTML = "Veuillez remplir ce champ";
        if(premiereErreur == '')
        {
            premiereErreur = email;
		}
        sansErreur = false;

    } else
    if (!regexCourriel.test(valeurEmail)) {
        email.nextElementSibling.innerHTML = " Vous devez inscrire un courriel valide";
        if(premiereErreur == '')
        {
            premiereErreur = email;
		}
        sansErreur = false;
    } else {

        $etape++;
       
    }

    
  
    
    
    /*----**/
  
    if(premiereErreur != '')
	{
		premiereErreur.focus();
    }
    if ($etape == 1) {
        
        document.querySelector("#info_oublier").submit();
       
     
    }

    return sansErreur;
}

/*-----------------------------------------------------*/


function valide4() {

    $etape = 0;
    var sansErreur = true;
	var premiereErreur = '';//pour l'utilisation curseur
	   
    var tousLesSpans = document.querySelectorAll('span.erreur');
    for (var i = 0; i < tousLesSpans.length; i++) 
    { 
        tousLesSpans[i].innerHTML = '';  //enlever toutes les erreurs
    }

   
  
/*---*/
    
    var pass = document.getElementById('pass');
     
    var valeurPass1 = pass.value;
    console.log(valeurPass1);
    var valeurPass = nettoieEspaces(valeurPass1);
   

   
/*-----*/
    
      
    var passcon = document.getElementById('passcon');
     
    var valeurPasscon1 = passcon.value;
    console.log(valeurPasscon1);
    var valeurPasscon = nettoieEspaces(valeurPasscon1);
    

 
   

    
    if (valeurPass == '') { //test de validation le champ message
        pass.nextElementSibling.innerHTML = "Veuillez remplir ce champ";
        if(premiereErreur == '')
        {
            premiereErreur = pass;
		}
        sansErreur = false;

    }
    console.log('valeurPass' + valeurPass);
    if (valeurPass.length < 8) {
        pass.nextElementSibling.innerHTML = "Ce champs est trop court, 8 caractères minimum";
        if(premiereErreur == '')
        {
            premiereErreur = pass;
		}
        sansErreur = false;
    } 
    else if (valeurPass.length > 15) {
        pass.nextElementSibling.innerHTML = "Ce champs est trop long,15 caractères maximum";
        if(premiereErreur == '')
        {
            premiereErreur = pass;
		}
        sansErreur = false;
    }else{

        $etape++;
    }
    
     /*-------confirmation de mot de passe---------*/
    
     if (valeurPasscon == '') { //test de validation le champ message
        passcon.nextElementSibling.innerHTML = "Veuillez remplir ce champ";
        if(premiereErreur == '')
        {
            premiereErreur = passcon;
		}
        sansErreur = false;

    }
    else if (valeurPasscon.length < 8) {
        passcon.nextElementSibling.innerHTML = "Ce champs est trop court, 8 caractères minimum";
        if(premiereErreur == '')
        {
            premiereErreur = passcon;
		}
        sansErreur = false;
    } 
    else if (valeurPasscon.length > 15) {
        passcon.nextElementSibling.innerHTML = "Ce champs est trop long,15 caractères maximum";
        if(premiereErreur == '')
        {
            premiereErreur = passcon;
		}
        sansErreur = false;
    }else{

        $etape++;
    }
     /* validation que les 2 mots de passe sont identique*/

    if (valeurPasscon !=  valeurPass) {
        passcon.nextElementSibling.innerHTML = "Les 2 mots de passe sont différents ";
        if(premiereErreur == '')
        {
            premiereErreur = passcon;
		}
        sansErreur = false;
    }else {

        $etape++;
    }
        
    
    /*----**/
  
    if(premiereErreur != '')
	{
		premiereErreur.focus();
    }
    if ($etape == 3) {
        console.log( 'modification de submit');
        document.querySelector("#info_RedefinitionMotPass").submit();
       
     
    }

    return sansErreur;
}

/******-------------------------------------------------------*/



/**fonction qui nettoie les espaces
*  au debut et a la fin
* recois  en paramettre une chaine de caractaire
* retourne chaine nettoyer
**/


function nettoieEspaces(chaine) {
    
    var chaineOut = ((chaine.charAt(0) == " ") ? "" : chaine.charAt(0));

    for (i = 1; i < (chaine.length); i++) {
        if (chaine.charAt(i) != " ") //si le caractère n'est pas " ", l'ajouter à la chaîne
        {
            chaineOut += chaine.charAt(i);
        } else  // sinon ne l'ajouter que si la chaîne ne finit pas déjà par un " "
        {
            if (chaine.charAt(i - 1) != " ") {
                chaineOut += " ";
            }
        }
    }
   // supression les espaces ajouter par la boucle precedente
    if (chaineOut.charAt(chaineOut.length - 1) == " ") {
        chaineOut = chaineOut.substring(0, chaineOut.length - 1);
    }
    return (chaineOut);
}



