<?php
$id=$_GET['id'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$mdp=$_POST['password'];
$cin=$_POST['cin'];
$tel=$_POST['tel'];
$sexe=$_POST['sexe'];
$date=$_POST['date'];
$rue=$_POST['rue'];
$ville=$_POST['ville'];

include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$requete="UPDATE `patients` SET `nom` = '$nom',`prenom` = '$prenom',`email` = '$email' ,`mdp` = '$mdp' ,`cin` = '$cin',`telephone` = '$tel',`sexe` = '$sexe',`date_naissance` = '$date', `gouvernorat`='$ville',`rue`='$rue' WHERE `id_patient`='$id' ";
          if(mysql_query($requete))
         {
           header("location:parametres.php?id=".$id);
         }else
          echo "erreur de modification";
?>