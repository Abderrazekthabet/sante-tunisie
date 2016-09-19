


<?php
session_start();
if(isset($_SESSION['login_patient']) && isset($_SESSION['mdp_patient'])){
?>





<?php 
$id=$_GET['id'];
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$requete="SELECT * FROM `patients` WHERE id_patient='$id' ";
$resultat=mysql_query($requete);
?>


<!DOCTYPE HTML>

<head>
<title>Paramètres de compte</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="./css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/login.js"></script>
<script type="text/javascript" src="./js/Chart.js"></script>
 <script type="text/javascript" src="./js/jquery.easing.js"></script>
 <script type="text/javascript" src="./js/jquery.ulslide.js"></script>
 <script type="text/javascript" src="./js/parametres_controle.js"></script>
 <link rel="shortcut icon" href="./images/icon.png">
  <link rel="stylesheet" href="./css/clndr.css" type="text/css" />
  <script src="./js/underscore-min.js"></script>
  <script src= "./js/moment-2.2.1.js"></script>
  <script src="./js/clndr.js"></script>
  <script src="./js/site.js"></script>
  <!----End Calender -------->
</head>
<?php while($ligne=mysql_fetch_array($resultat)){?>


<?php
if($_SESSION['login_patient'] != $ligne['email'])
{
$sessR=$_SESSION['login_patient'];
$requeteR="SELECT * FROM `patients` WHERE email='$sessR' ";
$resultatR=mysql_query($requeteR);
$ligneR=mysql_fetch_array($resultatR);
header("location:parametres.php?id=".$ligneR['id_patient']);
}
?>




<body>			       
	    <div class="wrap">	 
	      <div class="header">
	      	  <div class="header_top">
					  <div class="menu">
						  <a class="toggleMenu" href="#"><img src="./web/images/nav.png" alt="" /></a>
							<ul class="nav">
                            	<li><a href="../Portail_pharmacie/index.php"  target="_blank" ><i><img src="./images/invites.png" alt="" /></i>Pharmacie</a></li>
								<li><a href="parametres.php?id=<?php echo $ligne['id_patient'];?>"><i><img src="./images/settings.png" alt="" /></i>Paramètres</a></li>
								<li><a href="profile.php?id=<?php echo $ligne['id_patient'];?>"><i><img src="./images/user.png" alt="" /></i>Compte</a></li>
								<li><a href="rdv.php?id=<?php echo $ligne['id_patient'];?>"><i><img src="./images/mail.png" alt="" /></i>Mes RDV</a></li>
								<!-- -->
							<div class="clear"></div>
						    </ul>
							<script type="text/javascript" src="./js/responsive-nav.js"></script>
				        </div>	
					  <div class="profile_details">
				    		   <div id="loginContainer">
				                  <a id="loginButton" class=""><span>Moi</span></a>   
				                    <div id="loginBox">                
				                      <form id="loginForm">
				                        <fieldset id="body">
				                            <div class="user-info">
							        			<h4>Bonjour,<a href="#"><?php echo $ligne['nom']." ".$ligne['prenom'];?></a></h4>
							        			<ul>
							        				<li class="profile"><a href="profile2.php?id=<?php echo $ligne['id_patient'];?>">Profil </a></li>
							        				<li class="logout"><a href="logout.php"> Se deconnecter</a></li>
							        				<div class="clear"></div>		
							        			</ul>
							        		</div>			                            
				                        </fieldset>
				                    </form>
				                </div>
				            </div>
				             <div class="profile_img">	
				             	<a href="#"><img src="./images/petit.jpg" alt="" />	</a>
				             </div>		
				             <div class="clear"></div>		  	
					    </div>	
		 		      <div class="clear"></div>				 
				   </div>
			</div>	  					     
	</div>
	</br></br></br>
	<div class="parametre_compte">
	<h3>Parametres de compte</h3>
	</div></br></br></br>
	<div class="gh_compte_supprimer">
	<a href="supprimer_profile.php?id=<?php echo $ligne['id_patient'];?>">Supprimer votre compte</a>
	</div>
	</br></br></br>
	 <center>
	 <div class="gh_compte_modifier">
    
   <form method="post" action="modifier_profile.php?id=<?php echo $ligne['id_patient'];?>" name="parametres_patient">
            <label>Nom : <input type="text" name="nom" id="nom" value="<?php echo $ligne['nom'];?>" placeholder="Nom de famille" required/></label></br>
			<label>Prenom : <input type="text" name="prenom" id="prenom" value="<?php echo $ligne['prenom'];?>" placeholder="Prénom" required/></label></br>
			<label>Email : <input type="text" name="email" id="email" value="<?php echo $ligne['email'];?>" placeholder="Votre email" required/></label></br>
			<label>Mot de passe : <input type="text" name="password" id="password" value="<?php echo $ligne['mdp'];?>" placeholder="Votre mot de passe" required/></label></br>
			<label>CIN : <input type="text" name="cin" id="cin" value="<?php echo $ligne['cin'];?>" placeholder="Votre CIN"/ required></label></br>
			<label>Telephone : <input type="text" name="tel" id="tel" value="<?php echo $ligne['telephone'];?>" placeholder="Votre téléphone"required/></label></br>
			<center>
			<label> <input type="radio" name="sexe" id="sexe" value="Femme" <?php if($ligne['sexe']=="Femme")echo 'checked="checked"';?>/>Femme</label>
            <label> <input type="radio" name="sexe" id="sexe" value="Homme" <?php if($ligne['sexe']=="Homme")echo 'checked="checked"';?>/>Homme</label></br></br>
			</center>
			<label>Date de naissance</br>
			<input type="text" name="date" id="date" value="<?php echo $ligne['date_naissance'];?>" placeholder="Votre date de naissance" required/></label>
			</br>
			<label>Adresse</br>
			<input type="text" name="rue" id="rue" value="<?php echo $ligne['rue'];?>" placeholder="Rue" required/></label>
			<select name="ville" id="ville" ><option value="0" selected="1">Gouvernorat</option><option value="Ariana" <?php if($ligne['gouvernorat']=="Ariana")echo "selected";?>>Ariana</option><option value="Béja" <?php if($ligne['gouvernorat']=="Béja")echo "selected";?>>Béja</option><option value="Ben Arous"<?php if($ligne['gouvernorat']=="Ben Arous")echo "selected";?>>Ben Arous</option><option value="Bizerte"<?php if($ligne['gouvernorat']=="Bizerte")echo "selected";?>>Bizerte</option><option value="Gabès"<?php if($ligne['gouvernorat']=="Gabès")echo "selected";?>>Gabès</option><option value="Gafsa"<?php if($ligne['gouvernorat']=="Gafsa")echo "selected";?>>Gafsa</option><option value="Jendouba"<?php if($ligne['gouvernorat']=="Jendouba")echo "selected";?>>Jendouba</option><option value="Kairouan"<?php if($ligne['gouvernorat']=="Kairouan")echo "selected";?>>Kairouan</option><option value="Kasserine"<?php if($ligne['gouvernorat']=="Kasserine")echo "selected";?>>Kasserine</option><option value="Kébili"<?php if($ligne['gouvernorat']=="kébili")echo "selected";?>>Kébili</option><option value="Kef"<?php if($ligne['gouvernorat']=="Kef")echo "selected";?>>Kef</option><option value="Mahdia"<?php if($ligne['gouvernorat']=="Mahdia")echo "selected";?>>Mahdia</option><option value="Manouba"<?php if($ligne['gouvernorat']=="Manouba")echo "selected";?>>Manouba</option><option value="Médenine"<?php if($ligne['gouvernorat']=="Médenine")echo "selected";?>>Médenine</option><option value="Monastir"<?php if($ligne['gouvernorat']=="Monastir")echo "selected";?>>Monastir</option><option value="Nabeul"<?php if($ligne['gouvernorat']=="Nabeul")echo "selected";?>>Nabeul</option><option value="Sfax"<?php if($ligne['gouvernorat']=="Sfax")echo "selected";?>>Sfax</option><option value="Sidi Bouzid"<?php if($ligne['gouvernorat']=="Sidi Bouzid")echo "selected";?>>Sidi Bouzid</option><option value="Siliana"<?php if($ligne['gouvernorat']=="Siliana")echo "selected";?>>Siliana</option><option value="Sousse"<?php if($ligne['gouvernorat']=="Sousse")echo "selected";?>>Sousse</option><option value="Tataouine"<?php if($ligne['gouvernorat']=="Tataouine")echo "selected";?>>Tataouine</option><option value="Tozeur"<?php if($ligne['gouvernorat']=="Tozeur")echo "selected";?>>Tozeur</option><option value="Tunis"<?php if($ligne['gouvernorat']=="Tunis")echo "selected";?>>Tunis</option><option value="Zaghouan"<?php if($ligne['gouvernorat']=="Zaghouan")echo "selected";?>>Zaghouan</option></select></br>
			<center>
			<input id="modifier" type="submit" value="Modifier" /></br></center>
   </form>

</div>
	    </center>		 
    
</body>
</html>
<?php   }  ?>




<?php
}
else 
{
//
header('refresh:1; URL= ../index.php');
}
?>