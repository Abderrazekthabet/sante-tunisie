<?php
class Message 
{
	var $nom;
	var $email;
	var $message;
	
	public function __construct()
	{
		$this->nom="";
		$this->email="";
		$this->message="";
	}
	
	public function envoyer()
	{
		if(mysql_query("INSERT into messagerie (id, nom, email, message, etat) values (NULL, '$this->nom','$this->email','$this->message',1);"))
			header("location:../contact.php");
		else
			echo mysql_error();
	}
	
	public function lire($id)
	{
		mysql_query("UPDATE Messagerie set etat=0 where id=$id;");
		header("location:admin.php");
	}

    public function supprimer($id)
    {
        mysql_query("delete from messagerie where id=$id;");
        header("location:admin.php");
    }
	
	public function afficherNonLu()
	{
		$req = mysql_query("SELECT * from messagerie where etat=1;");
		return $req;
	}

    public function afficherLu()
    {
        $req = mysql_query("select * from messagerie where etat=0;");
        return $req;
    }
}

?>