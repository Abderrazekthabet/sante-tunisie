<?php


class Patient
{
	private $nom;
	private $prenom;
	private $date_naiss;
	private $adr;
	private $email;
	private $tel;
	
	public function __construct()
	{
		$this->nom ="";
		$this->prenom ="";
		$this->date_naiss ="";
		$this->email ="";
		$this->tel =0;
		$this->adr ="";
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
		$requete_authent = mysql_query("select * from utilisateurs where login='$usr' AND mdp='$pwd' AND type='patient';");

		if ($rep=mysql_fetch_array($requete_authent))
		{
			$pre = $rep['prenom'];
			$nom = $rep['nom'];
			$id = $rep['idPatient'];
			echo "<strong><center>Bienvenue $pre $nom </center> </strong>";
			header("refresh:3;url=../Patient/index.php?$id");
		}
		else
		{
			echo "<strong><center>Verifiez vos parametre de connexion </center> </strong>";
			header("refresh:3;url=../../index.html#cnx");
		}

	}
	
}

?>