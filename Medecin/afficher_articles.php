<?php
session_start();
if(isset($_SESSION['adresse_medecin']) && isset($_SESSION['mdp_medecin'])){
?>

<?php
$id_medecin=$_GET['id_medecin'];
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$requete="SELECT * FROM `medecin` WHERE id_medecin='$id_medecin'";
$resultat= mysql_query($requete);

$query = "select * from `articles`;";
	$result = mysql_query($query); 
?>
<?php while($ligne=mysql_fetch_array($resultat)){?>
<head>
<title>Articles</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="web/css/style_articles.css" rel="stylesheet" type="text/css" media="all"/>
<link href="web/css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="web/js/jquery.js"></script>
<script type="text/javascript" src="web/js/login.js"></script>
<script type="text/javascript" src="web/js/Chart.js"></script>
 <script type="text/javascript" src="web/js/jquery.easing.js"></script>
 <script type="text/javascript" src="web/js/jquery.ulslide.js"></script>
 <!----Calender -------->
  <link rel="stylesheet" href="web/css/clndr.css" type="text/css" />
  <script src="web/js/underscore-min.js"></script>
  <script src= "web/js/moment-2.2.1.js"></script>
  <script src="web/js/clndr.js"></script>
  <script src="web/js/site.js"></script>
  <!----End Calender -------->
</head>
<body>			       
	    <div class="wrap">	 
	      <div class="header_top">
					  <div class="menu">
						  <a class="toggleMenu" href="#"><img src="web/images/nav.png" alt="" /></a>
							<ul class="nav">
                            	<li><a href="http://127.0.0.1/PFC/Portail_Sante_beta/"><i><img src="web/images/invites.png" alt="" />                           </i>Accueil</a></li>
								<li><a href="modifier_medecin.php?id_medecin=<?php echo $ligne['id_medecin'];?>"><i><img src="web/images/settings.png" alt="" /></i>Parametres</a></li>
								<li class="active"><a href="profile.php?id_medecin=<?php echo $ligne['id_medecin'];?>"><i><img src="web/images/user.png" alt="" /></i>Compte</a></li>
								<li><a  href="mailto:www.gmail.com" ><i><img src="web/images/mail.png" alt="" />                                                  </i>Mail</a></li>
								<li><a href="https://www.google.tn"><i><img src="web/images/favourite.png" alt="" />                                              </i>Google</a></li>
							<div class="clear"></div>
						    </ul>
							<script type="text/javascript" src="web/js/responsive-nav.js"></script>
				        </div>	
					  <div class="profile_details">
				    		   <div id="loginContainer">
				                  <a id="loginButton" class=""><span>Moi</span></a>   
				                    <div id="loginBox">                
				                      <form id="loginForm">
				                        <fieldset id="body">
				                            <div class="user-info">
							        			<h4>Hello,<a href="#"><?php echo $ligne['nom']." ".$ligne['prenom'];?></a></h4>
							        			<ul>
							        				<li class="profile active"><a href="profile.php?id_medecin=<?php echo $ligne['id_medecin'];?>">Profil </a></li>
							        				<li class="logout"><a href="../config/logout.php"> Se deconnecter</a></li>
							        				<div class="clear"></div>		
							        			</ul>
							        		</div>			                            
				                        </fieldset>
				                    </form>
				                </div>
				            </div>
				             <div class="profile_img">	
				             	<a href="#"><img src="web/images/profile_img40x40.jpg" alt="" />	</a>
				             </div>		
				             <div class="clear"></div>		  	
					    </div>	
		 		      <div class="clear"></div>				 
				   </div>				     
	</div>
	  <div class="main">  
	    <div class="wrap">  		 
	       <div class="column_left">	          
	    		 <div class="menu_box">
	    		 	 <h3>Menu</h3>
	    		 	   <div class="menu_box_list">
				      		<ul>
						  		<li><a href="ajouter_articles1.php?id_medecin=<?php echo $ligne['id_medecin'];?>"     class="events"><span>Articles</span><div class="clear"></div></a></li>
						  		<li><a href="afficher_articles.php?id_medecin=<?php echo $ligne['id_medecin'];?>"     class="events"><span>Afficher Article</span></a></li>
								<li><a href="consulter_historique1.php?id_medecin=<?php echo $ligne['id_medecin'];?>" class="messages"><span>Consulter Historique</span><div class="clear"></div></a></li>
						  		<li><a href="consulter_rdv.php?id_medecin=<?php echo $ligne['id_medecin'];?>"         class="statistics"><span>Consulter RDV</span></a></li>		  	
						  		<li><a href="ajouter_patient1.php?id_medecin=<?php echo $ligne['id_medecin'];?>"      class="patient"><span>Patient</span></a></li>		  	
						  		<li><a href="association1.php?id_medecin=<?php echo $ligne['id_medecin'];?>"          class="patient"><span>Association</span></a></li>	
				    		</ul>
				      </div>
	    		 </div>
	  		</div> 
	  		
            <div class="column_middle">
              <div class="column_middle_grid1">
		         <div class="profile_picture">
                
		 <div class="liste_article">
         
	    		 	 <h3>Liste des articles</h3>
			
            <div class="table"> 	
    <table>
	<tr>
		<td align="center" width="5%" >Id</td>
		<td align="center" width="15%">Titre</td>
		<td align="center" width="20%">Sujet</td>
		<td align="center" width="10%">Auteur</td>
		<td align="center" width="40%">Contenu </td>
		<td align="center" width="10%">Supprimer</td>
	</tr>
	<?php while ($ligne2= mysql_fetch_array($result)) {?>
		<tr>
			<td  align="center">	<?php echo $ligne2['idArticle']; ?>	</td>
			<td  align="center">	<?php echo $ligne2['titre']; ?>	</td>
			<td  align="center">	<?php echo $ligne2['sujet']; ?>	</td>
			<td  align="center">	<?php echo $ligne2['auteur']; ?>	</td>
			<td  align="center">	<?php echo utf8_encode($ligne2['contenu']); ?>	</td>
			<td  align="center"  ><a href="suppression_articles.php?id_articles=<?php echo $ligne2['idArticle'];?>&id_medecin=<?php echo $ligne['id_medecin'] ;?> ">supprimer</a></td>
		</tr>	
	<?php }	?>
</table>
</div></div>
                     </div>
		          </div>
		       </div>              
    	    </div>
    	    
            <div class="column_right">
                       </div>
    	<div class="clear"></div>
 	 </div>
   </div>      
</body>
</html><?php   }  ?>

<?php
}
else 
{
echo "<h1>"."IL Faut connecter pour acceder a cette page"."</h1>";
header('refresh:2; URL=/pfc_khairi/index.html');
}
?>