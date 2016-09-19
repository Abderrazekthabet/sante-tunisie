<?php
$ida=$_GET['ida'];
$id=$_GET['id'];
$note=$_POST['note_med'];
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$requete="UPDATE `medecin` SET `note` = `note`+'$note' , `nb_vote` = `nb_vote`+1 WHERE `id_medecin`='$ida' ";
          if(mysql_query($requete))
         {
           header("location:medecin.php?id=".$id."&ida=".$ida);
         }else
          echo "erreur ";
?>