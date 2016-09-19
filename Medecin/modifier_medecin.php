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
<head>
<title>Parametre profile </title>
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
<?php while($ligne=mysql_fetch_array($resultat)){?>
<body>			       
	    <div class="wrap">	 
	      <div class="header">
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
							        			<h4>Hello,<a href="#"> <?php echo $ligne['nom']." ".$ligne['prenom'];?></a></h4>
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
                  <div class="column_middle_grid">
		        	
<form method="POST" action="valider_medecin.php?id_medecin=<?php echo $ligne['id_medecin'];?>">
<fieldset>
												
        Nom:             <label> <br/><input type="text" name="nom"      id="nom"       required = placeholder="saisir le nom" value="<?php echo $ligne['nom'];?>"/>              </label>*<br/>
	    Prenom:          <label> <br/><input type="text" name="prenom"   id="prenom"    required = placeholder="saisir le prenom" value="<?php echo $ligne['prenom'];?>"/>           </label>*<br/>
		Adresse:         <label> <br/><input type="text" name="adresse"  id="adresse"   required = placeholder="saisir l'adresse" value="<?php echo $ligne['adresse'];?>" />           </label>*<br/>
		Email:           <label> <br/><input type="text" name="adresse_mail"    id="adresse_mail"  required =    placeholder="saisir le mail" value="<?php echo $ligne['adresse_mail'];?>"/>             </label>*<br/>
		Telephone:       <label> <br/><input type="text" name="telephone"id="telephone" required = placeholder="saisir le numero" value="<?php echo $ligne['telephone'];?>" />           </label>*<br/>
		Fax:             <label> <br/><input type="text" name="fax"      id="fax"       required = placeholder="saisir le fax"  value="<?php echo $ligne['fax'];?>"/>              </label>*<br/>
		Type:            <label> <br/><input type="text" name="type"     id="type"      required = placeholder="saisir le type"  value="<?php echo $ligne['type'];?>" />             </label>*<br/>
		Specialite:      <label> <br/><input type="text" name="specialite"id="specilaite" required = placeholder="saisir la specialite"  value="<?php echo $ligne['specialite'];?>"/>        </label>*<br/>
		Biographie:      <br/><textarea name="biographie" required = id="biographie"><?php echo $ligne['biographie'];?></textarea>*<br/>
		<br/>
		<input type="submit" value="valider" /> 
		<input type="reset" value="Annuler" />
	    </form>
		 <?php  } ?>
		 
		            </div>
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
</html>

<?php
}
else 
{
echo "<h1>"."IL Faut connecter pour acceder a cette page"."</h1>";
header('refresh:2; URL=/pfc_khairi/index.html');
}
?>