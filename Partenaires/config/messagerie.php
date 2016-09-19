<?php
include ("db_info.php");
include ("message.php");

$cnx = new Connexion();
$cnx->seConnecter();

$msg = new Message();


if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['message']))
{
	$msg->nom = $_POST['nom'];
	$msg->email = $_POST['email'];
	$msg->message = $_POST['message'];
	$msg->envoyer();
}

if(isset($_GET['ident']))
{
	$id = $_GET['ident'];
	$msg->lire($id);
}

if(isset($_GET['supp']))
{
    $s = $_GET['supp'];
    $msg->supprimer($s);
}




?>