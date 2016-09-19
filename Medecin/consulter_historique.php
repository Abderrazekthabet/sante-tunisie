<?php
session_start();
if(isset($_SESSION['adresse_medecin']) && isset($_SESSION['mdp_medecin'])){
?>
<head>
<title>Historique</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="web/css/style_historique.css" rel="stylesheet" type="text/css" media="all"/>
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
	      <div class="header">
	      	  <div class="header_top">
					  <div class="menu">
				        </div>	
		 		      <div class="clear"></div>				 
				   </div>
			</div>	  					     
	</div>
	  <div class="main">  
	    <div class="wrap">  		 
	       <div class="column_left">	          
	    		 <div class="menu_box">
	    		 	   <div class="column_middle_grid1">
					    <div class="profile_picture">
					   				<?php 
	include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
	$nomRec=$_POST['nomRech'];
	$query = "select * from `consultation` where nom='$nomRec';";
	$result = mysql_query($query); 
?>
		  <div class="historique">
	    		 	 <h3>Historique</h3>
            <div class="table"> 	
    <table border="1px" width="1000px">
	<tr>
		<td align="center" width=5%>Id_patient</td>
		<td align="center" width=20%>Nom</td>
		<td align="center" width=20%>Prenom</td>
		<td align="center" width=20%>maladie</td>
		<td align="center" width=30%>medicament</td>
		<td align="center" width=20%>Dose</td>
		<!--<td align="center" width=40%>Supprimer</td>-->
	
	</tr>
	<?php while ($ligne=mysql_fetch_array($result)) {?>
		<tr>
			<td  align="center">	<?php echo $ligne['id_patient']; ?>           	</td>
			<td  align="center">	<?php echo $ligne['nom']; ?>           	</td>
			<td  align="center">	<?php echo $ligne['prenom']; ?>	        </td>
			<td  align="center">	<?php echo $ligne['maladie']; ?>	        </td>
			<td  align="center">	<?php echo $ligne['medicament']; ?>	        </td>
			<td  align="center">	<?php echo $ligne['dose']; ?>	        </td>
			<!--<td  align="center"  ><a href="suppression_patient.php?id_patient=<?php echo $ligne['id_patient'];?>">supprimer</a></td>-->
		</tr>	
		
	<?php }	?>
</table>
</div></div></div>
	    		 	  
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

