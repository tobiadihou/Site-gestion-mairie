<?php

/**************************************************************************
* Source File	:  IMMOBILIER.php
* Author                   :  Pateyron
* Project name         :  Non enregistr�* Created                 :  15/06/2015
* Modified   	:  15/06/2015
* Description	:  Definition of the class IMMOBILIER
**************************************************************************/




class IMMOBILIER  // extends PATRIMOINE			
{
	 //Attributes
		
	// private	$idPatrimoine;
	// private	$libPatrimoine;
	
	private $_refPatrimoine; // type : string
	private $_refEntite; // type : string
	private $_refCategorie;
	private $_adresse;
	
	//Operations
	 	
	 //D�claration du constructeur
	public function construct( /*$idPatrimoine, $libPatrimoine, */ $refPatrimoine, $refEntite, $refCategorie, $adresse)
	{
		// PATRIMOINE::construct($idPatrimoine, $libPatrimoine);
		
		$this->_refPatrimoine = $refPatrimoine;		// Initialisation du code de cet objet
		$this->_refEntite  = $refEntite;
		$this->_refCategorie = $refCategorie;
		$this->_adresse  = $adresse;
		
	}
	
	
	//D�claration de la m�thode publique 'create' qui permet d'ajouter un nouveau club � la BD
	public function create()
	{
		include "../connexionBD.php";
		$req = "INSERT INTO IMMOBILIER VALUES ('"/* .PATRIMOINE::get_id()."','".PATRIMOINE::get_lib(). "','" */.$this->_refPatrimoine."','".$this->_refEntite."','".$this->_refCategorie."','".$this->_adresse."');"; 		// req re�oit une cha�ne de car donc on met tout ce qui ne varie pas entre " ". On concat�ne les parties fixes / variables avec un "." 
		
		$bd->exec($req) or die(print_r($bd->errorInfo(), true));
	}
	
	public function retrieve() // M�thode pour effectuer la requete
	{
		include "../connexionBD.php";
		$req = "SELECT * FROM IMMOBILIER WHERE idIMMOBILIER = '".$this->_refPatrimoine."';"; //On envoie une requete � la BD pour s�lectionner toutes les donn�es de la table Club
		
		$result = $bd->query($req) or die(print_r($bd->errorInfo(), true));
		
		$line = $result->fetch();
		$this->_refPatrimoine = $line['idIMMOBILIER']; // Il s'agit d'une jointure entre la valeur de l'attribut _refPatrimoine de la classe Club et l'attribut code de la table Club de la base.
		$this->_nom = $line['libIMMOBILIER']; //Fini
		
		
		
	}
	
	
	public function get_refPatrimoine()
	{
		return $this->_refPatrimoine;
	}
	
	public function get_refEntite()
	{
		return $this->_refEntite;
	}
	
	public function get_refCategorie()
	{
		return $this->_refCategorie;
	}
	
	public function get_adresse()
	{
		return $this->_adresse;
	}
} // End Class IMMOBILIER


?>

