  <meta charset="utf-8" />  
<?php

$idRec=$_GET['id'];

include("../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$query = "DELETE FROM evenements WHERE `idEvenement` = '$idRec';";

$result = mysql_query($query);


if($result)
{
	echo "<b>Evénement supprimé</b>";
	header("Refresh:1; url=gestionEvenement.php");
}
else{
	echo "<b>Evénement non supprimé</b><br><br>";
	echo mysql_error();
	header("Refresh:2; url=gestionEvenement.php");
}

$cnx->seDeconnecter();

?>