<!-- @author : JALAL Khair 
	Class Ouvrage-->
	<?php
		
     if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
    			
	class Ouvrage {
		
		/* Propriétés privées */
		private $idOuvrage;
		private $ouvrageTitre;
		private $sOuvrageDate; // ajouté par Julian
		private $ouvrageCouverture;
		private $ouvrageGenre;
		private $ouvrageContenu;
		private $idUtilisateur;
		
	//Construction
	
	public function __construct($idOuvrage=0, $ouvrageTitre=" ", $sOuvrageDate=" ", $ouvrageCouverture=" ", $ouvrageGenre=" ", $ouvrageContenu=" ", $idUtilisateur=0){
		$this->setidOuvrage($idOuvrage);
		$this->setOuvrageTitre($ouvrageTitre);
		$this->setOuvrageCouverture($ouvrageCouverture);
		$this->setOuvrageGenre($ouvrageGenre);
		$this->setOuvrageContenu($ouvrageContenu);
		$this->setIdUtilisateur($idUtilisateur);
		$this->setOuvrageDate($sOuvrageDate); // ajouté par Julian
		
	

	} //fin du constructeur

	
	/* Affectation */
    /**
	 * @param  $idOuvrage
	 */
    public function setIdOuvrage($idOuvrage){
    	    	
    	$this->idOuvrage = $idOuvrage;
    }

    /* Affectation */
    /**
	 * @param  $idOuvrage
	 */
    public function setIdUtilisateur($idUtilisateur){
    	    	
    	$this->idUtilisateur = $idUtilisateur;
    }
    
	/**
	 *  * @param string $ouvrageTitre
	 */
	public function setOuvrageTitre($ouvrageTitre){
		TypeException::estString($ouvrageTitre);
		TypeException::estVide($ouvrageTitre);
		
		$this->ouvrageTitre = $ouvrageTitre;
	}
		
	/**
	 * @param string $ouvrageCouverture
	 */
	public function setOuvrageCouverture($ouvrageCouverture){
				
		$this->ouvrageCouverture = $ouvrageCouverture;
	}
	/**
	 * @param string $ouvrageGenre
	 */
	public function setOuvrageGenre($ouvrageGenre){
		TypeException::estString($ouvrageGenre);
		TypeException::estVide($ouvrageGenre);
		
		$this->ouvrageGenre = $ouvrageGenre;
	}
	/**
	 * @param string $ouvrageContenu
	 */
	public function setOuvrageContenu($ouvrageContenu){
				
		$this->ouvrageContenu = $ouvrageContenu;
	}


/***************************************** CODE AJOUTÉ PAR JULIAN  **********************************/
	/**
	 * Permet d'affecter la valeur de la propriété privée OuvrageDate de l'ouvrage
	 * @param string $sOuvrageDate - Date de création de l'ouvrage
	 */
	public function setOuvrageDate($sOuvrageDate) {
		TypeException::estVide($sOuvrageDate);
		TypeException::estString($sOuvrageDate);

		$this->sOuvrageDate = $sOuvrageDate;
	}//fin de la fonction setOuvrageDate()

	/**
	 * Permet de récupérer la valeur de la propriété privée soit la date de création de l'ouvrage
	 * @return string la Date de création de l'ouvrage
	 */
	public function getOuvrageDate(){
 
		return htmlentities($this->sOuvrageDate);

	}//fin de la fonction getOuvrageDate()

/***************************************** FIN CODE AJOUTÉ PAR JULIAN  **********************************/


	
	/*--------------------------------------------------------------------*/
	/**
	 * @return integer $idOuvrage
	 */
	public function getIdOuvrage(){
		return $this->idOuvrage;
	}
	/**
	 * @return integer $idOuvrage
	 */
	public function getIdUtilisateur(){
		return $this->idUtilisateur;
	}
	/**
	 *  * @return string $ouvrageTitre
	 */
	public function getOuvrageTitre(){
		return htmlentities($this->ouvrageTitre);
	}
	
	/**
	 * @return string $ouvrageDate
	 */
	public function getOuvrageCouverture(){
		return htmlentities($this->ouvrageCouverture);
	}
	/**
	 * @return string $ouvrageDate
	 */
	public function getOuvrageGenre(){
		return htmlentities($this->ouvrageGenre);
	}
	public function getOuvrageContenu(){
		return htmlentities($this->ouvrageContenu);
	}
	/**
	 * Rechercher un Ouvrage par son idOuvrage
	 * @return boolean true si l'enregistrement est trouvé dans la BDD
	 * false dans tous les autres cas
	 */      
	function rechercherOuvrage(){
		//Connecter à la base de données
		$oConnexion = new MySqliLib();
		//Réaliser la requête de recherche par le idOuvrage
		$sRequete= "SELECT * FROM  ouvrage WHERE idOuvrage=".$this->getIdOuvrage();
				
		//Exécuter la requête
		$oResult = $oConnexion->executer($sRequete);
		if($oResult != false){
			
            //Récupérer le tableau des enregistrements s'il existe
			$aOuvrage = $oConnexion->recupererTableau($oResult);
			
			if(empty($aOuvrage[0]) != true){
				//Affecter les propriétés de l'objet en cours avec les valeurs
				$this->setOuvrageTitre($aOuvrage[0]['sTitreOuvrage']);
				$this->setOuvrageCouverture($aOuvrage[0]['sCouvertureOuvrage']);
				$this->setOuvrageGenre($aOuvrage[0]['sGenre']);
						
				//retourner true
				return true;	
			}

			return false;
		}
	 }
	
   function rechercherContenu(){
		//Connexion à la base de données
	 	$oConnexion = new MySqliLib();
	 	//Requête de recherche de tous les Ouvrages
	 	$sRequete= "SELECT * FROM  paragraphe WHERE idOuvrage=".$this->getIdOuvrage();
	 	//Exécuter la requête
	 	$oResult = $oConnexion->executer($sRequete);
	 	//Récupérer le tableau des enregistrements
	 	$aEnreg = $oConnexion->recupererTableau($oResult);

		$oOuvrage = array();
		$papa = array();
	 	//Pour tous les enregistrements
	 	for($i=0; $i<count($aEnreg); $i++){
	 		//affecter un objet à un élément du tableau
	 		
	 		$oOuvrage[$i] =  $aEnreg[$i]['sContenuParagraphe'];
	 			 		 
	 			$_SESSION['tContenu'] = $oOuvrage;
	 	
	 	}
	 	$_SESSION['idContenu'] =  $aEnreg[0]['idParagraphe'];

	 	//retourner le tableau d'objets
	 	return $oOuvrage;
		
	 }

	/**
	 * Ajouter un Ouvrage
	 * @return boolean true si l'ajout s'est bien déroulé
	 * false dans tous les autres cas.
	 */
	function ajouterOuvrage(){
		
        
        echo"hhhhhhhhhhhhhhhhhhhhhhhhhhh". $_SESSION["IdUtilisateur"];
		//Connexion à la base de données
		$oConnexion = new MySqliLib();
		//Requete d'ajout de l'Ouvrage
		$sRequete = "
			INSERT INTO ouvrage
			SET sTitreOuvrage = '".$oConnexion->getConnect()->escape_string($this->ouvrageTitre)."',
			"."  sDateOuvrage = '".date("Y-m-d H:i:s")."',
			"."  sCouvertureOuvrage = 'img/".strtolower($oConnexion->getConnect()->escape_string($this->ouvrageGenre)).".png',
			"."  sGenre = '".$oConnexion->getConnect()->escape_string($this->ouvrageGenre)."',
			"."  idUtilisateur = '".$_SESSION['IdUtilisateur']."'
		";
		
		//Exécuter la requête
		if($oConnexion->executer($sRequete) == true){
			$variable = $oConnexion->getConnect()->insert_id;
			$_SESSION['id'] = $variable;
		}

}

		
public function ajouterContenu(){

        //Connecter à la base de données
    	$oConnexion = new MySqliLib();
	
    	$sRequete = " INSERT INTO paragraphe values 
    	(NULL,'".$oConnexion->getConnect()->escape_string($this->ouvrageContenu)."','".date("Y-m-d H:i:s") ."','{$_SESSION['id']}');";

return $oConnexion->executer($sRequete);  
	
	}


	
     /**
	 * modifier un Ouvrage 
	 * @return boolean true si l'enregistrement est trouvé dans la BDD
	 * false dans tous les autres cas
	 */
     function modifierOuvrage(){
		//Connexion à la base de données
     	$oConnexion = new MySqliLib();
     	
     	$sRequete = "UPDATE ouvrage SET sTitreOuvrage='".$oConnexion->getConnect()->escape_string($this->getOuvrageTitre())."', sCouvertureOuvrage='img/".$oConnexion->getConnect()->escape_string(strtolower($this->getOuvrageGenre())).".png', sGenre='".$oConnexion->getConnect()->escape_string($this->getOuvrageGenre())."'
     	WHERE idOuvrage = ".$this->getIdOuvrage().";";
     	
		//Exécuter la requête
     	$oResult = $oConnexion->executer($sRequete);
     	
     }

	
	/**
	 * Rechercher tous les Ouvrages de la base de données
	 * @return array ce tableau contient des objets Ouvrage
	 */
	 public static function rechercherListeDesOuvrages(){
	 	//Connexion à la base de données
	 	$oConnexion = new MySqliLib();
	 	//Requête de recherche de tous les Ouvrages
	 	//".$_SESSION['IdUtilisateur']."
	 	$sRequete = "
	 		SELECT * FROM ouvrage WHERE idUtilisateur = '".$_SESSION['IdUtilisateur']."' ORDER BY sDateOuvrage DESC
		";
	 	//Exécuter la requête
	 	$oResult = $oConnexion->executer($sRequete);
	 	//Récupérer le tableau des enregistrements
	 	$aEnreg = $oConnexion->recupererTableau($oResult);
		$aOuvrages = array();
	 	//Pour tous les enregistrements
	 	for($i=0; $i<count($aEnreg); $i++){
	 		//affecter un objet à un élément du tableau
	 		$aOuvrages[$i] =  new Ouvrage($aEnreg[$i]['idOuvrage'], $aEnreg[$i]['sTitreOuvrage'], $aEnreg[$i]['sCouvertureOuvrage'], $aEnreg[$i]['sGenre'], $aEnreg[$i]['idUtilisateur']);
	 		
	 	}

	 	//retourner le tableau d'objets
	 	return $aOuvrages;
	 }//fin de la fonction rechercherListeDesOuvrages()



	 function supprimerOuvrage(){
		//Connexion à la base de données
		$oConnexion = new MySqliLib();
		//Requete de suppression d'Ouvrage identifié par son idOuvrage
		$sRequete = "
			DELETE FROM ouvrage
			WHERE idOuvrage = ".$this->getIdOuvrage().";";
		
		//Exécuter la requête
		return $oConnexion->executer($sRequete);
	}

	function supprimerContenu(){
		//Connexion à la base de données
		$oConnexion = new MySqliLib();
		//Requete de suppression d'Ouvrage identifié par son idOuvrage
		$sRequete = "
			DELETE  FROM paragraphe
			WHERE idOuvrage = ".$this->getIdOuvrage().";";
		
		//Exécuter la requête
		return $oConnexion->executer($sRequete);
	}


/***************************************** CODE FAIT PAR JULIAN ****************************************/

	/**
	 * Rechercher tous les ouvrages de la base de données par genre cliqué
	 * @author Julian Rendon
	 * @return array ce tableau contient des objets Ouvrage
	 */
	public function rechercherListeDesOuvragesParGenre(){
	 	//Connexion à la base de données
	 	$oConnexion = new MySqliLib();
	 	$sRequete = "SELECT * FROM ouvrage WHERE sGenre = '".$this->ouvrageGenre."';";
	 	//Exécuter la requête
	 	$oResult = $oConnexion->executer($sRequete);
	 	//Récupérer le tableau des enregistrements
	 	$aEnreg = $oConnexion->recupererTableau($oResult);
		$aOuvrages = array();
	 	//Pour tous les enregistrements
	 	for($i=0; $i<count($aEnreg); $i++){
	 		//affecter un objet à un élément du tableau
	 		$aOuvrages[$i] =  new Ouvrage($aEnreg[$i]['idOuvrage'], $aEnreg[$i]['sTitreOuvrage'], $aEnreg[$i]['sCouvertureOuvrage'], $aEnreg[$i]['sGenre'], $aEnreg[$i]['idUtilisateur']);
	 		
	 	}
	 	//retourner le tableau d'objets
	 	return $aOuvrages;
	}//fin de la fonction rechercherListeDesOuvragesParGenre()


	/**
	 * Rechercher tous les ouvrages de la base de données selon une recherche avancee
	 * @author Julian Rendon
	 * @return array ce tableau contient des objets Ouvrage
	 */
	public function rechercheAvancee(){
	 	//Connexion à la base de données
	 	$oConnexion = new MySqliLib();
	 	$sRequete = "SELECT * FROM ouvrage WHERE sGenre = '".$this->ouvrageGenre."';";
	 	//Exécuter la requête
	 	$oResult = $oConnexion->executer($sRequete);
	 	//Récupérer le tableau des enregistrements
	 	$aEnreg = $oConnexion->recupererTableau($oResult);
		$aOuvrages = array();
	 	//Pour tous les enregistrements
	 	for($i=0; $i<count($aEnreg); $i++){
	 		//affecter un objet à un élément du tableau
	 		$aOuvrages[$i] =  new Ouvrage($aEnreg[$i]['idOuvrage'], $aEnreg[$i]['sTitreOuvrage'], $aEnreg[$i]['sCouvertureOuvrage'], $aEnreg[$i]['sGenre'], $aEnreg[$i]['idUtilisateur']);
	 		
	 	}
	 	//retourner le tableau d'objets
	 	return $aOuvrages;
	}//fin de la fonction rechercheAvancee()


/***************************************** FIN CODE FAIT PAR JULIAN ****************************************/	

}//fin de la classe Ouvrage

?>