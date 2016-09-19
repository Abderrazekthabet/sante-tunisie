<?php
    session_start();
    if(isset($_SESSION['login']))
    {
        $_SESSION['nom'] = $_SESSION['login'];
    }

    $temps = intval(date("H"));
        
?>

<html>
	<head>
    
		<title>Portail Santé Tunisie | Pharmacies</title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Ce portail pharmaceutiques est destiné au public Tunisien, en quête de services pharmaceutiques en ligne." />

		<meta name="keywords" content="médicaments tunisie pharmacies online geolocalisation" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700|Open+Sans+Condensed:700" rel="stylesheet" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="css/jquery-ui-1.9.2.custom.css"/>
		<script src="js/jquery-1.8.3.js"></script>
        <script src="js/jquery-ui-1.9.2.custom.js"></script>
        <script src="js/perso.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/intro.js"></script>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/minoral.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/icon.png">
        <script src="js/bootstrap.min.js"></script>

        
		<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.titleBarOverlaid=1"></script>
		<noscript>
			<link rel="stylesheet" href="css/5grid/core.css" />
			<link rel="stylesheet" href="css/5grid/core-desktop.css" />
			<link rel="stylesheet" href="css/5grid/core-1200px.css" />
			<link rel="stylesheet" href="css/5grid/core-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
            <link rel="stylesheet" href="css/introjs.css"/>
		</noscript>

        <script>

            $(document).ready(function ()
            {
                $('#pharmacie').hide();
                $('#medicament').hide();
                $('#btnPharm').click(function ()
                {
                    $('#pharmacie').slideToggle('slow');
                    $('#medicament').slideUp();
                    document.getElementById("banner-wrapper").style.backgroundImage = 'url("images/pharmacie.jpg")';
                    $('html,body').animate({ scrollTop: $(pharmacie).offset().top }, 'slow');

                });

                $('#btnMed').click(function ()
                {
                    $('#medicament').slideToggle('slow');
                    $('#pharmacie').slideUp();
                    document.getElementById("banner-wrapper").style.backgroundImage = 'url("images/medicaments.jpg")';
                    $('html,body').animate({ scrollTop: $(medicament).offset().top }, 'slow');


                });

            });

            

        </script>

        <script type="text/javascript">
            function test()
            {
                //alert(window.location.search);
                introJs().start();
                if (RegExp('multipage', 'qui').test(window.location.search))
                {
                    
                }
            }
        </script>

	</head>
    <body class="homepage" onload="test();">       
		<!-- Nav -->
			<nav id="nav" class="mobileUI-site-nav">
				<ul>
					<li><a href="../index.php">Accueil</a></li>
					<li><a href="#apropos">Qui somme nous</a></li>
					<li><a href="../contact.php">Contact</a></li>
                    <li class="current_page_item"><a href="index.php" >Pharmacies</a></li>
                   
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
                                                    <li><a href="../Association/profil.php"><i class="fa fa-user" style="margin-right: 5px"></i> Profil</a>   </li>                                                 
                                                    <li><a href="../Association/php/log_out.php"><i class="fa fa-power-off" style="margin-right: 5px"></i> Deconnexion</a></li>
                                                </span>
                                            </li>
                                        <?php }  ?>

                                        <!--SESSION LOGIN MEDECIN-->
                                        <?php 
                                        if(isset($_SESSION['type']) && $_SESSION['type'] == "medecin" ) 
                                        { ?>
                                            <li class="dropdown settings">
                                                <span class="dropdown-menu animated fadeInDown session_membre">
                                                    <li><a href="../Medecin/profile.php?id_medecin=<?php echo $_SESSION['id'] ; ?>"><i class="fa fa-user" style="margin-right: 5px"></i> Profil</a></li>                                                
                                                    <li><a href="../config/logout.php"><i class="fa fa-power-off" style="margin-right: 5px"></i> Deconnexion</a></li>
                                                </span>
                                            </li>
                                        <?php }  ?>

                                        <!--SESSION LOGIN PATIENT-->
                                        <?php 
                                        if(isset($_SESSION['type']) && $_SESSION['type'] == "patient" )
                                        { ?>
                                            <li class="dropdown settings">                                               
                                                <span class="dropdown-menu animated fadeInDown session_membre">
                                                    <li><a href="../Patient/profile.php?id=<?php echo $_SESSION['id'] ; ?>"><i class="fa fa-user" style="margin-right: 5px"></i> Profil</a></li>                                                    
                                                    <li><a href="../config/logout.php"><i class="fa fa-power-off" style="margin-right: 5px"></i> Deconnexion</a></li>
                                                </span>
                                            </li>
                                        <?php }  ?>

                                        <!--SESSION LOGIN ADMIN-->                                            
                                        <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "admin" ) { ?>
                                        
                                            <li class="dropdown settings " >
                                                <span class="dropdown-menu animated fadeInDown session_membre">
                                                    <li><a href="../Panneau_Admin/index.php"><i class="fa fa-wrench" ></i> Panneau </a></li>
                                                    <li><a href="../config/logout.php"><i class="fa fa-power-off" ></i> Deconnexion</a></li>
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
						<a href="../index.php" class="mobileUI-site-name" id="titre"> <img src="images/logo_site.png" /> </a>
					</div>
				</div>
			</header>
		<!-- /Header -->
        

		<!-- Banner -->
			<div id="banner-wrapper">
				<section id="banner">
					<h2>Bienvenue au Portail Medical & Pharmaceutique</h2>

                    <!-- TAB pharmacies & medics-->
                    <div class="actions" data-step="1" data-intro="Another step.">

                        <h3 class="button button-big" id="btnPharm" style="cursor:pointer;" >Je cherche une pharmacie</h3>
						<h3 class="button button-big" id="btnMed" style="cursor:pointer;">Je cherche un médicament </h3>
                        
                   
					</div>

                <!-- FIN TAB pharmacies & medics-->

				</section>
			</div>

		<!-- /Banner -->

        <!-- Main -->

				<div id="main" class="5grid-layout" >
					<div class="row">
						<div class="12u mobileUI-main-content">
							<div class="content">
							
								<!-- Content -->
						
									<div class="is-page-content">

                                        <div id="pharmacie">
                                            <?php /*if ($temps>7 && $temps<19 ) { */ ?>
                                            <iframe 
                                                src="https://mapsengine.google.com/map/u/0/embed?mid=zBNFXXzXIWc0.kLywVsgiacEY" 
                                                width="640" 
                                                height="480">
                                            </iframe>
                                             
                                            <?php /*} else echo "lol"; */ ?>

                                        </div>
                                        <div id="medicament">
                                            
                                            <div id="rechForm">
                                                <h2>Je cherche un médicament</h2>
                                                <h3>(Saisir le nom ou la catégorie du médicament)</h3>
                                                <!-- Main Input -->
                                                <div class="REZ">
                                                    <img class="icon" alt="" src="images/blank.png"></img>
                                                    <input type="text" id="search" autocomplete="off"/>
                                                <!-- Show Results -->
                                                    <h3 id="results-text">Résultat(s) pour  <span id="search-string"></span></h3>
                                                    <ul id="results"></ul>
                                                </div>
                                            </div>
                                            <div id="affichRech">
                                                <header>
											        <h2 id="nomMedic"></h2>
											        <span class="byline">Categorie : <span id="categMedic" style="color: #ff6a00;"></span></span>
											        <ul class="meta">
												        <li class="fa fa-eye" id="VisitesMed"></li>
											        </ul>
										        </header>
											        <span><img src="" alt="" id="imgMedic" width="256px"/></span>
											        <p id="descMedic">
												        
											        </p>
                                            </div>
                                             
                                            
                                        </div>

									</div>

								<!-- /Content -->
								
							</div>
						</div>
					</div>
				</div>

		<!-- /Main -->

		<!-- Footer -->
			<footer id="footer" class="5grid-layout">
				<div class="row">
					<div class="12u">

						<!-- Contact -->
							<section>
								<h2 class="major" id="apropos"><span>Qui sommes nous</span></h2>
								<ul class="contact">
									<li><a href="https://facebook.com/" class="facebook">Facebook</a></li>
									<li><a href="http://twitter.com/" class="twitter">Twitter</a></li>
									<li><a href="http://n33.co/" class="rss">RSS</a></li>
									<li><a href="http://dribbble.com/" class="dribbble">Dribbble</a></li>
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
                    <h4 id="panneau"><span align="center"> <a href="../Panneau_Admin/login.html" target="_blank" > <i> Espace Webmaster</i> </a></span></h4>
                   <center> <?php /* echo "@IP " . $_SERVER['REMOTE_ADDR'] ; */ ?></center>
				</div> 
			</footer>
		<!-- /Footer -->
	</body>
</html>