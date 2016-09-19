<?php


class Association
{
	private $nom;
	private $date_creation;
	private $adr;
	private $email;
	private $tel;
	private $fax;
	private $categorie;
	private $note;
	
	public function __construct()
	{
		$this->nom ="";
		$this->date_creation ="";
		$this->email ="";
		$this->tel =0;
		$this->fax =0;
		$this->adr ="";
		$this->note =0.0;
		$this->categorie="";
	}
	// gets / sets
	public function setNom($nom)
	{
		$this->nom = $nom;
	}
	public function getNom()
	{
		return $this->nom;
	}
	//*********************//
	
	public function authentification($usr,$pwd)
	{
		$requete_authent = mysql_query("select * from utilisateurs where login='$usr' AND mdp='$pwd' AND type='association';");

		if ($rep=mysql_fetch_array($requete_authent))
		{
			$pre = $rep['prenom'];
			$nom = $rep['nom'];
			$id = $rep['idMedecin'];
			header("refresh:1;url=../Association/index.php?$id");
		}
		else
		{
			echo "<strong><center>Verifiez vos parametre de connexion </center> </strong>";
			header("refresh:3;url=../../index.html#cnx");
		}

	}
	
}

?>