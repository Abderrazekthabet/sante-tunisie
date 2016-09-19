<?php 
$id=$_GET['id'];
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$requete="update patients set etat=0 where id_patient='$id'";
if(mysql_query($requete))
         {
           $requete2="select * from  patients  where id_patient='$id'";
		   $resultat2=mysql_query($requete2);
		   header("location:admin_patient.php");
         }else
          echo "erreur";
		  
		  
?>