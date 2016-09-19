<?php 
$id=$_GET['id'];
include("../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$requete="update patients set etat=0 where id_patient='$id'";
if(mysql_query($requete))
         {
		   header("location:../Patient.php");
         }else
          echo "erreur";
		  
		  
?>