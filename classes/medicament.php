<?php

class Medicament
{
	var $nom;
	var $description;
	var $categorie;
	var $chemin_image;
	
	public function __construct()
	{
		$this->nom="";
		$this->description="";
		$this->categorie="";
		$this->chemin_image="";
	}
	
	public function ajouter()
	{
		mysql_query("INSERT into medicaments (id,nom, description,categorie, chemin_image) values (NULL, '$this->nom', '$this->description', '$this->categorie', '$this->chemin_image');");
		header("location:admin.php");
	}
	
	public function afficher()
	{
		return mysql_query("SELECT * from medicaments");
	}
	
	public function modifier($id)
	{
		mysql_query("UPDATE medicaments set nom='$this->nom', description='$this->description', categorie='$this->categorie', chemin_image='$this->chemin_image' where id=$id;");
		header("location:admin.php");
	}
	
	public function supprimer($id)
	{
		mysql_query("DELETE from medicaments where id=$id");
		header("location:admin.php");
	}
}

?>