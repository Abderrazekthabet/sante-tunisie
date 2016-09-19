  <meta charset="utf-8" />  
<?php

$idRec=$_GET['id'];

include("../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$query = "DELETE FROM articles WHERE idArticle = '$idRec';";

$result = mysql_query($query);


if($result)
{
	echo "<center><b>Article supprimé</b></center>";
	header("Refresh:1; url=gestionArticle_Association.php");
}

else{
	echo "<center><b>Article non supprimé</b></center><br><br>";
	echo mysql_error();
	header("Refresh:2; url=gestionArticle_Association.php");
}

$cnx->seDeconnecter();
?>