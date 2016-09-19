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
$type = $_SESSION['type'];

$req_msg_affich = $msg->afficherNonLu();
$req_msg_lu = $msg->afficherLu();
$req_med_affich = $medic->afficher();
$nbre = $msg->returnNumberNonLu();
$nbre_msg = $msg->returnNumber();
$nbre_medics = $medic->nbreMedic();
$nbrePhar = $visite->getVisitePharmacie();

//$MedVisTot = $visite->getNbreVisitesMedicamentsTotal();


?>
<html>
  
<head>
    <title>Panneau d'Administration | Medicaments</title>
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

<h1>Gestion de Médicaments</h1>
<div class="tile-body nopadding">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Categorie</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    <?php while ($resultat_med = mysql_fetch_array($req_med_affich))
    {
	$nom = $resultat_med['nom'];
	$description = $resultat_med['description'];
	$categorie = $resultat_med['categorie'];
	$chemin_image= $resultat_med['chemin_image'];
	$id = $resultat_med['id']; ?>
        <tr>
            <td><img src="images/medics/<?php echo $chemin_image?>" width="128px"/></td>
            <td><?php echo $nom?></td><td><?php echo $description ?></td>
            <td><?php echo $categorie?></td>
            <td><a href="config/gestion_medic.php?supp=<?php echo $id ?>" id="deleteRow" class="btn btn-red btn-xs delete-row">Supprimer</a></td>
            <td><a href="Medicaments.php?modif=<?php echo $id?>" class="btn btn-cyan btn-xs" >Modifier</a></td>
        </tr> 
        </tbody>
    <?php } ?>
    </table>
 
</div>

<table width="100%">
    <tr>
        <td width="50%">
            <fieldset ><legend>Ajouter un médicament</legend>
	            <form method="post" action="config/gestion_medic.php" enctype="multipart/form-data">
    	            <input type="hidden"name="ajout" value="sdfsdf">
                    Nom : <input type="text" name="nom" required/><br><br>
                    Description : <textarea name="description" cols="42" rows="9" required> </textarea><br><br>
                    Categorie : <input type="text" name="categorie" required/><br><br>
                    <table>
                        <tr>
                            <td>
                                <input type="file" name="image_medic" id="imge"/>
                            </td>
                            <td>
                                <input type="submit" value="Ajouter" class="btn btn-green btn-s"/><br>
                            </td>
                        </tr>
                    </table>
        
                </form>
            </fieldset>
        </td>
        <td width="50%">
            <?php
            if(isset($_GET['modif']))
            {
            $ident = $_GET['modif'];
            $requete = $medic->afficher_unique($ident);
            while($rez = mysql_fetch_array($requete))
            {
            ?>
            <fieldset ><legend>Modifier un médicament</legend>
	            <form method="post" action="config/gestion_medic.php" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $ident;?>" name="modif">
    	            Nom : <input value=<?php echo $rez['nom']?> type="text" name="nom" required/><br><br>
                    Description : <textarea name="description" cols="42" rows="9" required><?php echo $rez['description'] ;?> </textarea><br><br> 
                    Categorie : <input value=<?php echo $rez['categorie']?> type="text" name="categorie" required/><br><br>
                    <table>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" value="Modifier" class="btn btn-green btn-s"/><br>
                            </td>
                        </tr>
                    </table>
        
                </form>
            </fieldset>
            <?php            } }
            else
            {
            ?>
            <fieldset><legend>Modifier un médicament</legend>
                <h4>Selectionnez un medicament à modifier</h4>  
            <?php }?>
        </td>
    </tr>



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
                  <a href="Medicaments.php" class="page-refresh"><i class="fa fa-refresh"></i></a>
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