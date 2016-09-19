<meta charset="utf-8"/>
<?php
	session_start();
	include("../../config/db_info.php");
	$cnx = new Connexion();
	$cnx->seConnecter();
	session_unset();
	session_destroy();
	echo '<body onLoad="alert (\'Vous êtes maintenant déconnecté...\')">';
	header('refresh:2; URL=../../index.php');
?>