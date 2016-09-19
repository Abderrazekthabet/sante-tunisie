
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
?>
<?php while($ligne=mysql_fetch_array($resultat)){?>
<head>
<title><?php echo $ligne['nom']." ".$ligne['prenom'];?> </title>
<meta name="keyword" content="medicament; rdv" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="web/css/style_index.css" rel="stylesheet" type="text/css" media="all"/>
<link href="web/css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="web/js/jquery.js"></script>
<script type="text/javascript" src="web/js/login.js"></script>
<script type="text/javascript" src="web/js/Chart.js"></script>
<script src="./js/intro.js"></script>
<link href="./css/introjs.css" rel="stylesheet"/>
 <script type="text/javascript" src="web/js/jquery.easing.js"></script>
 <script type="text/javascript" src="web/js/jquery.ulslide.js"></script>
 <!----Calender -------->
  <link rel="stylesheet" href="web/css/clndr.css" type="text/css" />
  <script src="web/js/underscore-min.js"></script>
  <script src= "web/js/moment-2.2.1.js"></script>
  <script src="web/js/clndr.js"></script>
  <script src="web/js/site.js"></script>
  <!----End Calender -------->
  
  
  <script>
 function auto()
            {
			  scriptData = <?php echo json_encode($ligne['guide_test']); ?>;
			  if(scriptData==0)
			  {
			  introJs().start();
			  }
            }
</script>

</head>
<body onload="auto();">			       
	    <div class="wrap">	 
	      <div class="header">
	      	  <div class="header_top">
					  <div class="menu">
						  <a class="toggleMenu" href="#"><img src="web/images/nav.png" alt="" /></a>
							<ul class="nav"  data-step="1" data-intro="Barre de Navigation du profile medecin." data-position='bottom-middle-aligned'>
                            	<li data-step="2" data-intro="Barre de Navigation d'Acceuil." data-position='bottom-middle-aligned'><a href="../index.php"><i><img src="web/images/invites.png" alt="" />                           </i>Accueil</a></li>
								<li data-step="3" data-intro="Barre de Navigation du Parametre." data-position='bottom-middle-aligned'><a href="modifier_medecin.php?id_medecin=<?php echo $ligne['id_medecin'];?>"><i><img src="web/images/settings.png" alt="" /></i>Parametres</a></li>
								<li data-step="4" data-intro="Barre de Navigation du compte medecin." data-position='bottom-middle-aligned' class="active"><a href="profile.php?id_medecin=<?php echo $ligne['id_medecin'];?>"><i><img src="web/images/user.png" alt="" /></i>Compte</a></li>
								<!--<li><a  href="mailto:www.gmail.com" ><i><img src="web/images/mail.png" alt="" />                                                  </i>Mail</a></li>
								<li><a href="https://www.google.tn"><i><img src="web/images/favourite.png" alt="" />                                        </i>Google</a></li>-->
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
	</div>
	  <div class="main">  
	    <div class="wrap">  		 
	       <div class="column_left">	          
	    		 <div class="menu_box">
	    		 	 <h3>Menu</h3>
	    		 	   <div class="menu_box_list">
				      		<ul>
						  		<li data-step="5" data-intro="Barre de Navigation d'ajout d'article."    data-position='bottom-middle-aligned'><a href="ajouter_articles1.php?id_medecin=<?php echo $ligne['id_medecin'];?>" class="events">  <span>Articles</span><div class="clear"></div></a></li>
						  		<li data-step="6" data-intro="Barre de Navigation d'affichage d'aricle." data-position='bottom-middle-aligned'><a href="afficher_articles.php?id_medecin=<?php echo $ligne['id_medecin'];?>" class="events">   <span>Afficher Article</span></a></li>
								<li data-step="7" data-intro="Barre de Navigation du consultation historique." data-position='bottom-middle-aligned'><a href="consulter_historique1.php?id_medecin=<?php echo $ligne['id_medecin'];?>" class="messages"><span>Consulter Historique</span><div class="clear"></div></a></li>
						  		<li data-step="8" data-intro="Barre de Navigation du consultation du rdv." data-position='bottom-middle-aligned'><a href="consulter_rdv.php?id_medecin=<?php echo $ligne['id_medecin'];?>"     class="statistics"   ><span>Consulter RDV</span></a></li>		  	
						  		<li data-step="10" data-intro="Barre de Navigation du patient." data-position='bottom-middle-aligned'><a href="ajouter_patient1.php?id_medecin=<?php echo $ligne['id_medecin'];?>"  class="patient">     <span>Patient</span></a></li>		  	
						  		<li data-step="11" data-intro="Barre de Navigation du rechercher d'association." data-position='bottom-middle-aligned'><a href="association1.php?id_medecin=<?php echo $ligne['id_medecin'];?>"      class="patient">     <span>Association</span></a></li>		  	
				    		</ul>
				      </div>
	    		 </div>
	  		</div> 
	  		
            <div class="column_middle">
              <div class="column_middle_grid1">
		         <div class="profile_picture">
		        	<a href=""><img src="web/images/profile_img150x150.jpg" alt="" />	</a>		         
		            <div class="profile_picture_name">
		            	 <h2><?php echo $ligne['nom']." ".$ligne['prenom'];?></h2>
		            </div>
		          </div>
		       </div>              
    	    </div>
    	    
            <div class="column_right">
				  <!-- <div class="column_right_grid date_events">
				     	  <h3><a href="#" id="slide_prev"><img src="web/images/arrow-left.png" alt="" /></a> Mercredi <a href="#" id="slide_next"><img src="web/images/arrow-right.png" alt="" /></a></h3>
				     	 		<ul id="slide" class="event_dates">					            
						            <li>26</li>
						            <li>25</li>
						            <li>24</li>
						            <li>23</li>
						            <li>22</li>
						            <li>21</li>
						            <li>20</li>
						            <li>19</li>
						            <li>18</li>
						            <li>17</li>
						            <li>16</li>
						            <li>15</li>
						            <li>14</li>
						            <li>13</li>
						            <li>12</li>
						            <li>11</li>
						            <li>10</li>
						            <li>9</li>
						            <li>8</li>
						            <li>7</li>
						            <li>6</li>
						            <li>5</li>
						            <li>4</li>
						            <li>3</li>
						            <li>2</li>
						            <li>1</li>
						            <li>31</li>
						            <li>30</li>
						            <li>29</li>
						            <li>28</li>
						            <li>27</li>
						        </ul>
						         <div class="button"><a href="#">consulter RDV</a></div>											 				
				           <script type="text/javascript">
				            $(function() {						
				                $('#slide').ulslide({
				                   
									effect: {
										type: 'carousel', // slide or fade
				                        axis: 'x',        // x, y
										showCount:1
									},
				                    nextButton: '#slide_next',
				                    prevButton: '#slide_prev',
				                    duration: 800,
				                    /*autoslide: 2000,*/
									easing: 'easeOutBounce'
				                });
				            });
				        </script>
				    </div>-->
				   <div class="column_right_grid calender">
                      <div class="cal1"> </div> 
				   </div>
                       </div>
    	<div class="clear"></div>
 	 </div>
   </div>      


<?php 
$requeteguide="UPDATE `medecin` SET `guide_test`= 1 where id_medecin= '$id_medecin'";
$resultatguide=mysql_query($requeteguide);
?>			  
<?php   }  ?>

<?php
}
else 
{
echo "<h1>"."IL Faut connecter pour acceder a cette page"."</h1>";
header('refresh:2; URL=../index.php');
}
?>
</body>
</html>