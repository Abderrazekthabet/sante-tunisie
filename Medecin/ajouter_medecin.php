<?php
$nomRecupere=$_POST['nom']; 
$prenomRecupere=$_POST['prenom'];
$adresseRecupere=$_POST['adresse'];
$gouvernoratRecupere=$_POST['gouvernorat'];
$mdpRecupere=$_POST['mdp'];
$emailRecupere=$_POST['adresse_mail'];
$telephoneRecupere=$_POST['telephone'];
$faxRecupere=$_POST['fax'];
$typeRecupere=$_POST['type'];
$specialiteRecupere=$_POST['specialite'];
$biographieRecupere=$_POST['biographie'];


include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$requet="INSERT INTO `medecin` (`id_medecin`, `nom`, `prenom`, `adresse`
, `adresse_mail`, `mdp`, `telephone`, `fax`, `type`, `specialite`, `biographie`, `gouvernorat`) 
VALUES (NULL, '$nomRecupere', '$prenomRecupere', '$adresseRecupere', '$emailRecupere', '$mdpRecupere', '$telephoneRecupere'
, '$faxRecupere', '$typeRecupere', '$specialiteRecupere', '$biographieRecupere', '$gouvernoratRecupere')";
if(mysql_query($requet))
         {
		    echo "<h1>"."Merci pour votre inscription"."</h1>"."</br><h1>Attendre que l'adminisrateur valide votre inscription</h1>";
           header('refresh:2; URL= ../index.php');
         }else
          echo "erreur d'ajout";
$cnx->seDeconnecter();
?>