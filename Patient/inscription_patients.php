<?php 
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$password=$_POST['password'];
$cin=$_POST['cin'];
$telephone=$_POST['tel'];
$sexe=$_POST['sexe'];
$jr=$_POST['day'];
$mo=$_POST['month'];
$an=$_POST['year'];
$date_naissance=$an."-".$mo."-".$jr;
$rue=$_POST['rue'];
$ville=$_POST['ville'];



include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();


$requete="INSERT INTO `patients`(`id_patient`, `nom`, `prenom`, `email`, `mdp`, `cin`, `telephone`, `sexe`, `date_naissance`, `rue`, `gouvernorat`, `bonus`, `etat`,`guide_test`) 
VALUES (NULL,'$nom','$prenom','$email','$password','$cin','$telephone','$sexe','$date_naissance','$rue','$ville',0,1,0)";
          if(mysql_query($requete))
         {
		    echo "<h1>"."Merci pour votre inscription"."</h1>"."</br><h1>Attendre que l'adminisrateur valide votre inscription</h1>";
           header('refresh:2; URL= ../index.php');
         }else
          echo "erreur d'ajout";
         

?>