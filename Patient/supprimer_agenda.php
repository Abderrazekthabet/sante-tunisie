<?php 
$id=$_GET['id'];
$ida=$_GET['ida'];
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$requete="delete from agenda_patient where id_agenda='$ida'";
          if(mysql_query($requete))
         {
           header("location:agenda.php?id=".$id);
         }else
          echo "erreur de suppression";
?>