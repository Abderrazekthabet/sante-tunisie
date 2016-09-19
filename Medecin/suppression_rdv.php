<?php
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$id_rdv=$_GET['id_rdv'];
$id_medecin=$_GET['id_medecin'];
$requete="delete from `rdv` where id_rdv='$id_rdv'";
if(mysql_query($requete))
         {
          header("location:consulter_rdv.php?id_medecin=".$id_medecin);
         }else
           header("location:consulter_rdv.php?id_medecin=".$id_medecin);
?>