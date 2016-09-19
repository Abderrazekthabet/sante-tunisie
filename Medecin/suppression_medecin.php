<?php
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$id_medecin=$_GET['id_medecin'];
$requete="delete from medecin where id_medecin='$id_medecin'";
if(mysql_query($requete))
         {
          header("location:afficher_medecin.php?id_medecin=".$id_medecin);
         }else
           header("location:afficher_medecin.php?id_medecin=".$id_medecin);
?>