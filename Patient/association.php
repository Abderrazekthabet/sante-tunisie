


<?php
session_start();
if(isset($_SESSION['login_patient']) && isset($_SESSION['mdp_patient'])){
?>








<?php 
$id=$_GET['id'];
$ida=$_GET['ida'];
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$requete="SELECT * FROM `patients` WHERE id_patient='$id' ";
$resultat=mysql_query($requete);


$requete2="SELECT * FROM `associations` WHERE idAssociation='$ida' ";
$resultat2=mysql_query($requete2);
?>


<!DOCTYPE HTML>

<head>
<title>Association</title>
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
	<div class="profileassociation">
	   <h3>Profile d'une association</h3>
	</div>
	<?php while($ligne2=mysql_fetch_array($resultat2)){?>
	<div class="gh_association">
	<div class="gh_association_note">
	<form method="post" action="noter_association.php?ida=<?php echo $ligne2['idAssociation'];?>&id=<?php echo $ligne['id_patient'];?>">
	<label> <input type="radio" name="note_asso" id="note_asso" value="1"/>1</label>
    <label> <input type="radio" name="note_asso" id="note_asso" value="2"/>2</label>
	<label> <input type="radio" name="note_asso" id="note_asso" value="3"/>3</label>
	<label> <input type="radio" name="note_asso" id="note_asso" value="4"/>4</label>
	<label> <input type="radio" name="note_asso" id="note_asso" value="5" checked="checked" />5</label>
	<input id="noter_asso" type="submit" value="Noter"/>
	</form>
	</div></br>
	<p>
	      Nom: <?php echo $ligne2['nom'];?></br> Catégorie: <?php echo $ligne2['categorie'];?></br> Description: </br><?php echo $ligne2['description'];?></br> Adresse: <?php echo $ligne2['adresse'];?></br> Email:<a href="mailto:"<?php echo $ligne2['adresse_mail'];?>><?php echo $ligne2['adresse_mail'];?></a></br> Téléphone: <?php echo $ligne2['telephone'];?></br> Fax: <?php echo $ligne2['fax'];?></br> Note : <?php if($ligne2['nb_vote']==0){echo "0";} else echo $ligne2['note']/$ligne2['nb_vote'];?> /5</br>
	</p>
	</div>	
	
	
	<?php
if($_SESSION['login_patient'] != $ligne['email'])
{
$sessR=$_SESSION['login_patient'];
$requeteR="SELECT * FROM `patients` WHERE email='$sessR' ";
$resultatR=mysql_query($requeteR);
$ligneR=mysql_fetch_array($resultatR);
header("location:association.php?id=".$ligneR['id_patient']."&ida=".$ligne2['idAssociation']);
}
?>


	<?php   }  ?>
	<?php   }  ?>
</body>
</html>



<?php
}
else 
{
//
header('refresh:1; URL= ../index.php');
}
?>