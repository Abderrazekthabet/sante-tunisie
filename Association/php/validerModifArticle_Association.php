<meta charset="utf-8" />
<?php 

$idRec = $_POST['id'];
$titreRec = $_POST['titre'];
$sujetRec = $_POST['sujet'];
$articleRec = $_POST['article'];


include("../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$query = "update articles set titre = '$titreRec', sujet = '$sujetRec', contenu = '$articleRec', etat_admin = 'En attente', updated_on =null where idArticle = $idRec";
$result = mysql_query($query);

if($result)
{
	echo "<center><b>Article modifié</b></center>";
	header("Refresh:1; url=gestionArticle_Association.php");
}
else{
	echo "<center><b>Article non modifié</b></center><br><br>";
	echo mysql_error();
	header("Refresh:2; url=modifierArticle_Association.php");
}


$cnx->seDeconnecter();
?>