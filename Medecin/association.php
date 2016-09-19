<?php
session_start();
if(isset($_SESSION['adresse_medecin']) && isset($_SESSION['mdp_medecin'])){
?>

<head>
<title>Association</title>
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
	$query = "select * from `associations` where nom='$nomRec';";
	$result = mysql_query($query); 
?>
					    <div class="historique">
	                    <h3>Association</h3>
            <div class="table"> 			
    <table border="1px">
	<tr>
		<td align="center" width=10%>Id_Association </td>
		<td align="center" width=10%>Matricule      </td>
		<td align="center" width=10%>Nom            </td>
		<td align="center" width=10%>adresse        </td>
		<td align="center" width=10%>adresse_mail   </td>
		<td align="center" width=10%>telephone      </td>
		<td align="center" width=10%>fax            </td>
		<td align="center" width=10%>categorie      </td>
		<td align="center" width=10%>description    </td>
	</tr>
	<?php while ($ligne=mysql_fetch_array($result)) {?>
		<tr>
			<td  align="center">	<?php echo $ligne['idAssociation']; ?>           	</td>
			<td  align="center">	<?php echo $ligne['matricule']; ?>           	    </td>
			<td  align="center">	<?php echo $ligne['nom']; ?>                    	</td>
			<td  align="center">	<?php echo $ligne['adresse']; ?>	                </td>
			<td  align="center">	<?php echo $ligne['adresse_mail']; ?>	            </td>
			<td  align="center">	<?php echo $ligne['telephone']; ?>	                </td>
			<td  align="center">	<?php echo $ligne['fax']; ?>	                    </td>
			<td  align="center">	<?php echo $ligne['categorie']; ?>	                </td>
			<td  align="center">	<?php echo $ligne['description']; ?>	            </td>
		</tr>	
	<?php }	?>
</table>
</div></div></div></div></div>
	    		 	  
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