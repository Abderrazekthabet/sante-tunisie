<?php
$nomRecupere=$_POST['nom']; 
$prenomRecupere=$_POST['prenom'];
$maladieRecupere=$_POST['maladie'];
$medicamentRecupere=$_POST['medicament'];
$doseRecupere=$_POST['dose'];

include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$id_medecin=$_GET['id_medecin'];
$requet="INSERT INTO `consultation` (`id_patient`, `nom`, `prenom`, `maladie`, `medicament`, `dose`) VALUES (NULL, '$nomRecupere', '$prenomRecupere', '$maladieRecupere', '$medicamentRecupere', '$doseRecupere')";
if(mysql_query($requet))
         {
          header("location:profile.php?id_medecin=".$id_medecin);
         }else
           header("location:ajouter_patient1.php?id_medecin=".$id_medecin);
?>