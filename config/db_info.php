<?php

class Connexion
{
	var $host;
	var $user;
	var $pwd;
	var $nomdb;
	var $lien;
	var $Base;
	
	public function __construct() // Constructeur
	{
		$this->host="localhost";
		$this->user="root";
		$this->pwd="";
		$this->nomdb="pfc_1314";
		$this->lien=mysql_connect($this->host, $this->user, $this->pwd);
		  if(!$this->lien)
			echo 'Erreur de connexion au serveur de base de données!!!';
		$this->Base = mysql_select_db($this->nomdb,$this->lien);
		  if (!$this->Base)
			echo 'Erreur de connexion à la base de donnees!!!';
    }
	
	public function seConnecter()
	{
		if ($this->Base && $this->lien){
				mysql_query("SET NAMES UTF8");
				return true;
		}
		else
			return false;
	}
	
	public function seDeconnecter()
	{
		mysql_close();
	}
	
	public function __destruct() {} //Destructeur 
	
}

?>