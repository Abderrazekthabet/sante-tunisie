<?php
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$id_patient=$_GET['id_patient'];
$id_medecin=$_GET['id_medecin'];
$requete="delete from consultation where id_patient='$id_patient'";
if(mysql_query($requete))
         {
          header("location:consulter_historique.php?id_medecin=".$id_medecin);
         }else
           header("location:consulter_historiquet.php?id_medecin=".$id_medecin);
?>