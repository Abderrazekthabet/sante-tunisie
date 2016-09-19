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
		mysql_query("INSERT into medicaments (id,nom, description,categorie, chemin_image, visites) values (NULL, '$this->nom', '$this->description', '$this->categorie', '$this->chemin_image', 0);");
		header("location:../Medicaments.php");
	}
	
	public function afficher()
	{
		return mysql_query("SELECT * from medicaments");
	}

    public function afficher_unique($id)
    {
        return mysql_query("select * from medicaments where id=$id");
    }
	
	public function modifier($id)
	{
		mysql_query("UPDATE medicaments set nom='$this->nom', description='$this->description', categorie='$this->categorie' where id=$id;");
		header("location:../Medicaments.php");
	}
	
	public function supprimer($id)
	{
		mysql_query("DELETE from medicaments where id=$id");
		header("location:../Medicaments.php");
	}

    public function nbreMedic()
    {
        return mysql_query("select count(*) as nbre from medicaments");
    }
}

?>