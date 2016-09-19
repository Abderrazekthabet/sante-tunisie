<?php 
$id=$_GET['id'];
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$requete="delete from patients where id_patient='$id'";
          if(mysql_query($requete))
         {
           header("location:logout.php");
         }else
          echo "erreur de suppression";
?>