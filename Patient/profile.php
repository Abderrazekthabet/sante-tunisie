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
<?php while($ligne=mysql_fetch_array($resultat)){?>


<?php
if($_SESSION['login_patient'] != $ligne['email'])
{
$sessR=$_SESSION['login_patient'];
$requeteR="SELECT * FROM `patients` WHERE email='$sessR' ";
$resultatR=mysql_query($requeteR);
$ligneR=mysql_fetch_array($resultatR);
header("location:profile.php?id=".$ligneR['id_patient']);
}
?>



<head>
<title><?php echo $ligne['nom']." ".$ligne['prenom'];?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="profile patient"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="./css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/login.js"></script>
<script type="text/javascript" src="./js/Chart.js"></script>
<script type="text/javascript" src="./js/jquery.easing.js"></script>
<script type="text/javascript" src="./js/jquery.ulslide.js"></script>
<link href="./css/introjs.css" rel="stylesheet"/>
<script src="./js/intro.js"></script>
<link rel="shortcut icon" href="./images/icon.png">
<link rel="stylesheet" href="./css/clndr.css" type="text/css" />
<script src="./js/underscore-min.js"></script>
<script src= "./js/moment-2.2.1.js"></script>
<script src="./js/clndr.js"></script>
<script src="./js/site.js"></script>
  <!----End Calender -------->
  

<script>
 function clique()
            {
			  scriptData = <?php echo json_encode($ligne['guide_test']); ?>;
			  if(scriptData==0)
			  {
			  introJs().start();
			  }
            }
</script>
 
</head>
<body onload="clique();">			       
	    <div class="wrap">	 
	      <div class="header">
	      	  <div class="header_top">
					  <div class="menu" >
						  <a class="toggleMenu" href="#"><img src="./web/images/nav.png" alt="" /></a>
							<ul class="nav"   data-step="1" data-intro="Barre de Navigation du profile patient." data-position='bottom-middle-aligned'>
                            	<li  data-step="2" data-intro="Portail pharmaceutique de recherche de médicaments et de pharmacies." data-position='down'><a href="../Portail_pharmacie/index.php"  target="_blank" ><i><img src="./images/invites.png" alt="" /></i>Pharmacie</a></li>
								<li data-step="3" data-intro="Gérer les paramétres de votre compte." data-position='down'><a href="parametres.php?id=<?php echo $ligne['id_patient'];?>"><i><img src="./images/settings.png" alt="" /></i>Paramètres</a></li>
								<li  data-step="4" data-intro="Accéder à votre compte." data-position='down'><a href="profile.php?id=<?php echo $ligne['id_patient'];?>"><i><img src="./images/user.png" alt="" /></i>Compte</a></li>
								<li  data-step="5" data-intro="Consulter vos rendez-vous." data-position='down'><a href="rdv.php?id=<?php echo $ligne['id_patient'];?>"><i><img src="./images/mail.png" alt="" /></i>Mes RDV</a></li>
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
							        			<ul >
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
	  <div class="main">  
	    <div class="wrap">  		 
	       <div class="column_left">	          
	    		 <div class="menu_box">
	    		 	 <h3>Menu</h3>
	    		 	   <div class="menu_box_list">
				      		<ul>
						  		<li data-step="6" data-intro="Rechercher des medecin et accéder à leur profile." data-position='down'><a href="rech_medecin.php?id=<?php echo $ligne['id_patient'];?>" class="invites"><span>Rechercher un medecin</span><!--<label class="digits">12</label>--><div class="clear"></div></a></li>
						  		<li data-step="7" data-intro="Rechercher des association" data-position='down'><a href="rech_association.php?id=<?php echo $ligne['id_patient'];?>" class="invites"><span>Rechercher une association</span><!--<label class="digits active">3</label>--><div class="clear"></div></a></li>
						  		<li data-step="8" data-intro="Consulter votre agenda." data-position='down'><a href="agenda.php?id=<?php echo $ligne['id_patient'];?>" class="events"><span>Votre agenda</span><!--<label class="digits">5</label>--><div class="clear"></div></a></li>
						  		<li data-step="9" data-intro="Rechercher des événements." data-position='down'><a href="rech_evenement.php?id=<?php echo $ligne['id_patient'];?>" class="invites"><span>Rechercher un événement</span></a></li>
						  		<li data-step="10" data-intro="Rechercher et consulter des article." data-position='down'><a href="rech_article.php?id=<?php echo $ligne['id_patient'];?>" class="invites"><span>Rechercher un article</span></a></li>						  	
				    		</ul>
				      </div>
	    		 </div>
	  		</div> 
            <div class="column_middle">
              <div class="column_middle_grid1">
		         <div class="profile_picture">
		        	<a href=""><img src="./images/profile_img150x150.jpg" alt="" />	</a>		         
		            <div class="profile_picture_name">
		            	<h2><?php if($ligne['sexe']=="Homme")echo"M";else echo "Mme";?>. <?php echo $ligne['nom']." ".$ligne['prenom'];?></h2>
		            </div>
		             <span><a href="#"> <img src="./images/follow_user.png" alt="" /> </a></span>
		          </div>
		       </div>
    	    </div>
            <div class="column_right">
				   <div class="column_right_grid calender">
                      <div class="cal1"> </div>
				   </div>
             </div>
             
    	<div class="clear"></div>
 	 </div>
   </div>   
 
</body>
</html>
<?php 
$requeteguide="UPDATE `patients` SET `guide_test`= 1 where id_patient= '$id'";
$resultatguide=mysql_query($requeteguide);
?>			  
<?php   }  ?>





<?php
}
else 
{
//
header('refresh:1; URL= ../index.php');
}
?>