<?php


class Preference {
	
	
	public $idUtilisateur;
	public $sFontFamily;
	public $sFontColor;
	public $iFontsize;
	public $sBackgroundColor;
	


	public function __construct($idUtilisateur=1, $sFontFamily="Times New Roman", $sFontColor="#000", $iFontsize=16, $sBackgroundColor="#fff")
    {
		$this->setidUtilisateur($idUtilisateur);
		$this->setFontFamily($sFontFamily);
		$this->setFontColor($sFontColor);
		$this->setFontsize($iFontsize);
		$this->setBackgroundColor($sBackgroundColor);
	} //fin du constructeur
	
	/*****  Setters *******/

	public function setFontFamily($sFontFamily)
    {
		TypeException::estString($sFontFamily);
		TypeException::estVide($sFontFamily);
		
		$this->sFontFamily = $sFontFamily;
	}

	public function setFontColor($sFontColor)
    {
		TypeException::estString($sFontColor);
		TypeException::estVide($sFontColor);
		
		$this->sFontColor = $sFontColor;
	}

	public function setIdUtilisateur($idUtilisateur)
    {
		TypeException::estNumerique($idUtilisateur);
		
		$this->idUtilisateur = $idUtilisateur;
	}
	
	public function setBackgroundColor($sBackgroundColor)
    {
        TypeException::estString($sBackgroundColor);
		TypeException::estVide($sBackgroundColor);
		
		$this->sBackgroundColor = $sBackgroundColor;
	}
    
    public function setFontsize($iFontsize)
    {
		TypeException::estNumerique($iFontsize);
		
		$this->iFontsize = $iFontsize;
	}

    
    /*****  Getters ****/
    
    
	public function getFontFamily()
    {
		return htmlentities($this->sFontFamily);
	}

	public function getFontColor()
    {
		return htmlentities($this->sFontColor);
	}

	public function getFontsize()
    {
		return $this->iFontsize;
	}
    
	public function getIdUtilisateur()
    {
		return $this->idUtilisateur;
	}

	public function getBackgroundColor()
    {
		return $this->sBackgroundColor;
	}
	
    
    /****** Fonctions ********/
    
    
    
    public static function sauvegarderPreference($idUtilisateur, $sFontFamily, $sFontColor, $iFontsize, $sBackgroundColor)
    {
    
        $oConnexion = new MySqliLib();
		
		$sRequete= "UPDATE reglage SET sTypePolice = '".$sFontFamily."',sTaillePolice = '".$iFontsize."',sCouleurPolice = '".$sFontColor."',sCouleurFond = '".$sBackgroundColor."'WHERE idUtilisateur = '".$idUtilisateur."';";
        
        $oResult = $oConnexion->executer($sRequete);
    }
    
    
    public static function chargerPreference($idUtilisateur)
    {
        $oConnexion = new MySqliLib();
        
        $sRequete= "SELECT * FROM reglage WHERE idUtilisateur = ".$idUtilisateur;
        
        $oResult = $oConnexion->executer($sRequete);
        

        $aPreference = $oConnexion->recupererTableau($oResult);
        
        return $aPreference[0];
    
    
    }
    
    
    
    
    
    
    
    
    
	
}//fin de la classe Preference
?>