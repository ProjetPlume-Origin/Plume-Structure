<?php
/**
 * MySqliLib.class.php
 * Classe MySqliLib 
 * Liste des Méthodes :
 *		public function setHost($sHost)
 * 		public function setUser($sUser)
 *		public function setPwd($sPwd)
 *		public function setBDD($sBDD)
  *		public function getHost()
 * 		public function getUser()
 *		public function getPwd()
 *		public function getBDD()
 *		public function getConnect()
 *		public function __construct($sHost=MySqliLib::HOST, $sUser=MySqliLib::USER, $sPwd=MySqliLib::PWD, $sBDD=MySqliLib::BDD)
 *		public function executer($sRequete)
 *		public function recupererTableau(mysqli_result $oMySqliResult)
 *
 * @author Caroline Martin cmartin@cmaisonneuve.qc.ca
 * @version 2014-10-08
 */

	require_once 'MySqliException.class.php';
    class MySqliLib extends mysqli { /* héritage */
    	/* constantes d'authentification à la base de données */
    	const HOST ="localhost";
		const USER ="root";
		const PWD="";
		const BDD="projet_plume"; 
    	
		
		/** 
		 * @var string
		 * @access private
		 */
    	private $sHost;
		/** 
		 * @var string
		 * @access private
		 */
		private $sUser;
		/** 
		 * @var string
		 * @access private
		 */
		private $sPwd;
		/** 
		 * @var string
		 * @access private
		 */
		private $sBDD;
		/** 
		 * @var mysqli
		 * @access private
		 */
		private $oConnect;
		
		/**
		 * 
		 * Affecter une valeur à la propriété privée
		 * @access public
		 * @param string $sHost 
		 */
		public function setHost($sHost){
			TypeException::estVide($sHost);
			$this->sHost = $sHost;
		}
		/**
		 * 
		 * Affecter une valeur à la propriété privée
		 * @access public
		 * @param string $sUser 
		 */
		public function setUser($sUser){
			TypeException::estVide($sUser);
			$this->sUser = $sUser;
		}
		/**
		 * 
		 * Affecter une valeur à la propriété privée
		 * @access public
		 * @param string $sPwd 
		 */
		public function setPwd($sPwd){
			
			$this->sPwd = $sPwd;
		}
		/**
		 * 
		 * Affecter une valeur à la propriété privée
		 * @access public
		 * @param string $sBDD 
		 */
		public function setBDD($sBDD){
			TypeException::estVide($sBDD);
			$this->sBDD = $sBDD;
		}
		
		/**
		 * R�cup�rer la valeur de la propriété privée
		 * @access public
		 * @return string
		 */
		public function getHost(){
			
			return $this->sHost;
		}
		/**
		 * R�cup�rer la valeur de la propriété privée
		 * @access public
		 * @return string
		 */
		public function getUser(){
			
			return $this->sUser ;
		}
		/**
		 * R�cup�rer la valeur de la propriété privée
		 * @access public
		 * @return string
		 */
		public function getPwd(){
			
			return $this->sPwd;
		}
		/**
		 * R�cup�rer la valeur de la propriété privée
		 * @access public
		 * @return string
		 */
		public function getBDD(){
			
			return $this->sBDD;
		}
		
		/**
		 * R�cup�rer la valeur de la propriété privée
		 * @access public
		 * @return mysqli
		 */
		public function getConnect(){
			
			return $this->oConnect;
		}
		/**
		 * Constructeur
		 * @access public
		 * @param string $sHost
		 * @param string $sUser
		 * @param string $sPwd
		 * @param string $sBDD
		 */
		public function __construct($sHost=MySqliLib::HOST, $sUser=MySqliLib::USER, 
		$sPwd=MySqliLib::PWD, $sBDD=MySqliLib::BDD){
			
			$this->setHost($sHost);
			
			$this->setUser($sUser);
			$this->setPwd($sPwd);
			$this->setBDD($sBDD);
			
			$this->oConnect = new mysqli($this->getHost(), $this->getUser(), $this->getPwd(), $this->getBDD());
			MySqliException::estConnecte($this->oConnect);
			$this->oConnect->set_charset("utf8");
		} 
		
		/**
		 * 
		 * Exécuter une requête SQL
		 * @access public
		 * @param string $sRequete 
		 */
		public function executer($sRequete){
			TypeException::estVide($sRequete);
			TypeException::estString($sRequete);
			
			$oMysqliResult = $this->oConnect->query($sRequete);
			MySqliException::estUneRequeteValide($oMysqliResult);
			return $oMysqliResult;
		}
		/**
		 * 
		 * Récupérer un array d'enregistrements provenant de la base de données
		 * @access public
		 * @param mysqli_result $oMySqliResult 
		 */
		public function recupererTableau(mysqli_result $oMySqliResult){
			TypeException::estObjet($oMySqliResult);			
			$i=0;
			while(($aEnreg[$i] = $oMySqliResult->fetch_assoc()) != NULL){
				$i++;	
			}
			unset($aEnreg[$i]);
			return 	$aEnreg;
		}
    }//fin de la classe MySqliLib
?>