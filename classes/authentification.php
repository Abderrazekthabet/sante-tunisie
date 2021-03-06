<?php

//INCLUDES & REQUIREDS
include ("../../config/db_info.php");
include ("../../classes/medecin.php");
include ("../../classes/patient.php");
include ("../../classes/association.php");
include ("../Panneau_Admin/config/Administrateur.php");
//*********************//

//Connexion à la base de données
$cnx = new Connexion();
$cnx->seConnecter();
//*********************//

if(isset($_GET['log']))
{
    $Admin = new Administrateur();
	$Admin->deconnect();
}
else
{
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $type = $_POST['typeAuth'];
}

if ($type == "med")
{
	$med = new Medecin();
	$med->authentification($username,$password);
}
if ($type == "pat")
{
	$pat = new Patient();
	$pat->authentification($username,$password);
}
if ($type == "assoc")
{
	$assoc = new Association();
	$assoc->authentification($username,$password);
}
if ($type == "admin")
{
	$Admin = new Administrateur();
	$Admin->authentification($username,$password);
}
}
?>