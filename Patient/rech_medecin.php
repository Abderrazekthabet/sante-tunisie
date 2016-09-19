

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

$requete2="SELECT distinct specialite FROM `medecin`";
$resultat2=mysql_query($requete2);
?>


<!DOCTYPE HTML>

<head>
<title>Rechercher un medecin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="./css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/login.js"></script>
<script type="text/javascript" src="./js/rechercher.js"></script>
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
  
  
  <script>
function showHint(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","live_search(med-nom).php?q="+str,true);
xmlhttp.send();
}


function showHint_prenom(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("txtHintpre").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHintpre").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","live_search(med-pre).php?q="+str,true);
xmlhttp.send();
}
</script>
  
</head>
<?php while($ligne=mysql_fetch_array($resultat)){?>

<?php
if($_SESSION['login_patient'] != $ligne['email'])
{
$sessR=$_SESSION['login_patient'];
$requeteR="SELECT * FROM `patients` WHERE email='$sessR' ";
$resultatR=mysql_query($requeteR);
$ligneR=mysql_fetch_array($resultatR);
header("location:rech_medecin.php?id=".$ligneR['id_patient']);
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
	<div class="recherchemedecin">
	   <h3>Rechercher un medecin</h3>
	</div>
	</br></br></br>
	<div class="gh_recherche_medecin">
	<center>
	     <form method="post" action="recherche_medecin.php?id=<?php echo $ligne['id_patient'];?>" name="recherche_medecin">
		 <label>Rechercher par : </label> <label> <input type="radio" name="type_medecin" id="type_medecin" value="np"/>Nom et prenom</label>
		    <label> <input type="radio" name="type_medecin" id="type_medecin" value="s"/>Spécialité</label>
            <label> <input type="radio" name="type_medecin" id="type_medecin" value="nps"  />Nom et prenom et spécialité</label> <label> <input type="radio" name="type_medecin" id="type_medecin" value="tous" checked="checked" />Tous les medecins</label></br></br>
			<label>Nom : <input type="text" name="nom_medecin" id="nom_medecin" placeholder="Nom de medecin" onkeyup="showHint(this.value)" /></label><ul id="txtHint"></ul></br></br>
			<label>Prenom : <input type="text" name="prenom_medecin" id="prenom_medecin" placeholder="Prenom de medecin" onkeyup="showHint_prenom(this.value)" /></label><ul id="txtHintpre"></ul></br></br>
			<label>Spécialité : </label><select name="sp_med" id="sp_med" ><option value="0" selected="1">Spécialité</option> <?php while($ligne2=mysql_fetch_array($resultat2)){?> <option value="<?php echo $ligne2['specialite'];?>"><?php echo $ligne2['specialite'];?></option> <?php   }  ?></select></br></br>
			<label>Ordre par note (décroissante): </label> <label> <input type="radio" name="ordre_medecin" id="ordre_medecin" value="o" checked="checked"/>Oui</label>
		    <label> <input type="radio" name="ordre_medecin" id="ordre_medecin" value="n"/>Non</label></br></br>
			<input id="rech_medecin" type="submit"  value="Rechercher"/></br></br>
			</center>
		 </form>
	</div>
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