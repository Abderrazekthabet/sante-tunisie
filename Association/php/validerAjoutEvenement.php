<meta charset="utf-8"  />
<?php
session_start();

include("../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$mailRec = $_SESSION['mail'];
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




$query="insert into evenements (`idEvenement`, `nom`, `theme`, `type`, `public`, `lieu`, `date`, `description`, `hote`, `created_on`, `etat_admin`) values (NULL, '$nomRec', '$themeRec', '$typeRec', '$strpublic', '$lieuRec', DATE('$anneeRec-$moisRec-$jourRec'), '$descRec', '$mailRec', null, 'En attente');";
$result=mysql_query($query);

if($result)
{
	echo "<b>Evénement crée</b>";
	header("Refresh:1; url=gestionEvenement.php");
}
else{
	echo "<b>Evénement non crée</b><br><br>";
	echo mysql_error();
	header("Refresh:2; url=gestionEvenement.php");
}


$cnx->seDeconnecter();
?>