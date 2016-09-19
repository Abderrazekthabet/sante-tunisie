<meta charset="utf-8"  />
<?php

$mailRec = $_POST['mail'];
$titreRec = $_POST['titre'];
$sujetRec = $_POST['sujet'];
$articleRec = $_POST['article'];

include("../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$query="INSERT INTO articles (`idArticle`, `titre`, `sujet`, `auteur`, `contenu`, `etat_admin`, `date_publication`) VALUES (NULL, '$titreRec', '$sujetRec', '$mailRec', '$articleRec', 'En attente', null);";
$result=mysql_query($query);



if($result)
{
	echo "<center><b>Article crée</b></center>";
	header("Refresh:1; url=gestionArticle_Association.php");
}

else{
	echo "<center><b>Article non crée</b></center><br><br>";
	echo mysql_error();
	header("Refresh:2; url=ajouterArticle_Association.php");
}



$cnx->seDeconnecter();
?>