<?php 
$id=$_GET['id'];
$jr=$_POST['agenda_day'];
$mo=$_POST['agenda_month'];
$an=$_POST['agenda_year'];
$date=$an."-".$mo."-".$jr;
$com=$_POST['agenda_com'];
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();


$requete="INSERT INTO `agenda_patient`(`id_agenda`, `id_patient`, `date`, `description`) VALUES (NULL,'$id','$date','$com')";
          if(mysql_query($requete))
         {
           header("location:agenda.php?id=".$id);
         }else
          echo "erreur d'ajout";
         

?>