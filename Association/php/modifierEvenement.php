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

$query = "select * from evenements where idEvenement = '$idRec';";

$result = mysql_query($query);

?>

<html>

<head>
<title>Modifier Evénement</title>
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
 <!-- Appel Calendrier -->
    	<script type="text/javascript" src="../calendrier/calendrier.js"></script>
		<link rel="stylesheet" media="screen" type="text/css" title="Design" href="../calendrier/design.css" />
     <!-- fin Calendrier -->
 
</head>


<body>
	    <div class="wrap">	
 	      <div class="header">
	      	  <div class="header_top">
					  <div class="menu">
						  <a class="toggleMenu" href="#"><img src="../images/nav.png" alt="" /></a>
							<ul class="nav">
                                <li><a href="../../index.php"><i><img src="../images/settings.png" alt="" /></i>Accueil</a></li>
								<li class="active"><a href="../profil.php"><i><img src="../images/user.png" alt="" /></i>Compte</a></li>
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
<div class="modify_something_container">
<h3>Modifier l'événement <u><?php echo $idRec;?></u></h3> 
</div>
<div class="modify_something" align="center">
	   <?php while($ligne=mysql_fetch_array($result)) { ?>
  <form  method="post" action="validerModifEvenement.php" id="form" >
		
		<input type="hidden" value=<?php echo $ligne['idEvenement']; ?>  id="id" name="id" />
        <table>
			
            <tr><td>Nom de l'événement: </td><td><input type="text" id="nom" name="nom" value="<?php echo $ligne['nom']; ?>" /> </td></tr>
            <tr><td>Thème: </td><td><input type="text" id="theme" name="theme" value="<?php echo $ligne['theme']; ?>" /> </td></tr>
             <tr><td>Type: </td><td>
            	<select name="type" id="type">
            		<option value="Conférence" <?php if ($ligne['type']=="Conférence") echo 'selected="selected"'?> >Conférence</option>
                    <option value="Parcours santé" <?php if ($ligne['type']=="Parcours Santé") echo 'selected="selected"'?> >Parcours Santé</option>
                    <option value="Acte de charité"<?php if ($ligne['type']=="Acte de charité") echo 'selected="selected"'?> >Acte de charité</option>
                    <option value="Fête" <?php if ($ligne['type']=="Fête") echo 'selected="selected"'?> >Fête</option>
                    </select>
            </td></tr>
            <tr><td><label id="labelPublic"> Public visé: </label></td><td>
            			<label><input type="checkbox" id="tous" name="tous" onChange="CheckAll()" <?php if ($ligne['public']=="Etudiants: Tout le monde  Chercheurs Entreprises Professionnels Médias") echo 'checked="checked"'?>/>Tous</label>
            <label><input type="checkbox" id="etudiant" name="etudiant" value="Etudiants" onChange="showTypeEtudiant()" /> Etudiants </label> 
                                          <span id="EtudiantSelDiv" > </span>
                        <label><input type="checkbox" id="chercheur" name="chercheur" value="Chercheurs"/>Chercheurs</label>
                        <label><input type="checkbox" id="entreprise" name="entreprise" value="Entreprises"/>Entreprises</label>
                        <label><input type="checkbox" id="professionnel" name="professionnel" value="Professionnels"/>Professionnels</label>
                        <label><input type="checkbox" id="medias" name="medias" value="Médias"/>Médias </label>
                        
            					</td></tr>
            <tr><td>Lieu: </td><td><input type="text" id="lieu" name="lieu" value="<?php echo $ligne['lieu']; ?>" /> </td></tr>
			<tr><td>Date: </td><td><input type="text" id="date" name="date" onClick="ds_sh(this);" value="<?php echo $ligne['date']; ?>" /> </td></tr>
			
	        <tr><td>Description:</td><td><textarea id="description" name="description"><?php echo $ligne['description']; ?></textarea></td></tr>
       
        	<tr><td></td>
			<td><input type="submit" value="Enregistrer"  onClick ="verifierTout_Event()">
			</td></tr>
			
            
           
		
			</table>
        <table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
			<tr>
				<td id="ds_calclass"></td>
			</tr>
            
		</table>
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

