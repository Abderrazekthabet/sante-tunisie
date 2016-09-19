<?php
$id=$_GET['id'];
$ida=$_GET['ida'];
$date=$_POST['date_agenda'];
$desc=$_POST['agenda_com'];
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$requete="UPDATE `agenda_patient` SET `date` = '$date',`description`='$desc' WHERE `id_agenda`='$ida'";
          if(mysql_query($requete))
         {
           header("location:agenda.php?id=".$id);
         }else
          echo "erreur de modification";
?>