<?php
include ("../../config/db_info.php");
include("visite.php");
$cnx = new Connexion();
$cnx->seConnecter();
$visite= new Visite();
$vis =  $_POST['query'];
$visite->setVisitePharmacie();

?>
