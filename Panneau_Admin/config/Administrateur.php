<?php

class Administrateur
{	
	public function __construct()
	{
	}
	
	public function authentification($usr,$pwd)
	{
		if($requete_authent = mysql_query("select * from utilisateurs where login='$usr' AND mdp='$pwd';"))
		{

			if ($rep=mysql_fetch_array($requete_authent))
			{
	            session_start();
                $_SESSION['login']=$usr;
                $_SESSION['mdp']=$pwd;
                $_SESSION['type']=$rep['type'];
				header("refresh:0;url=../../index.php");
			}
			else
			{
				echo "<strong><center>Verifiez vos parametre de connexion </center> </strong>";
			}
		}


	}

    public function deconnect()
    {
        session_start();
        session_destroy();
        header("refresh:0;url=../login.html");
    }
	
}

?>