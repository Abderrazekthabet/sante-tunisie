<meta charset="utf-8" />
<?php


include("../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$mdpRec=$_POST['mdp'];
$mailRec=$_POST['mail'];
$nomRec=$_POST['nom'];
$matrRec=$_POST['matr'];
$posteRec=$_POST['poste'];
$categorieRec=$_POST['categorie'];
$dateRec=$_POST['date_creation'];
$adresseRec=$_POST['adresse'];
$telRec=$_POST['tel'];
$faxRec=$_POST['fax'];
$descRec=$_POST['description'];
/*
$anneeRec=$_POST['annee'];
$moisRec=$_POST['mois'];
$jourRec=$_POST['jour'];
*/
$anneeRec=substr($dateRec,6,4);
$moisRec=substr($dateRec,3,2);
$jourRec=substr($dateRec,0,2);



/*********/
$uploadDir = "../images/";
$uploadfile = $uploadDir.$_FILES['image_profil']['name'];
move_uploaded_file($_FILES['image_profil']['tmp_name'], $uploadfile);
$chemin_image = $_FILES['image_profil']['name'];
/*****************/
$queryInf="INSERT INTO associations(`idAssociation`, `matricule`, `nom`, `mdp`, `date_creation`, `adresse`, `adresse_mail`, `telephone`, `fax`, `categorie`, `poste`, `description`,`created_on`, `etat_compte`,guide_test, chemin_image) VALUES (NULL, '$matrRec', '$nomRec', '$mdpRec', DATE ('$anneeRec-$moisRec-$jourRec'), '$adresseRec', '$mailRec', '$telRec', '$faxRec', '$categorieRec', '$posteRec', '$descRec',null, 'En attente', 0, '$chemin_image');";

$resultInf=mysql_query($queryInf);
if($resultInf)
{
echo "Votre compte a été crée";
header("Refresh:1; url=../../index.php");
}
else	
{
	echo mysql_error();
	header("Refresh:2; url=../../index.php");
}
$cnx->seDeconnecter();
?>