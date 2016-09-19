<?php
    session_start();
    if(isset($_SESSION['login']))
    {
        $_SESSION['nom'] = $_SESSION['login'];
    }
        
?>

<html>
	<head>
    
		<title>Portail Santé Tunisie | Accueil</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<meta name="description" content="Ce portail de sante est destiné au public Tunisien, en quête de services médicaux en ligne." />
		<meta name="keywords" content="santé médicaments tunisie medecin patient pharmacies online" />

		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700|Open+Sans+Condensed:700" rel="stylesheet" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="css/jquery-ui-1.9.2.custom.css"/>
		<script src="js/jquery-1.8.3.js"></script>
        <script src="js/jquery-ui-1.9.2.custom.js"></script>
        <script src="js/perso.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <script src="js/intro.js"></script>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/minoral.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/icon.png">

        <link href="css/introjs.css" rel="stylesheet"/>
        


        <script>
            $(document).ready(function ()
            {

                $("#tabsCnx").hide();
                $("#tabsInsc").hide();

                $("#btnInsc").click(function ()
                {
                    $("#tabsCnx").hide();
                });

                $('#btnCnx').click(function ()
                {
                    $('#tabsCnx').slideToggle('slow');
                    $('html,body').animate({ scrollTop: $(tabsCnx).offset().top }, 'slow');
                });
            });

            function auto()
            {
                var x = document.getElementById("controlExec").value;
                if (x == "")
                {
                    introJs().start();
                } 
            }

	</script>
     <script>
		$(function() {
		$( "#tabsInsc" ).tabs();
		});
		
		$(function() {
		$( "#tabsCnx" ).tabs();
		});
		
		 $(function() {
		$( "#datepicker" ).datepicker();
		});
	</script>
        
		<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.titleBarOverlaid=1"></script>
		<noscript>
			<link rel="stylesheet" href="css/5grid/core.css" />
			<link rel="stylesheet" href="css/5grid/core-desktop.css" />
			<link rel="stylesheet" href="css/5grid/core-1200px.css" />
			<link rel="stylesheet" href="css/5grid/core-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->
	</head>
	<!--<body class="homepage" onLoad="hideTabs()">-->
    <body class="homepage" onload="auto();">       
		<!-- Nav -->
			<nav id="nav" class="mobileUI-site-nav">
				<ul data-step="1" data-intro="Barre de Navigation du site." data-position='bottom-middle-aligned' id="liste">
					<li class="current_page_item" data-step="2" data-intro="Accueil" data-position='down'><a href="index.php">Accueil</a></li>
					<li><a href="#apropos">Qui somme nous</a></li>
					<!--<li><a href="#categories">Plan du site</a></li>-->
					<li><a href="contact.php" data-step="3" data-intro="Pour contacter l'administrateur du site." data-position='down'>Contact</a></li>
                    <li><a href="Portail_pharmacie/index.php" data-step="4" data-intro="Portail pharmaceutique de recherche de médicaments et de pharmacies." data-position='down'>Pharmacies</a></li>
                   
                            <!--SESSION LOGIN BEGIN-->
                             <?php if(isset($_SESSION['nom'])) 
                                    { ?>
                            <span class="session_membre">
                                
                            <?php echo $_SESSION['nom']; ?> 

                                         <!--SESSION LOGIN ASSOCIATION-->
                                        <?php 
                                        if(isset($_SESSION['type']) && $_SESSION['type'] == "association" ) 
                                        { ?>
                                            <li class="dropdown settings " >
                                                <span class="dropdown-menu animated fadeInDown session_membre">
                                                    <li><a href="Association/profil.php"><i class="fa fa-user" style="margin-right: 5px"></i> Profil</a>   </li>                                                 
                                                    <li><a href="config/logout.php"><i class="fa fa-power-off" style="margin-right: 5px"></i> Deconnexion</a></li>
                                                </span>
                                            </li>
                                        <?php }  ?>

                                        <!--SESSION LOGIN MEDECIN-->
                                        <?php 
                                        if(isset($_SESSION['type']) && $_SESSION['type'] == "medecin" ) 
                                        { ?>
                                            <li class="dropdown settings">
                                                <span class="dropdown-menu animated fadeInDown session_membre">
                                                    <li><a href="Medecin/profile.php?id_medecin=<?php echo $_SESSION['id'] ; ?>"><i class="fa fa-user" style="margin-right: 5px"></i> Profil</a></li>                                                
                                                    <li><a href="config/logout.php"><i class="fa fa-power-off" style="margin-right: 5px"></i> Deconnexion</a></li>
                                                </span>
                                            </li>
                                        <?php }  ?>

                                        <!--SESSION LOGIN PATIENT-->
                                        <?php 
                                        if(isset($_SESSION['type']) && $_SESSION['type'] == "patient" )
                                        { ?>
                                            <li class="dropdown settings">                                               
                                                <span class="dropdown-menu animated fadeInDown session_membre">
                                                    <li><a href="Patient/profile.php?id=<?php echo $_SESSION['id'] ; ?>"><i class="fa fa-user" style="margin-right: 5px"></i> Profil</a></li>                                                    
                                                    <li><a href="config/logout.php"><i class="fa fa-power-off" style="margin-right: 5px"></i> Deconnexion</a></li>
                                                </span>
                                            </li>
                                        <?php }  ?>

                                        <!--SESSION LOGIN ADMIN-->                                            
                                        <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "admin" ) { ?>
                                        
                                            <li class="dropdown settings " >
                                                <span class="dropdown-menu animated fadeInDown session_membre">
                                                    <li><a href="Panneau_Admin/index.php"><i class="fa fa-wrench" ></i> Panneau </a></li>
                                                    <li><a href="config/logout.php"><i class="fa fa-power-off" ></i> Deconnexion</a></li>
                                                </span>
                                            </li> 
                                        <?php } ?>
                        
                                
                            </span>
                            <?php } ?>
                            <!--SESSION LOGIN END-->

				</ul>
			</nav>
		<!-- /Nav -->

		<!-- Header -->
			<header id="header">
				<div class="logo">
					<div>
						<a href="index.php" class="mobileUI-site-name" id="titre"> <img src="images/logo_site.png" /> </a>
					</div>
				</div>
			</header>
		<!-- /Header -->
        

		<!-- Banner -->
			<div id="banner-wrapper">
				<section id="banner">
					<h2>Bienvenue au Portail Santé de la Tunisie</h2>

                    <!-- TAB CONNEX & INSCRI-->
                    <?php if (empty($_SESSION['nom'])) {?>
                    <div class="actions">

                        <a class="button button-big" id="btnInsc" href="inscription.html" data-step="5" data-intro="Se connecter au site, et accéder à votre profil, si vous êtes inscrit." data-position='down'>Inscription</a>
						<h3 class="button button-big" id="btnCnx" style="cursor:pointer;" data-step="6" data-intro="S'inscrire au site vous permet de créer votre profil, que ce soit, médecin, patient ou association." data-position='down'>Connexion </h3>
                        
                   
                       <div id="tabsCnx">
                            <ul>
                            <li><a href="#tabs-1">Medecin</a></li>
                            <li><a href="#tabs-2">Patient</a></li>
                            <li><a href="#tabs-3">Association</a></li>
                            </ul>
                            <div id="tabs-1">
                            <form method="post" action="Medecin/login.php">
                            <input type="hidden" value="med" name="typeAuth">
                            <div style="position:relative;">
                                <table>
                                    <tr>
                                        <td width="150px" align="left">
                                        Email:&nbsp;&nbsp;
                                        </td>
                                        <td>
                                        <input type="text" name="username" required/>
                                        </td>
                     <td rowspan=2><input type="submit" class="button button-small" style="padding-left:15px;cursor: pointer;" value="Se Connecter"/></td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                        Mot de Passe:&nbsp;&nbsp;
                                        </td> 
                                        <td>
                                        <input type="password" name="pwd" required/>
                                        </td>
                                    </tr>
                                </table>
                
                        
                              </div>
                              
                              	<!--<div class="button_Cnx">
                                	<button class="button button-small" style="padding-left:15px">Se Connecter</button>
                                
                            	</div>-->
                            </form>
                            </div>
                            <div id="tabs-2">
                            <form method="post" action="Patient/login_patient.php">
                            <div style="position:relative;">
                                <table>
                                    <tr>
                                        <td width="150px" align="left">
                                        Email:&nbsp;&nbsp;
                                        </td>
                                        <td>
                                        <input type="text" name="username" required/>
                                        </td>
                       <td rowspan=2><input type="submit" class="button button-small" style="padding-left:15px;cursor: pointer;" value="Se Connecter"/>  </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                        Mot de Passe:&nbsp;&nbsp; 
                                        </td> 
                                        <td>
                                        <input type="password" name="pwd" required/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            </form>
                            </div>
                            
                            <div id="tabs-3">
                            <form method="post" action="Association/php/log_in.php">
                       
                            <!--<input type="hidden" value="assoc" name="typeAuth">-->
                            <div style="position:relative;">
                            <table>
                                    <tr>
                                        <td width="150px" align="left">
                                        Email:
                                        </td>
                                        <td>
                                        <input type="text" name="mail" required/>
                                        </td>
                  <td rowspan=2><input type="submit" class="button button-small" style="padding-left:15px;cursor: pointer;" value="Se Connecter"/> </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                        Mot de Passe:
                                        </td> 
                                        <td>
                                        <input type="password" name="mdp" required/>
                                        </td>
                                    </tr>
                                </table>
                           
                                </div>
                            </form>
                            </div>
                       </div>
					</div>
                    <?php } ?>
                <!-- FIN TAB CONNEX & INSCRI-->

				</section>
			</div>
		<!-- /Banner -->

		<!-- Footer -->
			<footer id="footer" class="5grid-layout">
				<div class="row">
					<div class="12u">

						<!-- Contact -->
							<section >
								<h2 class="major" id="apropos"><span>Qui sommes nous</span></h2>
								<ul class="contact" data-step="7" data-intro="Pour nous suivre sur les réseaux sociaux." data-position='down'>
									<li><a href="https://www.facebook.com/pages/Portail-Sant%C3%A9-Tunisie/248180938702913" class="facebook">Facebook</a></li>
									<li><a href="http://twitter.com/" class="twitter">Twitter</a></li>
									<li><a href="http://linkedin.com/" class="linkedin">LinkedIn</a></li>
									<li><a href="https://plus.google.com/" class="googleplus">Google+</a></li>
								</ul>
							</section>
						<!-- /Contact -->
					
					</div>
				</div>
				<div class="row">

					<!-- Copyright -->
						<div id="copyright">
							&copy; 2014 YMIR Prod
						</div>
					<!-- /Copyright -->
                    <br><br>

                    <!-- ESPACE WEBMASTER-->
                    <h4 id="panneau"><span align="center"> <a href="./Panneau_Admin/login.html" target="_blank"> <i> Espace Webmaster</i> </a></span></h4>
                    <input type="hidden" id="controlExec" value="<?php if (isset($_SESSION['nom'])) echo $_SESSION['nom'] ; ?>" />
				</div>
			</footer>
		<!-- /Footer -->
	</body>
</html>