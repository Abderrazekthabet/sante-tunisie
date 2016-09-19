<?php
$ida=$_GET['ida'];
$id=$_GET['id'];
$note=$_POST['note_asso'];
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$requete="UPDATE `associations` SET `note` = `note`+'$note' , `nb_vote` = `nb_vote`+1 WHERE `idAssociation`='$ida' ";
          if(mysql_query($requete))
         {
           header("location:association.php?id=".$id."&ida=".$ida);
         }else
          echo "erreur ";
?>