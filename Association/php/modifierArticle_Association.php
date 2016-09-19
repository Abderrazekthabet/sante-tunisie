<?php
session_start();
if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])){

$mailRec = $_SESSION['mail'];
$nomRec = $_SESSION['nom'];
$idRec = $_GET['id'];
$chemin_image = $_SESSION['chemin_image'];
include("../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$query = "select * from articles where idArticle = '$idRec';";

$result = mysql_query($query);

?>

<html>

<head>
<title>Modifier Article</title>
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
  <link rel="stylesheet" href="css/clndr.css" type="text/css" />
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
                                <li><a href="../../index.html"><i><img src="../images/sun_icon2.png" alt="" /></i>Accueil</a></li>
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
							        				<li class="logout"><a href="log_out.php"> Se deconnecter</a></li>
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
<div class="modify_something_container">
<h3>Modifier l'article <u><?php echo $idRec;?></u></h3> 
</div>
<div class="modify_something"  style="padding: 5% 0 2% 0;">

<script type="text/javascript">

bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true}).panelInstance('article');
      
});

</script>
	<?php while($ligne=mysql_fetch_array($result)) { ?>
	<form  method="post" action="validerModifArticle_Association.php" id="form" >
			<input type="hidden" value="<?php echo $ligne['idArticle']; ?>"  id="id" name="id" />
    <center>
           Titre: <input type="text" id="titre" name="titre" value="<?php echo $ligne['titre']; ?>"/> <br/><br/>
           Sujet: <input type="text" id="sujet" name="sujet" value="<?php echo $ligne['sujet']; ?>"/> <br/>
                <input type="button" value="Publier" class="button .articleB" onclick = "verifierTout_Article()"/>
             </center>
    <div style="margin-left: 17%;">
<textarea name="article" style="width:95%; height:300px;"  id="article" ><?php echo $ligne['contenu']; ?></textarea>
        </div>
         <?php }	?>
	</form>
    </div>
<?php $cnx->seDeconnecter();}
else{
	echo '<body onLoad="alert (\'Vous n\'êtes pas connecté...\')">';
	header('refresh:2;URL=../../index.php');
}
  ?>
  </body>
</html>

