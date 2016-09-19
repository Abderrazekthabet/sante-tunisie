<?php
include ("../../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$idRec = $_GET['id'];

mysql_query("update articles set etat_admin= 'Validé' where idArticle = '$idRec';");

	header('refresh:0; URL=../../Associations.php');		





$cnx->seDeconnecter();
?>