<?php
class Message 
{
	var $nom;
	var $email;
	var $message;
    var $nomPart;
	
	public function __construct()
	{
		$this->nom="";
		$this->email="";
		$this->message="";
        $this->nomPart="";
	}
	
	public function envoyer()
	{
		if(mysql_query("INSERT into messagerie_Partenaire (id, nom, email, message, etat, nomPart) values (NULL, '$this->nom','$this->email','$this->message',1, '$this->nomPart');"))
			header("location:../$this->nomPart/contact.php");
		else
			echo mysql_error();
	}
	
	public function lire($id)
	{
		mysql_query("UPDATE messagerie_Partenaire set etat=0 where id=$id;");
		header("location:admin.php");
	}

    public function supprimer($id)
    {
        mysql_query("delete from messagerie_Partenaire where id=$id;");
        header("location:admin.php");
    }
	
	public function afficherNonLu($nomPart)
	{
		$req = mysql_query("SELECT * from messagerie_Partenaire where etat=1 and nomPart='$this->nomPart';");
		return $req;
	}

    public function afficherLu($nomPart)
    {
        $req = mysql_query("select * from messagerie_Partenaire where etat=0 and nomPart='$this->nomPart';");
        return $req;
    }
}

?>