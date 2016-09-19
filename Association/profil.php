<?php
session_start();
if (isset($_SESSION['mail'])){

$mailRec = $_SESSION['mail'];
$chemin_image = $_SESSION['chemin_image'];
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$result = mysql_query("select * from associations where adresse_mail = '$mailRec';");

while ($ligne=mysql_fetch_array($result)){

?>
<html>
<head>
<title>Profil <?php echo $ligne['nom'] ?></title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/Chart.js"></script>
 <script type="text/javascript" src="js/jquery.easing.js"></script>
 <script type="text/javascript" src="js/jquery.ulslide.js"></script>
 <script type="text/javascript" src="../js/jquery-ui-1.9.2.custom.js"></script>
 <!----Calender -------->
  <link rel="stylesheet" href="css/clndr.css" type="text/css" />
  <script src="js/underscore-min.js"></script>
  <script src= "js/moment-2.2.1.js"></script>
  <script src="js/clndr.js"></script>
  <script src="js/site.js"></script>
  <!----End Calender -------->
  
 <!----Added -------->
 <script type="text/javascript" src="js/script.js"></script>
 <!----Added -------->
 
   <!----visite guidee -------->      
		<script src="js/intro.js"></script>
		<link href="css/introjs.css" rel="stylesheet"/>
  <!----visite guidee -------->
 <script type="text/javascript">
 function clique()
            {
			     scriptdata= <?php echo json_encode($ligne['guide_test']);?>;
				 if(scriptdata==0){
                introJs().start();}
            }
 </script>
</head>
<body onload="clique();">			       
	    <div class="wrap">	
 	      <div class="header">
	      	  <div class="header_top" data-step="1" data-intro="Barre de Navigation du profil." data-position='bottom-left-aligned'>
					  <div class="menu">
						  <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
							<ul class="nav" >
                                <li data-step="7" data-intro="Cliquer pour retourner à l'accueil" data-position='right'><a href="../index.php"><i><img src="images/sun_icon2.png" alt="" /></i>Accueil</a></li>
								<li class="active"><a href="profil.php"><i><img src="images/user.png" alt="" /></i>Compte</a></li>
                                <li data-step="6" data-intro="Cliquer pour ajouter un article" data-position='left'><a href="php/ajouterArticle_Association.php" ><i><img src="images/invites.png" alt="" /></i>Ajouter un article</a></li>
							<div class="clear"></div>
						    </ul>
							<script type="text/javascript" src="js/responsive-nav.js"></script>
				        </div>	
					  <div class="profile_details" data-step="2" data-intro="Cliquer pour se déconnecter" data-position='left'>
				    		   <div id="loginContainer">
				                  <a id="loginButton" class=""><span>Moi</span></a>   
				                    <div id="loginBox">                
				                      <form id="loginForm">
				                        <fieldset id="body">
                                            <div class="user-info">
							        			<h4>Hello,<a href="profil.php"><?php echo $ligne['nom'] ?></a></h4>
							        			<ul>
							        				<li class="profile active"><a href="profil.php">Profil </a></li>
							        				<li class="logout"><a href="../config/logout.php"> Se deconnecter</a></li>
							        				<div class="clear"></div>		
							        			</ul>
							        		</div>			                            
				                        </fieldset>
				                    </form>
				                </div>
				            </div>
				             <div class="profile_img">	
				             	<a href="profil.php"><img src="images/<?php echo $chemin_image;?>" style="width:45px;height:45px;" />	</a>
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
	    		 	   <div class="menu_box_list" data-step="3" data-intro="D'ici vous pouvez gérer vos articles et vos évenements" data-position='right'>
				      		<ul>
						  		<!--<li><a href="#" class="messages"><span>Messages</span><label class="digits">5</label><div class="clear"></div></a></li>-->
						  		<li><a href="php/gestionArticle_Association.php" class="invites" ><span>Articles</span><div class="clear"></div></a></li>
						  		<li><a href="php/gestionEvenement.php" class="events" ><span>Evénements</span><div class="clear"></div></a></li>
						  		<!--<li><a href="#" class="statistics"><span>Statistiques</span></a></li>-->
				    		</ul>
				      </div>
	    		 </div>
	    		
	  		</div> 
	  		
            <div class="column_middle">
              <div class="column_middle_grid1">
		         <div class="profile_picture">
		        	<a href="#"><img src="images/<?php echo $chemin_image;?>" style="width:150px;height:150px;" />	</a>		         
		            <div class="profile_picture_name">
		            	<h3><?php echo $ligne['nom'] ?></h3>
		            </div>
		          </div>
		           <div class="articles_list" data-step="4" data-intro="Consultez les évenements des autres associations ainsi que les articles publiés par les médecins et les associations" data-position='left'>
		           	  <ul>
		           	  	<li><a href="php/afficherEvenement.php" class="red" >Afficher tous les évènements</a></li>
		           	  	<li><a href="php/afficherArticle_Association.php" class="purple" >Afficher tous les articles</a></li> 
		           	  </ul>
                    	<div class="clear"></div>
		           </div>
                  	
		       		</div>
	       
		       
    	    </div>
            <div class="column_right">
            	
				 
				   <div class="column_right_grid date_events" id="dayDisplay">
				     	  <a id="closeDay" style="cursor:pointer;"><img src="images/close-1.png" style="float:right;"/></a>
						 <script>
						   	// function test(){alert('ça marche');}
							 $("#dayDisplay").hide();
							 $(document).ready(function(){
							  $("#closeDay").click(function(){
								$("#dayDisplay").slideUp();
							  });
							});
						   </script>
                          
                          <h3 id="dayRec"></h3>
				     	 		
                            <div class="event_dates"><p id="NdayRec"></p></div>    
                            <div class="button" id ="AddEventButton"><a id ="eventAdd" class ="AddEvent" href="#add_something_container_event">Ajouter événement</a></div>
                         
                            <!--<div class="form_container"></div>-->					
				           
				    </div>
				 
				   <div class="column_right_grid calender" data-step="5" data-intro="Selectionner une date pour ajouter un évenement" data-position='left'>
                      <div class="cal1"> </div>
				   </div>
                        
                      
             </div>
             
           		<div class="clear"></div>
 				<div class="add_something_container" id="add_something_container_event">
                <script> 
					$("#add_something_container_event").hide(); 
					$(document).ready(function(){
                         $("#closeEvent").click(function(){
                         $("#add_something_container_event").slideUp();
                         });
                         });
                </script>
               
                         
                         
        
                    <a id="closeEvent" style="cursor:pointer;"><img src="images/close-1.png" style="float:right;"/></a>
                    <h3 style="float:right;"id="datedate"></h3><h3>Ajouter Evénement</h3>
                    
                    <div class="add_something">
                    <form  method="post" action="php/validerAjoutEvenement.php" id="form" >
                            
                                   <div id="divForm">
                                   </div>
                           </form>
                    </div>
                            
				</div>           
     
                <div class="clear"></div>
                <div class="add_something_container" id="add_something_container_article">
                <script> 
					$("#add_something_container_article").hide(); 
                </script>
        		
      			</div>
                
             
 </div>
 </div>
</body>
</html>
<?php 
$reqguide="update `associations` set `guide_test`=1 where adresse_mail = '$mailRec';";
$resl=mysql_query($reqguide);
?>

<?php }
$cnx->seDeconnecter();
}
else{
	echo '<body onLoad="alert (\'Vous n\'êtes pas connecté...\')">';
	header('refresh:2;URL=../index.php');
}
?>
