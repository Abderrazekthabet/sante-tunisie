<?php
include ("../../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$idRec = $_GET['id'];

mysql_query("update associations set etat_compte= 'Validé' where idAssociation = '$idRec';");

header('refresh:0; URL=../../Associations.php');	
$cnx->seDeconnecter();
?>