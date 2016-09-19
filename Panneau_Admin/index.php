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
$req_msg_affich = $msg->afficherNonLu();
$req_msg_lu = $msg->afficherLu();
$req_med_affich = $medic->afficher();
$nbre = $msg->returnNumberNonLu();
$nbre_msg = $msg->returnNumber();
$nbre_medics = $medic->nbreMedic();
$nbrePhar = $visite->getVisitePharmacie();
$type = $_SESSION['type'];

/* Statistiques Users */

$nbre_patients = $visite->getNbrePatients();
$nbre_medecins = $visite->getNbreMedecins();
$nbre_associations = $visite->getNbreAssociations();

$nbre_users = $nbre_patients + $nbre_medecins + $nbre_associations;

$categories = array("Anésthésiants","Sédatifs","Antidepresseurs","Antibiotiques","Antiviraux","Laxatifs","Anti-inflamatoires","Stupéfiants");
$gouvernorats = array("Ariana","Béja","Ben Arous","Bizerte","Gabés","Gafsa","Jendouba","Kairouan","Kasserine","Kébili","Le Kef","Mahdia","La Manouba","Médenine","Monastir","Nabeul","Sfax","Sidi Bouzid","Siliana","Sousse","Tataouine","Tozeur","Tunis","Zaghouan");
?>
<html>
  
<head>
    <title>Panneau d'Administration | Accueil </title>
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
    <script src="js/plugins/flot/jquery.flot.categories.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.stack.min.js"></script>
    <script src="js/plugins/graphtable/jquery.graphTable-0.3.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/rickshaw/raphael-min.js"></script> 
    <script src="js/plugins/rickshaw/d3.v2.js"></script>
    <script src="js/plugins/rickshaw/rickshaw.min.js"></script>
    <script src="js/plugins/skycons/skycons.js"></script>
    <script src="js/plugins/jquery.sparkline.min.js"></script>
    <script src="js/plugins/summernote/summernote.min.js"></script>
    <script src="js/plugins/chosen/chosen.jquery.min.js"></script>
    <script src="js/plugins/tabdrop/bootstrap-tabdrop.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/minoral.js"></script>
    <script src="js/visites.js"></script>
    <!--
    <script src="js/pizza.js"></script>
    <script src="js/pie.js"></script>
    <script src="js/snap.svg.js"></script>
    -->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
	$(function () {

    /*Stats Medicaments */

    
        $('#meds').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '<h2>Statistiques de Visite par Médicament</h2>'
        },
        tooltip: {
    	    pointFormat: 'Pourcentage: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Statistiques de Visite par Médicament',
			data: [
			<?php while ($resultat_med = mysql_fetch_array($req_med_affich))
                    {
	                $nom = $resultat_med['nom'];
                    $id = $resultat_med['id'];
                    $MedVis = $visite->getNbreVisitesMedicament($id);
                    $pour = mysql_fetch_array($MedVis);

    echo "['".$nom."', ".$pour['pourcentage'].".00"."],";
    }
    ?> ]
        }]
    });

        $('#categs').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '<h2>Statistiques de Medicaments par Catégorie</h2>'
        },
        tooltip: {
    	    pointFormat: 'Pourcentage: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Statistiques de Medicaments par Catégorie',
			data: [['Anésthésiants',<?php echo $visite->getNbreCategories($categories[0]); ?>],['Sédatifs',<?php echo $visite->getNbreCategories($categories[1]); ?>],['Antidepresseurs',<?php echo $visite->getNbreCategories($categories[2]); ?>],['Antibiotiques',<?php echo $visite->getNbreCategories($categories[3]); ?>],['Antiviraux',<?php echo $visite->getNbreCategories($categories[4]); ?>],['Laxatifs',<?php echo $visite->getNbreCategories($categories[5]); ?>],['Anti-inflamatoires',<?php echo $visite->getNbreCategories($categories[6]); ?>],['Stupéfiants',<?php echo $visite->getNbreCategories($categories[7]); ?>]]
        }]
    });

        /* Stats Utilisateurs */

        $('#users').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '<h2>Statistiques de Visite par type de Compte</h2>'
        },
        tooltip: {
    	    pointFormat: 'Pourcentage: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Statistiques de Visite par Type de Compte',
			data: [['Medecins',<?php echo $nbre_medecins; ?>],['Associations',<?php echo $nbre_associations; ?>],['Patients',<?php echo $nbre_patients; ?>]]
        }]
    });

        /* Stats Patients */

        $('#patGouv').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '<h2>Comptes de Patients par Gouvernorat</h2>'
        },
        tooltip: {
    	    pointFormat: 'Pourcentage: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Comptes de Patients par Gouvernorat',
			data: [['<?php echo $gouvernorats[0] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[0]) ; ?>],
                    ['<?php echo $gouvernorats[1] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[1]) ; ?>],
                    ['<?php echo $gouvernorats[2] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[2]) ; ?>],
                    ['<?php echo $gouvernorats[3] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[3]) ; ?>],
                    ['<?php echo $gouvernorats[4] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[4]) ; ?>],
                    ['<?php echo $gouvernorats[5] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[5]) ; ?>],
                    ['<?php echo $gouvernorats[6] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[6]) ; ?>],
                    ['<?php echo $gouvernorats[7] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[7]) ; ?>],
                    ['<?php echo $gouvernorats[8] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[8]) ; ?>],
                    ['<?php echo $gouvernorats[9] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[9]) ; ?>],
                    ['<?php echo $gouvernorats[10] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[10]) ; ?>],
                    ['<?php echo $gouvernorats[11] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[11]) ; ?>],
                    ['<?php echo $gouvernorats[12] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[12]) ; ?>],
                    ['<?php echo $gouvernorats[13] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[13]) ; ?>],
                    ['<?php echo $gouvernorats[14] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[14]) ; ?>],
                    ['<?php echo $gouvernorats[15] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[15]) ; ?>],
                    ['<?php echo $gouvernorats[16] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[16]) ; ?>],
                    ['<?php echo $gouvernorats[17] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[17]); ?>],
                    ['<?php echo $gouvernorats[18] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[18]); ?>],
                    ['<?php echo $gouvernorats[19] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[19]); ?>],
                    ['<?php echo $gouvernorats[20] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[20]); ?>],
                    ['<?php echo $gouvernorats[21] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[21]); ?>],
                    ['<?php echo $gouvernorats[22] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[22]); ?>],
                    ['<?php echo $gouvernorats[23] ; ?>',<?php echo $visite->getGouvernoratsPatients($gouvernorats[23]); ?>]]
        }]
    });

        $('#patAge').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '<h2>Comptes de Patients par Age</h2>'
        },
        tooltip: {
    	    pointFormat: 'Pourcentage: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Comptes de Patients par Tranche Age',
            data:[['18-24 ans',<?php echo $visite->getAgePatients("jeune"); ?>],['25-50 ans',<?php echo $visite->getAgePatients("adulte"); ?>],['50+ ans',<?php echo $visite->getAgePatients("seniors"); ?>]]

        }]
    });

        /* Stats Medecins */

        $('#medGouv').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '<h2>Comptes de Medecins par Gouvernorat</h2>'
        },
        tooltip: {
    	    pointFormat: 'Pourcentage: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Comptes de Medecins par Gouvernorat',
			data: [['<?php echo $gouvernorats[0] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[0]) ; ?>],['<?php echo $gouvernorats[1] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[1]) ; ?>],['<?php echo $gouvernorats[2] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[2]) ; ?>],['<?php echo $gouvernorats[3] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[3]) ; ?>],['<?php echo $gouvernorats[4] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[4]) ; ?>],['<?php echo $gouvernorats[5] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[5]) ; ?>],['<?php echo $gouvernorats[6] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[6]) ; ?>],['<?php echo $gouvernorats[7] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[7]) ; ?>],['<?php echo $gouvernorats[8] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[8]) ; ?>],['<?php echo $gouvernorats[9] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[9]) ; ?>],['<?php echo $gouvernorats[10] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[10]) ; ?>],['<?php echo $gouvernorats[11] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[11]) ; ?>],['<?php echo $gouvernorats[12] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[12]) ; ?>],['<?php echo $gouvernorats[13] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[13]) ; ?>],['<?php echo $gouvernorats[14] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[14]) ; ?>],['<?php echo $gouvernorats[15] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[15]) ; ?>],['<?php echo $gouvernorats[16] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[16]) ; ?>],['<?php echo $gouvernorats[17] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[17]); ?>],['<?php echo $gouvernorats[18] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[18]); ?>],['<?php echo $gouvernorats[19] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[19]); ?>],['<?php echo $gouvernorats[20] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[20]); ?>],['<?php echo $gouvernorats[21] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[21]); ?>],['<?php echo $gouvernorats[22] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[22]); ?>],['<?php echo $gouvernorats[23] ; ?>',<?php echo $visite->getGouvernoratsMedecins($gouvernorats[23]); ?>]]
        }]
    });

        $('#medSpec').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '<h2>Comptes de Medecins par Spécialité</h2>'
        },
        tooltip: {
    	    pointFormat: 'Pourcentage: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Comptes de Medecins par Spécialité',
            data: [['Neurologue',<?php echo $visite->getSpecMedecin("Neurologue") ;?>],['Psychiatre',<?php echo $visite->getSpecMedecin("Psychiatre") ;?>],['Dentiste',<?php echo $visite->getSpecMedecin("Dentiste") ;?>],['Cardiologue',<?php echo $visite->getSpecMedecin("Cardiologue") ;?>],['Cancérologue',<?php echo $visite->getSpecMedecin("Cancérologue") ;?>],['Gynécologue',<?php echo $visite->getSpecMedecin("Gynécologue") ;?>]]

        }]
    });

        /* Stats Associations */

        $('#assoc').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '<h2>Comptes Associations par Type</h2>'
        },
        tooltip: {
    	    pointFormat: 'Pourcentage: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Comptes Associations par Type',
			data: [['Bien être',<?php echo $visite->getCategAssociations("Bien être") ; ?>],['Maladie',<?php echo $visite->getCategAssociations("Maladie") ; ?>],['Nutrition',<?php echo $visite->getCategAssociations("Nutrition") ; ?>],['Santé',<?php echo $visite->getCategAssociations("Santé") ; ?>]]
        }]
    });
        
        


});
		</script>

		<script src="js/highcharts.js"></script>
        <script src="js/exporting.js"></script>

        <script>
            $(document).ready(function ()
            {
                /*
                $("#meds").hide();
                $("#categs").hide();

                $("#users").hide();

                $("#patGouv").hide();
                $("#patAge").hide();

                $("#medGouv").hide();
                $("#medSpec").hide();

                $("#assoc").hide();
                */
                
                $('#medicaments').click(function ()
                {
                    $('#meds').slideToggle('slow');
                    $('#categs').slideToggle('slow');
                    $('html,body').animate({ scrollTop: $(meds).offset().bottom }, 'slow');
                });

                $('#utilisateurs').click(function ()
                {
                    $('#users').slideToggle('slow');
                    $('html,body').animate({ scrollTop: $(users).offset().bottom }, 'slow');
                });

                $('#patients').click(function ()
                {
                    $('#patGouv').slideToggle('slow');
                    $('#patAge').slideToggle('slow');
                    $('html,body').animate({ scrollTop: $(patGouv).offset().bottom }, 'slow');
                });

                $('#medecins').click(function ()
                {
                    $('#medGouv').slideToggle('slow');
                    $('#medSpec').slideToggle('slow');
                    $('html,body').animate({ scrollTop: $(medGouv).offset().bottom }, 'slow');
                });

                $('#associations').click(function ()
                {
                    $('#assoc').slideToggle('slow');
                    $('html,body').animate({ scrollTop: $(assoc).offset().bottom }, 'slow');
                });

            });
        </script>

  </head>

  <body class="cyan-scheme" style="padding-left:5%; padding-right:5%; padding-top: 5%">
    <!-- Preloader -->
    <div class="mask"><div id="loader"></div></div>
    <!--/Preloader -->

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Make page fluid -->
      <div class="row">
                <!--Statistiques-->
        <table style="width: 100%;" class="table table-hover greensea">
            <tr>
                <th><a href="#" id="medicaments" class="btn btn-success  delete-row">Medicaments</a></th>
                <td style="width: 48%;"><div id="meds" style="min-width: 400px; height: 400px; "></div></td>
                <td style="width: 3%;"></td>
                <td style="width: 48%;"><div id="categs" style="min-width: 400px; height: 400px; "></td>
            </tr>
            <tr>
                <th><a href="#" id="utilisateurs" class="btn btn-dutch delete-row">Utilisateurs</a></th>
                <td colspan="3"><div id="users" style="min-width: 400px; height: 400px; "></div></td>
            </tr>
            <tr>
                <th><a href="#" id="patients" class="btn btn-primary  delete-row">Patients</a></th>
                <td style="width: 48%;"><div id="patGouv" style="min-width: 400px; height: 400px; "></div></td>
                <td style="width: 3%;"></td>
                <td style="width: 48%;"><div id="patAge" style="min-width: 400px; height: 400px; "></td>
            </tr>
            <tr>
                <th><a href="#" id="medecins" class="btn btn-red  delete-row">Médecins</a></th>
                <td style="width: 48%;"><div id="medGouv" style="min-width: 400px; height: 400px; "></div></td>
                <td style="width: 3%;"></td>
                <td style="width: 48%;"><div id="medSpec" style="min-width: 400px; height: 400px; "></td>
            </tr>
            <tr>
                <th><a href="#" id="associations" class="btn btn-amethyst  delete-row">Associations</a></th>
                <td colspan="3"><div id="assoc" style="min-width: 400px; height: 400px; "></div></td>
            </tr>
                    
        </table>
        <!--Fin Statistiques-->

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
                  <a href="index.php" class="page-refresh"><i class="fa fa-refresh"></i></a>
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
                  <a class="dropdown-toggle button" href="Medicaments.php">
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