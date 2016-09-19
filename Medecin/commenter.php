<?php
$id_rdv=$_GET['id_rdv'];
$id_medecin=$_GET['id_medecin'];
$comRecupere=$_POST['com'];
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$requete="UPDATE `rdv` SET `commentaire`='$comRecupere'  WHERE id_rdv='$id_rdv' ";


if(mysql_query($requete))
         {
           header("location:consulter_rdv.php?id_medecin=".$id_medecin);
         }else
           echo "erreur";
?>