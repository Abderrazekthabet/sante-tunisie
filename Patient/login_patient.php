<?php 
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$login=$_POST['username'];
$mdp=$_POST['pwd'];


$requete="SELECT * FROM `patients` WHERE mdp='$mdp' and email='$login' and etat=0";
$resultat=mysql_query($requete);

if($ligne=mysql_fetch_array($resultat))
{
session_start();
$_SESSION['login_patient']=$login;
$_SESSION['mdp_patient']=$mdp;
$_SESSION['type']="patient";
$_SESSION['nom'] = $ligne['nom']." ".$ligne['prenom'];
$_SESSION['id'] = $ligne['id_patient'];
header("location:profile.php?id=".$ligne['id_patient']);
}
else
echo "<h1>"."login ou mot de passe non valide"."</h1>";
   header('refresh:2; URL= ../index.php');
?>