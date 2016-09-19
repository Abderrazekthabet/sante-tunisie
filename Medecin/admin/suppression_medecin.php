<?php
include ("connexion.php");
seConnecter();
$id_medecin=$_GET['id_medecin'];
$requete="delete from medecin where id_medecin='$id_medecin'";
if(mysql_query ($requete))
header("location:afficher_medecin.php");
else
echo "erreur de suppression";
?>