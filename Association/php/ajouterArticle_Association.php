<?php 

session_start();
if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])){

$mailRec = $_SESSION['mail'];
$nomRec = $_SESSION['nom'];
$chemin_image = $_SESSION['chemin_image'];
include("../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();


?>

<html>
<head>
<title>Ajout Article</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../css/style_Article.css" rel="stylesheet" type="text/css" media="all"/>
<link href="../css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/login.js"></script>
<script type="text/javascript" src="../js/Chart.js"></script>
 <script type="text/javascript" src="../js/jquery.easing.js"></script>
 <script type="text/javascript" src="../js/jquery.ulslide.js"></script>
 <!----Calender -------->
  <link rel="stylesheet" href="../css/clndr.css" type="text/css" />
  <script src="../js/underscore-min.js"></script>
  <script src= "../js/moment-2.2.1.js"></script>
  <script src="../js/clndr.js"></script>
  <script src="../js/site.js"></script>
  <!----End Calender -------->
  
 <!----Added -------->
 <script type="text/javascript" src="../js/script.js"></script>
 <!----Added -------->
 
    <script src="../js/nicEdit.js" type="text/javascript"></script>

 
</head>
<body onmouseover = "transferTotextarea()">			       
	    <div class="wrap">	
 	      <div class="header">
	      	  <div class="header_top">
					  <div class="menu">
						  <a class="toggleMenu" href="#"><img src="../images/nav.png" alt="" /></a>
							<ul class="nav">
                                <li><a href="../../index.php"><i><img src="../images/sun_icon2.png" alt="" /></i>Accueil</a></li>
								<li><a href="../profil.php"><i><img src="../images/user.png" alt="" /></i>Compte</a></li>
                                <li class="active"><a href="ajouterArticle_Association.php" target="_blank"><i><img src="../images/invites.png" alt="" /></i>Ajouter un article</a></li>
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
				             	<a href="../profil.php"><img src="images/<?php echo $chemin_image;?>" style="width:45px;height:45px;" />	</a>
				             </div>		
				             <div class="clear"></div>		  	
					    </div>	
		 		      <div class="clear"></div>				 
				   </div>
			</div>	  					     
	</div>
	  <div class="main">  
	    <div class="wrap">  		 
		
<div class="add_something_container" style="margin-bottom: 5%;">
	<h3 style="border-radius: 5px;"><center>Ajouter un article</center></h3>
    <div class="add_something" style="padding: 5% 0 2% 0;">
    <!--	</div>-->

<script type="text/javascript">

bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true}).panelInstance('article');
      
});

</script>

<form  method="post" action="validerAjoutArticle_Association.php" id="form" > 
    <input type="hidden" value="<?php echo $mailRec ?>"  id="mail" name="mail" />
    <center>
           Titre: <input type="text" id="titre" name="titre" /> <br/><br/>
           Sujet: <input type="text" id="sujet" name="sujet" /> <br/>
                <input type="button" value="Publier" class="button .articleB" onclick = "verifierTout_Article()"/>
             </center>
    <div style="margin-left: 17%;">
<textarea name="article" style="width:95%; height:300px;"  id="article" ></textarea>
        </div>
        <!--<input type="hidden" id="articleCache" value=""/>-->
                     

 
 </form>
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