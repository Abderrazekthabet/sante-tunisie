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
			header("location:../../../index.html");
		else
			echo mysql_error();
	}
	
	public function lire($id)
	{
		if(mysql_query("update messagerie set etat=0 where id=$id;"))
		{
			header("location:../inbox.php");
		}
		else echo mysql_error();
	}

    public function supprimer($id)
    {
        mysql_query("delete from messagerie where id=$id;");
        header("location:../inbox.php");
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

    public function returnNumberNonLu()
    {
        $req = mysql_query("select count(*) as nbre from messagerie where etat=1;");
        return $req;
    }

    public function returnNumber()
    {
        return mysql_query("select count(*) as nbre from messagerie;");
    }
}

?>