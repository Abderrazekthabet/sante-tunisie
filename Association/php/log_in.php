<meta charset="utf-8"/>
<?php
include("../../config/db_info.php");
$mailRec = $_POST['mail'];
$mdpRec = $_POST['mdp'];

if (($mailRec != "") && ($mdpRec != "")){
	
	$cnx = new Connexion();
	$cnx->seConnecter();
	$query = "select * from associations where adresse_mail = '$mailRec' and mdp = '$mdpRec' and etat_compte = 'Validé';";
	$result = mysql_query($query);
	
	if( mysql_num_rows($result) != 0){
		$ligne = mysql_fetch_array($result);
		session_start();
        $_SESSION['idAssociation'] = $ligne['idAssociation'];
		$_SESSION['mail'] = $mailRec;
        $_SESSION['mdp'] = $mdpRec;
		$_SESSION['nom'] = $ligne['nom'];
        $_SESSION['type'] = "association";
		$_SESSION['chemin_image'] = $ligne['chemin_image'];
		header('location:../../index.php');
	}
	else {
		echo '<body onLoad="alert (\'Membre non reconnu...\')">';
		header('refresh:1; URL=../../index.php');
		//echo '<body onLoad="alert (\'Veuillez saisir votre adresse mail et votre mot de passe...\')">';
		//header('refresh:1; URL=../index.html');
		}
	}
else{
	echo '<body onLoad="alert (\'Veuillez saisir votre adresse mail et votre mot de passe...\')">';
	//echo "Veuillez saisir votre login et votre mot de passe";
	header('refresh:1; URL=../../index.php');	
}




?>