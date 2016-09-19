<!DOCTYPE HTML>

<head>
<title>Liste des articles</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="./css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/login.js"></script>
<script type="text/javascript" src="./js/Chart.js"></script>
 <script type="text/javascript" src="./js/jquery.easing.js"></script>
 <script type="text/javascript" src="./js/jquery.ulslide.js"></script>
 <script type="text/javascript" src="./js/parametres_controle.js"></script>
  <script type="text/javascript">
 
 $(document).ready(function (){
 var page=1;
 var per_page=3;
 var items= $('.gh_liste_article').length;
 var page_last=Math.ceil(items/per_page);
 
 function setPage(page){
 $('.gh_liste_article').slice(0, page * per_page).hide();
 $('.gh_liste_article').slice(page * per_page - per_page , page * per_page).show();
 $('.gh_liste_article').slice(page * per_page).hide();

 }
 ///next button
  $('.next').click( function (){
  if(page < page_last){
  page++;
   setPage(page);
  }
  });
 
  ///prev button

  $('.prev').click( function (){
  if(page > 1){
  page--;
   setPage(page);
  }
  });
  
  //// page link
  for(x=1; x <= page_last ;x++){
    if(x==1){
	 $('.pages').append('<span><a class="links link_' + x + '">' + x + '</a></span>');
	}else{
	       $('.pages').append('<span><a href="#"  class="links link_' + x + '">' + x + '</a></span>');
	     }
  }
  
  ///links func
  $('.links').click(function(){
   $('.links.link_'+ page).attr('href','#');
  page=$(this).html();
   $('.links.link_'+ page).removeAttr('href');
  setPage(page);
  });
  
  
 setPage(1);
 });
</script>
 <link rel="shortcut icon" href="./images/icon.png">
  <link rel="stylesheet" href="./css/clndr.css" type="text/css" />
  <script src="./js/underscore-min.js"></script>
  <script src= "./js/moment-2.2.1.js"></script>
  <script src="./js/clndr.js"></script>
  <script src="./js/site.js"></script>
  <!----End Calender -------->
</head>


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

$type=$_POST['type_article'];
if($type=="titre")
{
$titre=$_POST['titre_article'];
$requete2="SELECT * FROM `articles` WHERE titre='$titre' and etat_admin='Validé'";
}

if($type=="tous")
{
$requete2="SELECT * FROM `articles` where etat_admin='Validé' ";
}
$resultat2=mysql_query($requete2);
?>



<?php while($ligne=mysql_fetch_array($resultat)){?>

<?php
if($_SESSION['login_patient'] != $ligne['email'])
{
$sessR=$_SESSION['login_patient'];
$requeteR="SELECT * FROM `patients` WHERE email='$sessR' ";
$resultatR=mysql_query($requeteR);
$ligneR=mysql_fetch_array($resultatR);
header("location:rech_article.php?id=".$ligneR['id_patient']);
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
<div class="listearticle">

	   <h3>Liste des articles</h3>
	</div>
	</br></br></br>
	<?php $r=0; while($ligne2=mysql_fetch_array($resultat2)){?>
	   
	<div class="gh_liste_article">
	     <center>
	       <span><?php echo $r=$r+1;?></span> <a href="article.php?id=<?php echo $ligne['id_patient'];?>&ida=<?php echo $ligne2['idArticle'];?>" target="_blank" ><?php echo $ligne2['titre'];?></a>
		   </center>
	</div>
	</br></br></br>
	<?php   }  ?>
	<?php   }  ?>
	
	<?php if($r==0){ ?>
	<div class="listearticle">
	<h3>Désolé aucune résultat trouvée</h3>
	</div>
	<?php } ?>

	<?php if($r!=0){ ?>
	<div class="pagination">
	<button class="prev">Précédent</button>
	<span class="pages"></span>
	<button class="next">Suivant</button>
	</div>
	<?php } ?>
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