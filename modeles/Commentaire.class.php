<?php

class Commentaire {
	
	
	/* Propriétés privées */
	private $idOuvrage; 	
	private $sTitreOuvrage;
	private $sDateOuvrage; 	
	private $sCouvertureOuvrage;
	private $sGenre;
	private $idUtilisateur;
		
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
	 
	/*
	public function __construct($idUtilisateur=0, $sNom=" ", $sCourriel="hh@hotmail.com", $sMotDePasse="aa",$sConfirmation="aa",$sTypeUtilisateur="Membre",$sAvatar=" ",$sStatus="Inactive"){
		       	
		
	} //fin du constructeur
	*/
	
    /*--------------------------------------setting-Affectation---------------------------------------------------*/
    
    
    /*--------------------------------------getting----------------------------------------------------*/
	
 	/* ---------- methodes ------------*/
	/*
	 *
	 *  function index montre le commentaire dans la section admin
	 *
	 */
	public static function index()
	{
		$oConnexion = new MySqliLib();
		//Requete d'ajout de l'utilisateur
        $sRequete = "
        		SELECT C.idCommentaire, C.sContenuCommentaire, 
        				C.sDateCommentaire, 
        				O.sTitreOuvrage, P.idParagraphe, C.active 
				FROM commentaire AS C 
				INNER JOIN paragraphe AS P on P.idParagraphe = C.idParagraphe 
				INNER JOIN ouvrage AS O on O.idOuvrage = P.idOuvrage 
				ORDER BY sDateCommentaire DESC";
				
		//Exécuter la requête
        //echo $sRequete;
        $oResult = $oConnexion->executer($sRequete);
        $aResult = $oConnexion->recupererTableau($oResult);
		return $aResult;
	}/////fin  function
	
	/*
	 *  function ajouterCommentaire($comment)
	 * param  ($comment)
	 *
	 */
	public static function ajouterCommentaire($comment)
	{	 
		$sContenuCommentaire = $_POST['sContenuCommentaire'];
		$idParagraphe        = $_POST['idParagraphe'];
		$idUtilisateur       = $_POST['idUtilisateur'];
		
		$oConnexion = new MySqliLib();
		//Requete d'ajout de l'utilisateur
        $sRequete = "
			INSERT INTO commentaire
			VALUES (
				null, '$sContenuCommentaire', NOW(),
				$idParagraphe, $idUtilisateur,1)";
				
		//Exécuter la requête
        //echo $sRequete;
		if($oConnexion->executer($sRequete) == true){
			return $oConnexion->getConnect()->insert_id;
		} else {
			return false;
		}
	} // fin de functin ajouter Commentarios

    /*
     * function setActive
     *  param ($idCommentaire, $active)
     */
	public static function setActive($idCommentaire, $active)
	{
		$oConnexion = new MySqliLib();
		//Requete d'ajout de l'utilisateur
        $sRequete = "
			UPDATE commentaire
			SET active = $active
			WHERE idCommentaire = $idCommentaire";
				
		//Exécuter la requête
        //echo $sRequete;
		return($oConnexion->executer($sRequete));
	} //fin function
	
}