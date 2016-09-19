<?php 
session_start();
if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])){

$mailRec = $_SESSION['mail'];
$nomRec = $_SESSION['nom'];
$chemin_image = $_SESSION['chemin_image'];
include("../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

//$query = "select pe.*, pa.`nom` as nomA from `pfc`.`evenements` pe join `pfc`.`associations` pa on pe.`idAssociation` = pa.`idAssociation`;";
$query = "select * from evenements where etat_admin = 'Validé';";
$resultat = mysql_query($query);

?>

<html>
<head>
<title>Evénements</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="../css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>

 <script type="text/javascript" src="../js/jquery.js"></script>
 <script type="text/javascript" src="../js/login.js"></script>
 <script type="text/javascript" src="../js/Chart.js"></script>
 <script type="text/javascript" src="../js/jquery.easing.js"></script>
 <script type="text/javascript" src="../js/jquery.ulslide.js"></script>
 <!----Calender -------->
  <link rel="stylesheet" href="css/clndr.css" type="text/css" />
  <script src="../js/underscore-min.js"></script>
  <script src= "../js/moment-2.2.1.js"></script>
  <script src="../js/clndr.js"></script>
  <script src="../js/site.js"></script>
  <!----End Calender -------->
  
 <!----Added -------->
 <script type="text/javascript" src="../js/script.js"></script>
 <!----Added -------->
 
 <!----visite guidee -------->
 <script type="text/javascript" src="../js/intro.js"></script>
 <link href="../css/introjs.css" rel="stylesheet" type="text/css" media="all"/>
 <!----visite guidee -------->
 
</head>
<body>			       
	    <div class="wrap">	
 	      <div class="header">
	      	  <div class="header_top">
					  <div class="menu">
						  <a class="toggleMenu" href="#"><img src="../images/nav.png" alt="" /></a>
							<ul class="nav">
                                <li><a href="../../index.php"><i><img src="../images/sun_icon2.png" alt="" /></i>Accueil</a></li>
								<li class="active"><a href="../profil.php"><i><img src="../images/user.png" alt="" /></i>Compte</a></li>
                                <li><a href="ajouterArticle_Association.php" target="_blank"><i><img src="../images/invites.png" alt="" /></i>Ajouter un article</a></li>
							<div class="clear"></div>
						    </ul>
							<script type="text/javascript" src="../js/responsive-nav.js"></script>
				        </div>	
					  <div class="profile_details">
				    		   <div id="loginContainer">
				                  <a id="loginButton" class=""><span>Moi</span></a>   
				                    <div id="loginBox">                
				                      <form id="loginForm">
				                        <fieldset id="body">
                                            <div class="user-info">
							        			<h4>Hello,<a href="../profil.php"><?php echo $nomRec ?></a></h4>
							        			<ul>
							        				<li class="profile active"><a href="../profil.php">Profil </a></li>
							        				<li class="logout"><a href="../../config/logout.php"> Se deconnecter</a></li>
							        				<div class="clear"></div>		
							        			</ul>
							        		</div>			                            
				                        </fieldset>
				                    </form>
				                </div>
				            </div>
				             <div class="profile_img">	
				             	<a href="../profil.php"><img src="images/<?php echo $chemin_image;?>" style="width:45px;height:45px;"/>	</a>
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
	    		 <div class="menu_box" style="margin-right:5%;">
	    		 	 <h3>Menu</h3>
	    		 	   <div class="menu_box_list">
				      		<ul>
						  		<!--<li><a href="#" class="messages"><span>Messages</span><label class="digits">5</label><div class="clear"></div></a></li>-->
						  		<li><a href="gestionArticle_Association.php" class="invites"><span>Articles</span><div class="clear"></div></a></li>
						  		<li class="active"><a href="gestionEvenement.php" class="events"><span>Evénements</span><div class="clear"></div></a></li>
						  		<!--<li><a href="#" class="statistics"><span>Statistiques</span></a></li>-->
				    		</ul>
				      </div>
	    		 </div>
	    		
	  		</div> 
		
<div class="column_table">

<table>

	<tr>
   		<td align="center">Hôte</td>
		<td align="center">Nom de l'événement</td>
		<td align="center">Thème</td>
		<td align="center">Type</td>
		<td align="center">Public cible</td>
		<td align="center">Lieu</td>
		<td align="center">Date</td>
		<td align="center">Description</td>
	</tr>


	<?php while ($ligne=mysql_fetch_array($resultat)) {?>
        <tr class="column_table body_table">
        	<td  align="center">	<?php echo $ligne['hote']; ?>	</td>
			<td  align="center">	<?php echo $ligne['nom']; ?>	</td>
			<td  align="center">	<?php echo $ligne['theme']; ?>	</td>
			<td  align="center">	<?php echo $ligne['type']; ?>	</td>
			<td  align="center">	<?php echo $ligne['public']; ?>	</td>
			<td  align="center">	<?php echo $ligne['lieu']; ?>	</td>
			<td  align="center">	<?php echo $ligne['date']; ?>	</td>
			<td  align="center">	<?php echo $ligne['description']; ?>	</td>
		</tr>	
	<?php }	?>

</table>
</div>
</div>
</div>
</body>
</html>
<?php $cnx->seDeconnecter();}
else{
	echo '<body onLoad="alert (\'Vous n\'êtes pas connecté...\')">';
	header('refresh:2;URL=../../index.php');
}
  ?>