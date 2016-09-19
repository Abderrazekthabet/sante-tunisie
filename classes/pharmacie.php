<?php

class Pharmacie
{	
	public function __construct()
	{
	}
	
	public function authentification($usr,$pwd)
	{
		if($requete_authent = mysql_query("select * from utilisateurs where login='$usr' AND mdp='$pwd' AND type='admin_pharma';"))
		{

			if ($rep=mysql_fetch_array($requete_authent))
			{
	            session_start();
                $_SESSION['login']=$usr;
                $_SESSION['mdp']=$pwd;
				header("refresh:0;url=../Portail_pharmacie/admin.php");
			}
			else
			{
				echo "<strong><center>Verifiez vos parametre de connexion </center> </strong>";
			}
		}


	}
	
}

?>