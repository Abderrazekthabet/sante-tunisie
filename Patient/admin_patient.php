<?php
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$requete="SELECT * FROM `patients` order by etat desc";
$resultat=mysql_query($requete);

$requete2="SELECT count(id_patient) FROM `patients` where etat=0";
$resultat2=mysql_query($requete2);
?>

<html>

<head>
    <title>Panneau d'Administration (Patient)</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="other/netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap-checkbox.css">


    <link href="css/minoral.css" rel="stylesheet">

</head>

<body style="padding-left:20%; padding-right:20%">
<br><br><br><br>




<div id="admin_patient">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function (){
 var page=1;
 var per_page=3;
 var items= $('.tab_pat #raw').length;
 var page_last=Math.ceil(items/per_page);
 
 function setPage(page){
 $('.tab_pat #raw').slice(0, page * per_page).hide();
 $('.tab_pat #raw').slice(page * per_page - per_page , page * per_page).show();
 $('.tab_pat #raw').slice(page * per_page).hide();
 }
 ///next button
  $('.next').click( function (){
  if(page < page_last){
  page++;
   setPage(page);
  }
  });
  ///prev button
  $('.prev').click( function (){
  if(page > 1){
  page--;
   setPage(page);
  }
  });
 setPage(1);
 });
</script>
<a href="logout.php" style="position:relative;left:900px;">logout</a>
<div class="tab_pat">
<?php while($ligne2=mysql_fetch_array($resultat2)){ ?>
<h2>Gestion des utilisateurs (Patients)</h2> <h2 align="right" >Nbre de patient : <span style="color:#FF7B76"><?php echo $ligne2['count(id_patient)']; ?></span></h2><?php } ?>
<table class="table table-datatable table-bordered">
<tr style="border-style:dashed"> <td><b><center>Nom</center></b></td><td><b><center>Prénom</center></b></td><td><b><center>Email</center></b></td><td><b><center>Mdp</center></b></td><td><b><center>CIN</center></b></td><td><b><center>Telephone</center></b></td><td><b><center>Sexe</center></b></td><td><b><center>Date de naissance</center></b></td><td><b><center>Adresse</center></b></td><td></td><td></td></tr>
<?php while($ligne=mysql_fetch_array($resultat))
{
	$nom = $ligne['nom'];
	$prenom = $ligne['prenom'];
	$email = $ligne['email'];
	$mdp= $ligne['mdp'];
	$cin = $ligne['cin'];
	$tel = $ligne['telephone'];
	$sexe = $ligne['sexe'];
	$date= $ligne['date_naissance'];
	$adresse = $ligne['rue']." , ".$ligne['gouvernorat'];
	$etat= $ligne['etat'];
	$id = $ligne['id_patient']; ?>
<tr id="raw" style="border-style:dashed"><td><?php echo $nom?></td><td><?php echo $prenom ?></td><td><?php echo $email?></td><td><?php echo $mdp?></td><td><?php echo $cin?></td><td><?php echo $tel?></td><td><?php echo $sexe?></td><td><?php echo $date?></td><td><?php echo $adresse?></td><td><a href="supprimer_profile(adm).php?id=<?php echo $id ?>" id="deleteRow" class="btn btn-red btn-xs delete-row">Supprimer</a></td><?php if($etat==1){?><td><a href="accepter_patient.php?id=<?php echo $id ?>" id="deleteRow" class="btn btn-red btn-xs delete-row">Accepter</a></td></tr>  <?php } ?>
<?php } ?>
</table>
</div>
<br>
<center>
	<button class="prev">Précédent</button>
	<button class="next">Suivant</button>
	</center>
  </div> 
  
  
  
  
</body>
</html>

