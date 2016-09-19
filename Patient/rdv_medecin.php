<?php
$ida=$_GET['ida'];
$id=$_GET['id'];
$note=$_POST['note_med'];
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$jr=$_POST['rdv_day'];
$mo=$_POST['rdv_month'];
$an=$_POST['rdv_year'];
$date=$an."-".$mo."-".$jr;
$hr=$_POST['hr_rdv'];
$requete="INSERT INTO `rdv`(`id_rdv`, `date`, `heure`, `id_personne`, `id_medecin`) VALUES (NULL,'$date','$hr','$id','$ida') ";
          if(mysql_query($requete))
         {
           header("location:rdv.php?id=".$id);
         }else
          echo "erreur ";
?>