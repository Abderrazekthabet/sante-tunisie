<?php
include ("../../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$idRec = $_GET['id'];
mysql_query("SET foreign_key_checks = 0;");

mysql_query("delete from evenements where idEvenement = '$idRec';");
mysql_query("SET foreign_key_checks = 1;");
header('refresh:0; URL=../../Associations.php');	
$cnx->seDeconnecter();
?>