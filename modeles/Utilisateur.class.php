<?php


class Utilisateur {
	
	
	/* Propriétés privées */
	private $idUtilisateur;
	private $sNom;
	private $sCourriel;
	private $sMotDePasse;
    private $sConfirmation;
    private $sAvatar;
    private $sStatus;
    private $sTypeUtilisateur;
  
	

	/**
	 * Constructeur
	 * @param integer  $idUtilisateur
	 * @param string   $sNom
	 * @param string   $sCourriel
	 * @param string   $sMotDePasse
     * @param string   $sConfirmation
     * @param string   $sAvatar
     * @param integer  $sStatus
     * @param string   $sTypeUtilisateur
     * @param integer  $iIdPreference
     *
	 */
	public function __construct($idUtilisateur=0, $sNom=" ", $sCourriel="hh@hotmail.com", $sMotDePasse="aa",$sConfirmation="aa",$sTypeUtilisateur="Membre",$sAvatar=" ",$sStatus="Inactive"){
		$this->setIdUtilisateur($idUtilisateur);
		$this->setNom($sNom);
		$this->setCourriel($sCourriel);
        $this->setMotDePasse($sMotDePasse);
        $this->setConfirmation($sConfirmation);
        $this->setAvatar($sAvatar);
        $this->setStatus($sStatus);
        $this->setTypeUtilisateur($sTypeUtilisateur);
       
        	
		
	} //fin du constructeur
	
     /*--------------------------------------setting-Affectation---------------------------------------------------*/
    
	    
    /**
	 * @param integer $idUtilisateur0
	 */
	public function setIdUtilisateur($idUtilisateur){
		TypeException::estNumerique($idUtilisateur);
		
		$this->idUtilisateur = $idUtilisateur;
	}
    
    /**
	 *  * @param string $sNom
	 */
    
    
	public function setNom($sNom){
		TypeException::estString($sNom);
		TypeException::estVide($sNom);
		
		$this->sNom = $sNom;
	}
    
	/**
	 * @param string $sCourriel
	 */
    
	public function setCourriel($sCourriel){
		TypeException::estCourriel($sCourriel);
		TypeException::estVide($sCourriel);
            	
		$this->sCourriel = $sCourriel;
	}
	
    
    
    /**
	 * @param string $sMotDePasse
	 */
    
	public function setMotDePasse($sMotDePasse){
		//TypeException::estString($sMotDePasse);
		TypeException::estVide($sMotDePasse);
		
		$this->sMotDePasse = $sMotDePasse;
	}
	
     /**
	 * @param string $sConfirmation
	*/
    
	public function setConfirmation($sConfirmation){
		//TypeException::estString($sConfirmation);
		TypeException::estVide($sConfirmation);
		
		$this->sConfirmation = $sConfirmation;
	} 
    
    
     /**
	 * @param string $sAvar
	 */
    
	public function setAvatar($sAvatar){
		TypeException::estString($sAvatar);
		TypeException::estVide($sAvatar);
		
		$this->sAvatar = $sAvatar;
	}
    
    
     /**
	 * @param string $sStatus
	 */
    
	public function setStatus($sStatus){
		TypeException::estString($sStatus);
		TypeException::estVide($sStatus);
		
		$this->sStatus = $sStatus;
	}
    
      /**
	 * @param string $sTypeUtilisateur
	 */
    
	public function setTypeUtilisateur($sTypeUtilisateur){
		TypeException::estString($sTypeUtilisateur);
		TypeException::estVide($sTypeUtilisateur);
		
		$this->sTypeUtilisateur = $sTypeUtilisateur;
	}
    
    
    
     
    /*--------------------------------------getting----------------------------------------------------*/
	
    
    
    /**
	 * @return integer $idUtilisateur
	 */
	public function getIdUtilisateur(){
		return $this->idUtilisateur;
	}
    
      
    /**
	 * @return integer sNom
	 */
    
	public function getNom(){
		return htmlentities($this->sNom);
	}
	
    
    
    
     /**
	 * @return integer $sCourriel
	 */
    
	public function getCourriel(){
		return htmlentities($this->sCourriel);
	}
	
    
      /**
	 * @return integer $sMotDePasse#   
    */
    
	public function getMotDePasse(){
		return htmlentities($this->sMotDePasse);
	}
    
    
    /**
	 * @return integer $sConfirmation#   
   */
    
	public function getConfirmation(){
		return htmlentities($this->sConfirmation);
	} 
    
    /**
	 * @return integer $sAvar#   
    */
    
	public function getAvatar(){
		return htmlentities($this->sAvatar);
	}
    
    
     /**
	 * @return integer $sStatus#   
    */
    
	public function getStatus(){
		return htmlentities($this->sStatus);
	}
    
    
    /**
	 * @return integer $sTypeUtilisateur#   
    */
    
	public function getTypeUtilisateur(){
		return htmlentities($this->sTypeUtilisateur);
	}
    
    
    
     
    
    
    
    /**********************************les methodes*********************************************************************/
	
	
    
    /**
	 * Rechercher un Utilisateur par son sNom
	 * @return boolean true si l'enregistrement est trouvé dans la BDD
	 * false dans tous les autres cas
	 */
	function rechercherUnUtilisateur(){
		//Connecter à la base de données
		$oConnexion = new MySqliLib();
		//Réaliser la requête de recherche par le idEtudiant
		$sRequete= "SELECT * FROM utilisateur WHERE idUtilisateur=".$this->getIdUtilisateur();
		echo $sRequete;
		//Exécuter la requête
		$oResult = $oConnexion->executer($sRequete);
		if($oResult != false){
			//Récupérer le tableau des enregistrements s'il existe
			$aUtilisateur = $oConnexion->recupererTableau($oResult);
           // echo"aUtilisateur";
			//var_dump($aUtilisateur);
			if(empty($aUtilisateur[0]) != true){
				//Affecter les propriétés de l'objet en cours avec les valeurs
                $this->setIdUtilisateur($aUtilisateur[0]['idUtilisateur']);
				$this->setNom($aUtilisateur[0]['sNomUtilisateur']);
				$this->setTypeUtilisateur($aUtilisateur[0]['sTypeUtilisateur']);
				$this->setStatus($aUtilisateur[0]['sStatut']);
				//retourner true
				return true;	
			}
			return false;
			
		}
	
	}//fin de la fonction rechercherUnUtilisateur()
    
/*****------------------------------------------------------------------------------------------------------------------*****/   
	/**
	 * Supprimer un Utilisateur à partir de son idUtilisateur
	 * Les tables sont innoDB et avec des contraintes ON DELETE CASCADE
	 * @return boolean true si la suppression s'est bien déroulée
	 * false dans tous les autres cas
	 */
	function supprimerUtilisateur_innoDB(){
		//Connexion à la base de données
		$oConnexion = new MySqliLib();
		//Requete de suppression d'Utilisateur identifié par son idUtilisateur
		$sRequete = "
			DELETE FROM utilisateur
			WHERE idUtilisateur = ".$this->getIdUtilisateur().";";
		echo $sRequete;
		//Exécuter la requête
		return $oConnexion->executer($sRequete);
	}
	
/*****------------------------------------------------------------------------------------------------------------------*****/   	
	/**
	 * Modifier un utilisateur
	 * @return boolean true si la modification s'est bien déroulé
	 * false dans tous les autres cas.
	 */
	function modifierUnUtilisateur(){
		//Connexion à la base de données
		$oConnexion = new MySqliLib();
		//Requete de modification de l'étudiant
		$sRequete = "
			UPDATE utilisateur
			SET sNomUtilisateur = '".$oConnexion->getConnect()->escape_string($this->sNom)."',"
                ."  sTypeUtilisateur = '".$oConnexion->getConnect()->escape_string($this->sTypeUtilisateur)."',"
                ."  sStatut = '".$oConnexion->getConnect()->escape_string($this->sStatus)."'
          
			WHERE idUtilisateur = ".$this->idUtilisateur."
		";
       
		//Exécuter la requête
		return $oConnexion->executer($sRequete);
	}
	
/*****------------------------------------------------------------------------------------------------------------------*****/   	
	/**
	 * Rechercher tous les Utilisateurs de la base de données
	 * @return array ce tableau contient des objets Utilisateur
	 */
	 public static function rechercherListeDesUtilisateurs(){
	 	//Connexion à la base de données
	 	$oConnexion = new MySqliLib();
	 	//Requête de recherche de tous les Utilisateurs
	 	$sRequete = "
	 		SELECT * FROM utilisateur
	 	";
        // echo  $sRequete;
	 	//Exécuter la requête
	 	$oResult = $oConnexion->executer($sRequete);
	 	//Récupérer le tableau des enregistrements
	 	$aEnreg = $oConnexion->recupererTableau($oResult);
        //var_dump($aEnreg);
		$aUtilisateurs = array();
	 	//Pour tous les enregistrements
	 	for($iEnreg=0; $iEnreg<count($aEnreg); $iEnreg++){
	 		//affecter un objet à un élément du tableau
             $aUtilisateurs[$iEnreg] =  new Utilisateur($aEnreg[$iEnreg]['idUtilisateur'], 
                                                        $aEnreg[$iEnreg]['sNomUtilisateur'],
                                                        $aEnreg[$iEnreg]['sCourrielUtilisateur'],
                                                        $aEnreg[$iEnreg]['sMotPassUtilisateur'],
                                                        $aEnreg[$iEnreg]['sMotPassUtilisateur'],
                                                        $aEnreg[$iEnreg]['sTypeUtilisateur'],
                                                        $aEnreg[$iEnreg]['sAvatarUtilisateur'],
                                                        $aEnreg[$iEnreg]['sStatut']
                                                       );
	 	}
	 	//retourner le tableau d'objets
	 	return $aUtilisateurs;
	 }//fin de la fonction rechercherListeDesEtudiants()
	 
	 
/***************************************************************************************************/	
    /**
	 * Ajouter un utilisateur
	 * @return boolean true si l'ajout s'est bien déroulé
	 * false dans tous les autres cas.
	 */
	function ajouterUtilisateur(){
		//Connexion à la base de données
		$oConnexion = new MySqliLib();
		//Requete d'ajout de l'utilisateur
        $sRequete = "
			INSERT INTO utilisateur
			SET sNomUtilisateur = '".$oConnexion->getConnect()->escape_string($this->sNom)."',"
			."  sCourrielUtilisateur = '".$oConnexion->getConnect()->escape_string($this->sCourriel)."',"
            ."  sMotPassUtilisateur = '".$oConnexion->getConnect()->escape_string(md5($this->sMotDePasse))."',"     
            ."  sAvatarUtilisateur = '".$oConnexion->getConnect()->escape_string($this->sAvatar)."',"
            ."  sTypeUtilisateur= '".$oConnexion->getConnect()->escape_string($this->sTypeUtilisateur)."',"
            ."  sStatut= 'active'
          ";
		//Exécuter la requête
        // echo $sRequete;
		if($oConnexion->executer($sRequete) == true){
			return $oConnexion->getConnect()->insert_id;
		}
		return false;
	}
    
    
    
/*****------------------------------------------------------------------------------------------------------------------*****/       
    
    
    
    
    
     /**
	 * connexion un utilisateur
	 * @return boolean true si le mot de passe et courriel sont correcte
	 * false dans tous les autres cas.
	 */
	 public  function connexionUtilisateur(){
		
        $courriel =$this ->sCourriel;
        $motDepasse=$this ->sMotDePasse;
         $oConnexion = new MySqliLib();                                              
        $sRequete = "SELECT * FROM utilisateur WHERE sCourrielUtilisateur ='$courriel'
                                                        and
                                                    sMotPassUtilisateur = '$motDepasse'     
			                                             and
                                                    sStatut= 'active' ";
		// echo $sRequete;
        $oResult = $oConnexion->executer($sRequete);
        $aResult = $oConnexion->recupererTableau($oResult);
        //var_dump($aResult);
        return $aResult;
        
        
    }
    
  /*****------------------------------------------------------------------------------------------------------------------*****/     
    
    
    
    
    function verificationCourriel(){
		//Connexion à la base de données
		$oConnexion = new MySqliLib();
		// on recherche si ce courriel est déja utilise par un autre membre
        $sRequete ='SELECT * FROM utilisateur WHERE   sCourrielUtilisateur = "'.$oConnexion->getConnect()->escape_string($_POST['txtCourriel']).'"'  ;                      
        // echo $sRequete;
        $oResult = $oConnexion->executer($sRequete);
        $aResult = $oConnexion->recupererTableau($oResult);

          if (!empty($aResult)) {
              
              return false;
         } else {
        
            return true;
        
          }
        
    }
    
 /*****------------------------------------------------------------------------------------------------------------------*****/      
    
    function verificationNom(){
		//Connexion à la base de données
		$oConnexion = new MySqliLib();
		// on recherche si ce courriel est déja utilise par un autre membre
         $sRequete = 'SELECT * FROM utilisateur WHERE   sNomUtilisateur = "'.$oConnexion->getConnect()->escape_string($_POST['txtNom']).'"'  ;                                          
        // echo $sRequete;
        $oResult = $oConnexion->executer($sRequete);
        $aResult = $oConnexion->recupererTableau($oResult);

          if (!empty($aResult)) {
              
              return false;
         } else {
        
            return true;
        
          }
        
    }
    
   /*****------------------------------------------------------------------------------------------------------------------*****/   
    function verificationMotPass(){
		//Connexion à la base de données
        if ($this ->sMotDePasse != $this ->sConfirmation) {
            
              return false;
         } else {
        
            return true;
        
          }
        
    }
    
    	
  /*****------------------------------------------------------------------------------------------------------------------*****/     
    function RechercheParCourriel(){
		//Connexion à la base de données
		$oConnexion = new MySqliLib();
		// on recherche si ce courriel est déja utilise par un autre membre
        $sRequete ='SELECT * FROM utilisateur WHERE   sCourrielUtilisateur = "'.$oConnexion->getConnect()->escape_string($_POST['txtCourriel']).'"'  ;                      
        // echo $sRequete;
        $oResult = $oConnexion->executer($sRequete);
        $aResult = $oConnexion->recupererTableau($oResult);
        //var_dump($aResult);
       
        
        return $aResult;
        
    }
    
    
    
  /*---------------------------------------------------------------*/
    
    
    function supprimerUnUtilisateur(){
		//Connexion à la base de données
		$oConnexion = new MySqliLib();
		//Requete de suppression du produit identifié par son idProduit
		$sRequete = "
			DELETE FROM utilisateur
			WHERE idUtilisateur = ".$this->idUtilisateur.";";
		//echo  $sRequete;
		//Exécuter la requête
		$oConnexion->executer($sRequete);
		return $oConnexion->getConnect()->affected_rows;
	}//fin de la fonction supprimerUnProduit()
    
    
    
    
    
    
    /*****------------------------------------------------------------------------------------------------------------------*****/   	
	/**
	 * Modifier un utilisateur
	 * @return boolean true si la modification s'est bien déroulé
	 * false dans tous les autres cas.
	 */
	function modifierMotDePasseUnUtilisateur(){
		//Connexion à la base de données
		$oConnexion = new MySqliLib();
		//Requete de modification de l'étudiant
		$sRequete = "
			UPDATE utilisateur
			SET sMotPassUtilisateur = '".$oConnexion->getConnect()->escape_string(md5($this->sMotDePasse))."'
            WHERE idUtilisateur = ".$this->idUtilisateur."
		";
       echo $sRequete;
		//Exécuter la requête
		return $oConnexion->executer($sRequete);
	}
	
    
    
    
    
    
    
    
    
    
    
	 
	 
}//fin de la classe Utilisateur
?>