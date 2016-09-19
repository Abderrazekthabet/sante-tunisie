

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


$requete2="SELECT * FROM `medecin` WHERE id_medecin='$ida' ";
$resultat2=mysql_query($requete2);
?>


<!DOCTYPE HTML>

<head>
<title>Medecin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="./css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/ListeEtoile.js"></script>
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
	<div class="profilemedecin">
	   <h3>Profile d'un medecin</h3>
	</div>
	<?php while($ligne2=mysql_fetch_array($resultat2)){?>
	<div class="gh_medecin">
	<div class="gh_medecin_note">
	<form method="post" action="noter_medecin.php?ida=<?php echo $ligne2['id_medecin'];?>&id=<?php echo $ligne['id_patient'];?>">
	<label> <input type="radio" name="note_med" id="note_med" value="1"/>1</label>
    <label> <input type="radio" name="note_med" id="note_med" value="2"/>2</label>
	<label> <input type="radio" name="note_med" id="note_med" value="3"/>3</label>
	<label> <input type="radio" name="note_med" id="note_med" value="4"/>4</label>
	<label> <input type="radio" name="note_med" id="note_med" value="5" checked="checked" />5</label>
	<input id="noter_med" type="submit" value="Noter"/>
	</form>
	</div>
	</br>
	<p>
	<span>Nom:</span><?php echo $ligne2['nom'];?></br> Prenom: <?php echo $ligne2['prenom'];?></br> Adresse: <?php echo $ligne2['adresse'];?> </br> Email::<a href="mailto:"<?php echo $ligne2['adresse_mail'];?>><?php echo $ligne2['adresse_mail'];?></a></br> telephone: <?php echo $ligne2['telephone'];?></br> Fax: <?php echo $ligne2['fax'];?></br> Spécialité : <?php echo $ligne2['specialite'];?></br>Biographie:</br><?php echo $ligne2['biographie'];?></br></br>Note: <?php echo $ligne2['note']/$ligne2['nb_vote'];?> /5</br>
	</p>
	</br>
	<center>
	<div class="gh_medecin_rdv">
	<form method="post" action="rdv_medecin.php?ida=<?php echo $ligne2['id_medecin'];?>&id=<?php echo $ligne['id_patient'];?>">
	<label>Date : </label> <select name="rdv_day" id="rdv_day" ><option value="0" selected="1">Jour</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select> 
            <select name="rdv_month" id="rdv_month"><option value="0" selected="1">Mois</option><option value="01">Jan</option><option value="02">Fév</option><option value="03">Mar</option><option value="04">Avr</option><option value="05">Mai</option><option value="06">Jun</option><option value="07">Juil</option><option value="08">Aoû</option><option value="09">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Déc</option></select>
            <select name="rdv_year" id="rdv_year" ><option value="0" selected="1">Année</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option></select></br>
			<label> Heure : <input type="text" name="hr_rdv" id="hr_rdv" placeholder="Heure" required/></br>
	<input id="rdv_med" type="submit" value="Prendre RDV"/>
	</form>
	</div>
	</center>
	</div>	
	
	
	<?php
if($_SESSION['login_patient'] != $ligne['email'])
{
$sessR=$_SESSION['login_patient'];
$requeteR="SELECT * FROM `patients` WHERE email='$sessR' ";
$resultatR=mysql_query($requeteR);
$ligneR=mysql_fetch_array($resultatR);
header("location:medecin.php?id=".$ligneR['id_patient']."&ida=".$ligne2['id_medecin']);
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