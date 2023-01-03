<?php

/**************************************************************************
* Source File	:  ENTITE.php
* Author                   :  Pateyron
* Project name         :  Non enregistr�* Created                 :  15/06/2015
* Modified   	:  15/06/2015
* Description	:  Definition of the class ENTITE
**************************************************************************/




class ENTITE 			
{
	//Attributes
		
	 
	private $_ref; // type : string
	private $_lib; // type : string

	//Operations
	 	
	 //D�claration du constructeur
	public function construct($refEntite, $libEntite)
	{
		$this->_ref = $refEntite;		// Initialisation du code de cet objet
		$this->_lib  = $libEntite;			
	}
	
	
	//D�claration de la m�thode publique 'create' qui permet d'ajouter un nouveau club � la BD
	public function create()
	{
		include "../connexionBD.php";
		$req = "INSERT INTO ENTITE VALUES ('".$this->_ref."','".$this->_lib."');"; 		// req re�oit une cha�ne de car donc on met tout ce qui ne varie pas entre " ". On concat�ne les parties fixes / variables avec un "." 
		
		$bd->exec($req) or die(print_r($bd->errorInfo(), true));
	}
	
	public function retrieve() // M�thode pour effectuer la requete
	{
		include "../connexionBD.php";
		$req = "SELECT * FROM ENTITE WHERE refEntite = '".$this->_ref."';"; //On envoie une requete � la BD pour s�lectionner toutes les donn�es de la table Club
		
		$result = $bd->query($req) or die(print_r($bd->errorInfo(), true));
		
		$line = $result->fetch();
		$this->_ref = $line['refEntite']; // Il s'agit d'une jointure entre la valeur de l'attribut _ref de la classe Club et l'attribut code de la table Club de la base.
		$this->_nom = $line['libEntite']; //Fini
		
		
		
	}
	
	public function update()
	{
	
		include "../connexionBD.php";
		$req = "UPDATE ENTITE SET libEntite ='". $this->_lib . "' WHERE refEntite = ". $this->_ref .";";
		$result = $bd->exec($req) or die(print_r($bd->errorInfo(), true));
		
	
	}
	
	
	public function get_ref()
	{
		return $this->_ref;
	}
	
	public function get_lib()
	{
		return $this->_lib;
	}
	

} // End Class ENTITE


?>

