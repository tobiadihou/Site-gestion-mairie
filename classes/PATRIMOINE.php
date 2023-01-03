<?php

/**************************************************************************
* Source File	:  PATRIMOINE.php
* Author                   :  Pateyron
* Project name         :  Non enregistr�* Created                 :  15/06/2015
* Modified   	:  15/06/2015
* Description	:  Definition of the class PATRIMOINE
**************************************************************************/




class PATRIMOINE 			
{
	 //Attributes
		
	 
	private $_id; // type : string
	private $_lib; // type : string

	//Operations
	 	
	 //D�claration du constructeur
	public function construct($idPatrimoine, $libPatrimoine)
	{
		$this->_id = $idPatrimoine;		// Initialisation du code de cet objet
		$this->_lib  = $libPatrimoine;			
	}
	
	
	//D�claration de la m�thode publique 'create' qui permet d'ajouter un nouveau club � la BD
	public function create()
	{
		include "../connexionBD.php";
		$req = "INSERT INTO PATRIMOINE VALUES ('".$this->_id."','".$this->_lib."');"; 		// req re�oit une cha�ne de car donc on met tout ce qui ne varie pas entre " ". On concat�ne les parties fixes / variables avec un "." 
		
		$bd->exec($req) or die(print_r($bd->errorInfo(), true));
	}
	
	public function retrieve() // M�thode pour effectuer la requete
	{
		include "../connexionBD.php";
		$req = "SELECT * FROM PATRIMOINE WHERE idPatrimoine = '".$this->_id."';"; //On envoie une requete � la BD pour s�lectionner toutes les donn�es de la table Club
		
		$result = $bd->query($req) or die(print_r($bd->errorInfo(), true));
		
		$line = $result->fetch();
		$this->_id = $line['idPatrimoine']; // Il s'agit d'une jointure entre la valeur de l'attribut _id de la classe Club et l'attribut code de la table Club de la base.
		$this->_nom = $line['libPatrimoine']; //Fini
		
		
		
	}
	
	public function update()
	{
	
		include "../connexionBD.php";
		$req = "UPDATE PATRIMOINE SET libPatrimoine ='". $this->_lib . "' WHERE idPatrimoine = ". $this->_id .";";
		$result = $bd->exec($req) or die(print_r($bd->errorInfo(), true));
		
	
	}
	
	
	public function get_id()
	{
		return $this->_id;
	}
	
	public function get_lib()
	{
		return $this->_lib;
	}
	
} // End Class PATRIMOINE


?>

