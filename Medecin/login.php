<meta charset="utf-8"/>
<?php
include("../config/db_info.php");
$mailRec = $_POST['username'];
$mdpRec = $_POST['pwd'];

if (($mailRec != "") && ($mdpRec != "")){
	
	$cnx = new Connexion();
	$cnx->seConnecter();
	$query = "select * from medecin where adresse_mail = '$mailRec' and mdp = '$mdpRec';";
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) != 0){
		$ligne = mysql_fetch_array($result);
		session_start();
		$_SESSION['adresse_medecin'] = $mailRec;
        $_SESSION['mdp_medecin'] = $mdpRec;
        $_SESSION['type'] = "medecin";
        $_SESSION['nom'] = $ligne['nom']." ".$ligne['prenom'];
        $_SESSION['id'] = $ligne['id_medecin'];
		header("location:profile.php?id_medecin=".$ligne['id_medecin']);
	}
	else {
		echo '<body onLoad="alert (\'Membre non reconnu...\')">';
		header('refresh:1; URL=../index.php');
		//echo '<body onLoad="alert (\'Veuillez saisir votre adresse mail et votre mot de passe...\')">';
		//header('refresh:1; URL=../index.html');
		}
	}
else{
	echo '<body onLoad="alert (\'Veuillez saisir votre adresse mail et votre mot de passe...\')">';
	//echo "Veuillez saisir votre login et votre mot de passe";
	header('refresh:1; URL=../index.php');	
}




?>