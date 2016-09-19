<meta charset="utf-8" />
<?php 
include("../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$idRec = $_POST['id'];
$nomRec = $_POST['nom'];
$themeRec = $_POST['theme'];
$typeRec = $_POST['type'];
$lieuRec = $_POST['lieu'];
$dateRec = $_POST['date'];
$descRec = $_POST['description'];

/********* Public visé**********/
$strpublic = "";
if (isset ($_POST['tous'])){
	$strpublic = "Etudiants: Tout le monde  Chercheurs Entreprises Professionnels Médias";
}
/*if (isset ($_POST['etudiant'])){
	$typeEtudiant = $_POST['etudiantSel'];
	$strpublic = "Etudiants: '$typeEtudiant'  " + $strpublic;	
}*/

if (isset ($_POST['etudiant'])) $strpublic = "Etudiants " + $strpublic;
if (isset ($_POST['chercheur'])) $strpublic = $strpublic + "Chercheurs ";
if (isset ($_POST['entreprise'])) $strpublic = $strpublic + "Entreprises ";
if (isset ($_POST['professionnel'])) $strpublic = $strpublic + " Professionnels ";
if (isset ($_POST['medias'])) $strpublic = $strpublic + "Médias ";


$anneeRec=substr($dateRec,0,4);
$moisRec=substr($dateRec,5,2);
$jourRec=substr($dateRec,8,2);


include("connexion.php");
seConnecter();

$query = "update evenements set `nom` = '$nomRec', `theme` = '$themeRec', `type` = '$typeRec', `public` = '$strpublic', `lieu` = '$lieuRec', `date` = DATE('$anneeRec-$moisRec-$jourRec'), `description` = '$descRec', `updated_on` =null where `idEvenement` = $idRec";
$result = mysql_query($query);

if($result)
{
	echo "<b>Evénement modifié</b>";
	header("Refresh:1; url=gestionEvenement.php");
}
else{
	echo "<b>Evénement non modifié</b><br><br>";
	echo mysql_error();
	header("Refresh:2; url=gestionEvenement.php");
}



$cnx->seDeconnecter();  ?>