<?php
include ("../config/db_info.php");
include ("config/message.php");
include ("config/medicament.php");
include ("config/visite.php");
$cnx = new Connexion();
$cnx->seConnecter();
$msg= new Message();
$medic = new Medicament();
$visite= new Visite();
session_start();

if(isset($_SESSION['login']) && isset($_SESSION['mdp']))
{
$type = $_SESSION['typeAdmin'];
$req_msg_affich = $msg->afficherNonLu();
$req_msg_lu = $msg->afficherLu();
$req_med_affich = $medic->afficher();
$nbre = $msg->returnNumberNonLu();
$nbre_msg = $msg->returnNumber();
$nbre_medics = $medic->nbreMedic();
$nbrePhar = $visite->getVisitePharmacie();

$req_articles = mysql_query("select * from articles where etat_admin='En attente';");
$req_evenements = mysql_query("select * from evenements where etat_admin='En attente';");
$req_comptes = mysql_query("select * from associations where etat_compte = 'En attente';");

//$MedVisTot = $visite->getNbreVisitesMedicamentsTotal();


?>
<html>
  
<head>
    <title>Panneau d'Administration | Associations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />

    <link rel="icon" type="image/ico" href="images/favicon.ico" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="other/netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/rickshaw.min.css">
    <link rel="stylesheet" href="css/bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/summernote.css">
    <link rel="stylesheet" href="css/summernote-bs3.css">
    <link rel="stylesheet" href="css/chosen.min.css">
    <link rel="stylesheet" href="css/chosen-bootstrap.css">
    <link rel="stylesheet" href="js/plugins/tabdrop/css/tabdrop.css">
    <link rel="stylesheet" href="css/morris.css">
    <link href="css/minoral.css" rel="stylesheet">
    <link href="css/pizza.css" rel="stylesheet"/>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="other/code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="other/google-code-prettify.googlecode.com/svn/loader/run_prettifyf793.js?lang=css&amp;skin=sons-of-obsidian"></script>
    <script src="js/plugins/jquery.nicescroll.min.js"></script>
    <script src="js/plugins/blockui/jquery.blockUI.js"></script>
    <script src="js/plugins/jquery.easypiechart.min.js"></script>
    <script src="js/plugins/jquery.animateNumbers.js"></script>
    <script src="js/plugins/flot/jquery.flot.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.time.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.selection.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.animator.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.orderBars.js"></script>
    <script src="js/plugins/rickshaw/raphael-min.js"></script> 
    <script src="js/plugins/rickshaw/d3.v2.js"></script>
    <script src="js/plugins/rickshaw/rickshaw.min.js"></script>
    <script src="js/plugins/skycons/skycons.js"></script>
    <script src="js/plugins/jquery.sparkline.min.js"></script>
    <script src="js/plugins/summernote/summernote.min.js"></script>
    <script src="js/plugins/chosen/chosen.jquery.min.js"></script>
    <script src="js/plugins/tabdrop/bootstrap-tabdrop.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/minoral.js"></script>
    <script src="js/visites.js"></script>
    <script src="js/pizza.js"></script>
    <script src="js/pie.js"></script>
    <script src="js/snap.svg.js"></script>


  </head>

  <body class="cyan-scheme" style="padding-left:20%; padding-right:20%; padding-top: 5%" onload="visitesPharm()" >
    <!-- Preloader -->
    <div class="mask"><div id="loader"></div></div>
    <!--/Preloader -->

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Make page fluid -->
      <div class="row">

<div>

<h1>Gestion de Comptes</h1>
<div class="tile-body nopadding">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Photo de profil</th>
                <th>Id</th>
                <th>Nom</th>
                <th>Adresse mail</th>
                <th>Description</th>
				<th></th>
            </tr>
        </thead>
        <tbody>
    <?php while ($resultat_comptes = mysql_fetch_array($req_comptes))
    {
	$nom = $resultat_comptes['nom'];
	$description = $resultat_comptes['description'];
	$adresse_mail = $resultat_comptes['adresse_mail'];
	$chemin_image= $resultat_comptes['chemin_image'];
	$id = $resultat_comptes['idAssociation']; 
	?>
        <tr>
			<td><img src="../Association/images/<?php echo $chemin_image?>" width="128px"/></td>	
			<td><?php echo $id?></td>
			<td><?php echo $nom ?></td>
            <td><?php echo $adresse_mail?></td>
			<td><?php echo $description?></td>
            <td><a href="config/association/validerCompte.php?id=<?php echo $id ?>" id="validateRow" class="btn btn-red btn-xs delete-row">Valider</a></td>
            <td><a href="config/association/supprimerCompte.php?id=<?php echo $id ?>" class="btn btn-cyan btn-xs" >Supprimer</a></td>
        </tr> 
        </tbody>
    <?php } ?>
    </table>
 
</div>


<h1>Gestion d'Articles</h1>
<div class="tile-body nopadding">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Sujet</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    <?php while ($resultat_art = mysql_fetch_array($req_articles))
    {
	$id = $resultat_art['idArticle'];
	$titre = $resultat_art['titre'];
	$sujet = $resultat_art['sujet']; ?>
        <tr>
            <td><?php echo $id?></td>
            <td><?php echo $titre?></td>
            <td><?php echo $sujet?></td>
            <td><a href="config/association/validerArticle.php?id=<?php echo $id ?>" id="deleteRow" class="btn btn-red btn-xs delete-row">Valider</a></td>
            <td><a href="config/association/supprimerArticle.php?id=<?php echo $id?>" class="btn btn-cyan btn-xs" >Supprimer</a></td>
        </tr> 
        </tbody>
    <?php } ?>
    </table>
 
</div>

<h1>Gestion d'Evénements</h1>
<div class="tile-body nopadding">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Hôte</th>
				<th>Thème</th>
				<th>Lieu</th>
                <th>Description</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    <?php while ($resultat_event = mysql_fetch_array($req_evenements))
    {
	$id = $resultat_event['idEvenement'];
	$description = $resultat_event['description'];
	$date = $resultat_event['date'];
	$lieu = $resultat_event['lieu'];
	$theme= $resultat_event['theme'];
	$hote = $resultat_event['hote']; ?>
        <tr>
            <td><?php echo $id?></td>
            <td><?php echo $hote?></td>
			<td><?php echo $theme?></td>
            <td><?php echo $lieu?></td>
			<td><?php echo $description ?></td>
            <td><?php echo $date?></td>
            <td><a href="config/association/validerEvenement.php?id=<?php echo $id ?>" id="deleteRow" class="btn btn-red btn-xs delete-row">Validé</a></td>
            <td><a href="config/association/supprimerEvenement.php?id=<?php echo $id?>" class="btn btn-cyan btn-xs" >Supprimer</a></td>
        </tr> 
        </tbody>
    <?php } ?>
    </table>
 
</div>
        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
           <!-- Branding -->
          <div class="navbar-header col-lg-3">
            <a class="navbar-brand" href="index.php">
              <strong>Panneau</strong> <span class="divider vertical"></span> Admin
            </a>
          </div>
          <!-- Branding end -->


          <!-- .nav-collapse -->
          <div class="navbar-collapse">

            <!-- Content collapsing at 768px to sidebar -->
            <div class="collapsing-content">

              <!-- Quick Actions -->
              <ul class="nav navbar-nav">
                <li class="divided">
                  <a href="Associations.php" class="page-refresh"><i class="fa fa-refresh"></i></a>
                  <span class="divider vertical"></span>
                </li>

                <li class="dropdown quick-action notifications">
                  <a class="dropdown-toggle button" href="inbox.php">
                    <i class="fa fa-envelope"></i>
                  <?php
                        while($rez = mysql_fetch_array($nbre_msg))
                        {
                            $nb = $rez['nbre'];
                        ?>
                    <span class="overlay-label orange"><?php echo $nb; ?></span>
                  </a>
                     <?php                        }?>
                </li>

                 <li class="dropdown quick-action notifications">
                  <a class="dropdown-toggle button" href="index.php">
                    <i class="fa fa-ambulance"></i>
                      <?php
                        while($rez = mysql_fetch_array($nbre_medics))
                        {
                            $nb = $rez['nbre'];
                        ?>
                    <span class="overlay-label orange"><?php echo $nb; ?></span>
                  </a>
                     <?php                        }?>
                </li>
                  <li class="dropdown quick-action notifications">
                  <a class="dropdown-toggle button" href="partenaire.php">
                    <i class="fa fa-star"></i>
                    <span class="overlay-label orange"></span>
                  </a>
                </li>

                  <li class="dropdown quick-action notifications">
                  <a class="dropdown-toggle button" href="Patient.php">
                    <i class="fa fa-users"></i>
                    <span class="overlay-label orange"></span>
                  </a>
                </li>

                  <li class="dropdown quick-action notifications">
                  <a class="dropdown-toggle button" href="Associations.php">
                    <i class="fa fa-heart"></i>
                    <span class="overlay-label orange"></span>
                  </a>
                </li>

              </ul>

              <!-- Quick Actions end -->

              <!-- User Controls -->
              <div class="user-controls">
                <ul>

                 
                  <li class="dropdown messages">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php
                        while($rez = mysql_fetch_array($nbre))
                        {
                            $nb = $rez['nbre'];
                        ?>
                      <span class="badge badge-red" id="user-new-messages"> <?php echo $nb;?> </span> Salut <strong> <?php echo $_SESSION['login'];?> </strong> <i class="fa fa-angle-down"></i>
                        
                    </a>
                    <div class="profile-photo">
                     <img src="images/21_years.jpg" alt="" />
                    </div>
                    <ul class="dropdown-menu wide arrow cyan nopadding">
                      <li><h1>Vous avez <strong><?php echo $nb;?></strong> nouveau(x) messages</h1></li>
                    <?php                        }?>
                        
                    <?php while ($resultat = mysql_fetch_array($req_msg_affich))
                    {
                    $nom = $resultat['nom'];
                    $email = $resultat['email'];
                    $message = $resultat['message'];
                    $id = $resultat['id']; ?>
                        <li>
                        <a class="cyan" href="inbox.php">
                          <div class="fa fa-envelope fa-3x">
                          </div>
                          <div class="message-info">
                            <span class="sender"><strong><?php echo $nom; ?></strong></span>
                            <span class="time">(<?php echo $email;?>)</span>
                            <div class="message-content"><?php echo $message;?></div>
                          </div>
                        </a>
                      </li>                    
                    <?php } ?>
                      
                    
                    </ul>
                  </li>
                <li class="dropdown settings">
                    <a class="dropdown-toggle options" data-toggle="dropdown" href="#">
                      <i class="fa fa-cog"></i>
                    </a>
                    
                    <ul class="dropdown-menu arrow animated fadeInDown">
                      <li>
                        <a href="config/authentification.php?log=deco"><i class="fa fa-power-off"></i> Deconnexion</a>
                      </li>
                    </ul>
                    </li>
              </div>
              <!-- User Controls end -->
            </div>

            <!-- /Content collapsing at 768px to sidebar -->
			</div>
          <!--/.nav-collapse -->
        </div>
        <!-- Fixed navbar end -->

    
</div>
        </div>
</body>
    <script>
        Pizza.init();
    </script>
</html>


<?php

}
else
{
    echo "<meta charset=UTF-8 />";
    echo "<b><center>Vous n'etes pas connecté!</center><b>";
    header("refresh:0;url=../../../login.html");
}

?>