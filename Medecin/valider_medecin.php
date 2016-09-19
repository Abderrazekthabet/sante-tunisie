<?php
$id_medecin=$_GET['id_medecin'];
$nomRecupere=$_POST['nom']; 
$prenomRecupere=$_POST['prenom'];
$adresseRecupere=$_POST['adresse'];
$emailRecupere=$_POST['adresse_mail'];
$telephoneRecupere=$_POST['telephone'];
$faxRecupere=$_POST['fax'];
$typeRecupere=$_POST['type'];
$specialiteRecupere=$_POST['specialite'];
$biographieRecupere=$_POST['biographie'];
$disponibiliteRecupere=$_POST['disponibilite'];

include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$requete="UPDATE `medecin` SET `nom`='$nomRecupere',`prenom`='$prenomRecupere',`adresse`='$adresseRecupere',`adresse_mail`='$emailRecupere',`telephone`=$telephoneRecupere,`fax`=$faxRecupere,`type`='$typeRecupere',`specialite`='$specialiteRecupere',`biographie`='$biographieRecupere',`disponibilite`=$disponibiliteRecupere WHERE id_medecin='$id_medecin' ";


if(mysql_query($requete))
         {
           header("location:profile.php?id_medecin=".$id_medecin);
         }else
           header("location:modifier_medecin.php?id_medecin=".$id_medecin);

?>