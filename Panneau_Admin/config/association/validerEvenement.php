<?php
include ("../../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$idRec = $_GET['id'];

mysql_query("update evenements set etat_admin= 'Validé' where idEvenement = '$idRec';");

header('refresh:0; URL=../../Associations.php');	
$cnx->seDeconnecter();
?>