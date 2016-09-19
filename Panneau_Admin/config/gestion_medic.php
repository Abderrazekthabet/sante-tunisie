<?php
include ("../../config/db_info.php");
include ("medicament.php");

$cnx = new Connexion();
$cnx->seConnecter();

if (isset($_GET['supp']))
{
	$medic= new Medicament();
	$id = $_GET['supp'];
	$medic->supprimer($id);
}

if(isset($_POST['nom']) && isset($_POST['categorie']) && isset($_POST['description']) && isset($_POST['ajout']))
{
	$medic = new Medicament();
	
	$uploadDir = "../images/medics/";
	$uploadfile = $uploadDir.$_FILES['image_medic']['name'];
	move_uploaded_file($_FILES['image_medic']['tmp_name'], $uploadfile);
	$medic->nom = $_POST['nom'];
	$medic->categorie = $_POST['categorie'];
	$medic->description = $_POST['description'];
	$medic->chemin_image = $_FILES['image_medic']['name'];
	
	$medic->ajouter();
}

if(isset($_POST['nom']) && isset($_POST['categorie']) && isset($_POST['description']) && isset($_POST['modif']))
{
    $id = $_POST['modif'];
    $medic = new Medicament();
    $medic->nom = $_POST['nom'];
	$medic->categorie = $_POST['categorie'];
	$medic->description = $_POST['description'];

    $medic->modifier($id);
}
?>