<?php
    session_start();
    if(isset($_SESSION['login']))
    {
        $_SESSION['nom'] = $_SESSION['login'];
    }
        
?>

<html>
	<head>
    
		<title>Portail Santé Tunisie | Contact</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<meta name="description" content="Ce portail de sante est destiné au public Tunisien, en quête de services médicaux en ligne." />
		<meta name="keywords" content="santé médicaments tunisie medecin patient pharmacies online" />
 
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700|Open+Sans+Condensed:700" rel="stylesheet" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="css/jquery-ui-1.9.2.custom.css"/>
		<script src="js/jquery-1.8.3.js"></script>
        <script src="js/jquery-ui-1.9.2.custom.js"></script>
        <script src="js/perso.js"></script>
		<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.titleBarOverlaid=1"></script>
        <script src="js/custom.js"></script>

		<noscript>
			<link rel="stylesheet" href="css/5grid/core.css" />
			<link rel="stylesheet" href="css/5grid/core-desktop.css" />
			<link rel="stylesheet" href="css/5grid/core-1200px.css" />
			<link rel="stylesheet" href="css/5grid/core-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/minoral.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/icon.png">
        <script src="js/bootstrap.min.js"></script>

	</head>
	<body class="homepage">

		<!-- Header -->
			<header id="header">
				<div class="logo">
					<div>
						<h1><a href="index.html" class="mobileUI-site-name" id="titre"><img src="images/logo_site.png"/></a></h1>
					</div>
				</div>
			</header>
		<!-- /Header -->

		<!-- Nav -->
			<nav id="nav" class="mobileUI-site-nav">
				<ul>
					<li><a href="index.php">Accueil</a></li>
					<li><a href="#apropos2">Qui somme nous</a></li>
					<li class="current_page_item"><a href="contact.php">Contact</a></li>
                    <li><a href="Portail_pharmacie/index.php">Pharmacies</a></li>
                   
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
                                                    <li><a href="../config/logout.php"><i class="fa fa-power-off" style="margin-right: 5px"></i> Deconnexion</a></li>
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
                                                <span class="dropdown-menu animated fadeInDown">
                                                    <li><a href="Patient/profil.php"><i class="fa fa-user" style="margin-right: 5px"></i> Profil</a></li>                                                    
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
		
		<!-- Main -->
			<div id="main-wrapper" style="width:100%;">
				<div id="main" class="5grid-layout">
					<div class="row">
						<!--<div class="9u mobileUI-main-content">--> <!-- Espace Publicitaire -->
													
								<!-- Content -->
						
									<article class="is-page-content">
									
										<header>
											<h2 align="center">Contacter le webmaster du site</h2>
											<script language="javascript">
											var sa_email_id = '15812-65c2b';var sa_sent_text = 'Merci de nous avoir contacté. Nous nous engageons à répondre dans les plus brefs délais';
                                            </script>
                                            
											<script language="javascript" src="js/contact.js"></script>
                                            <div id="sa_contactdiv" align="center">
                                            <form name=sa_htmlform style="margin:0px" action="classes/messagerie.php" method="POST">
                                                <table>
                                                <?php if (empty($_SESSION['type'])) { ?><tr><td>Nom & Prénom: <span style="color:#D70000">*</span><br><input name="name" type="text" autofocus required data-errormessage-value-missing="Veuillez saisir ce champs" data-errormessage-type-mismatch="Invalid!"/></td></tr>
                                                <?php }
                                                      else { ?> <input type="hidden" name="name" value="<?php echo $_SESSION['nom']; ?>" /> <?php                                                      } ?>
 <tr><td>Email: <span style="color:#D70000">*</span><br><input type="email" name="email" required data-errormessage-value-missing="Veuillez saisir ce champs"/></td></tr>
                                                <tr><td>Message: <span style="color:#D70000">*</span><br><textarea name="message" cols="42" rows="9" required data-errormessage-value-missing="Veuillez saisir ce champs"></textarea></td></tr>
                                                <tr><td><input type="submit" value="Envoyer" style="font-weight:bold"><span>      </span><input type="reset" value="Vider les champs" style="font-weight:bold"></td></tr>
                                                </table>
                                            </form>
                                            </div>
										</header>

									</article>

								<!-- /Content -->
								
							
						<!--</div>-->
						
					</div>
				</div>
			</div>
		<!-- /Main ['

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

                    <!-- ESPACE WEBMASTER-->
                    <h4 id="panneau"><span align="center"> <a href="./Panneau_Admin/login.html" target="_blank" > <i> Espace Webmaster</i> </a></span></h4>

				</div>
			</footer>
		<!-- /Footer -->

	</body>
</html>