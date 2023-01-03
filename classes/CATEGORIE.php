<?php

/**************************************************************************
* Source File	:  CATEGORIE.php
* Author                   :  Pateyron
* Project name         :  Non enregistr�* Created                 :  15/06/2015
* Modified   	:  15/06/2015
* Description	:  Definition of the class CATEGORIE
**************************************************************************/




class CATEGORIE 			
{
	//Attributes
		
	 
	var $refCategorie; // type : string
	var $libCategorie; // type : string

	//Operations
	 	
	//D�claration du constructeur
	public function construct($refCategorie, $libCategorie)
	{
		$this-> refCategorie = $refCategorie;		// Initialisation du code de cet objet
		$this-> libCategorie  = $libCategorie;	
	
	}

	

	//D�claration de la m�thode publique 'create' qui permet d'ajouter une nouvelle demande � la BD
	public function create() // FAIT !
	{
		include "../connexionBD.php"; // On n'ins�re pas num�ro car il est auto incr�ment�
		$req = "INSERT INTO CATEGORIE VALUES ('".$this->refCategorie."','".$this->libCategorie."');"; 		// req re�oit une cha�ne de car donc on met tout ce qui ne varie pas entre " ". On concat�ne les parties fixes / variables avec un "." 
		
		$bd->exec($req) or die(print_r($bd->errorInfo(), true));
	}
	
	public function retrieve() // R�cup�rer les valeurs de la BD pour les afficher sur le site -> FINI !!
	{
		include "../connexionBD.php";
		$req = "SELECT * FROM CATEGORIE WHERE refCategorie = '".$this->refCategorie."';"; //On envoie une requete � la BD pour s�lectionner toutes les donn�es de la table Demande
		
		$result = $bd->query($req) or die(print_r($bd->errorInfo(), true));
		
		$line = $result->fetch();
		$this->refCategorie = $line['refCategorie']; // Ici on stock les valeurs de la bd dans nos variables de classe !!
		$this->libCategorie = $line['libCategorie'];
		
	}
	
	public function update() // Fini -> Permet de modifier observation et etat par le gestionnaire mais pas de rectifier une demande incorrecte par l'utilisateur -> Pas vraiment utile.
	{
	
		include "../connexionBD.php";
		$req = "UPDATE CATEGORIE SET refCategorie ='". $this->refCategorie . "', libCategorie='".$this->libCategorie."';";
		$result = $bd->exec($req) or die(print_r($bd->errorInfo(), true));
	
	}
	
	public function get_refCategorie()
	{
		return $this->refCategorie;
	}
	
	public function get_libCategorie()
	{
		return $this->libCategorie;
	}
	
} // FINI !! 
?>
