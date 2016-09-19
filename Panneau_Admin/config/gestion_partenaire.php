<?php
include ("classPartenaire.php");
include ("../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

if(isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['adresse']))
{
    $part = new Partenaire();
    
    $part->nom=$_POST['nom'];
    $part->adresse=$_POST['adresse'];
    $part->description=$_POST['description'];

    $uploadDir = "../../Partenaires/images/";
	$uploadfile = $uploadDir.$_FILES['image_profil']['name'];
	move_uploaded_file($_FILES['image_profil']['tmp_name'], $uploadfile);
    $part->photo_profil = $_FILES['image_profil']['name'];
    
    if ($part->Ajouter())
    {
        $part->creerPage();
    }
    else
        echo "Erreur";
}

if (isset($_GET['supp']))
{
	$part= new Partenaire();
	$nom = $_GET['supp'];
	$part->supprimer($nom);
}

?>
