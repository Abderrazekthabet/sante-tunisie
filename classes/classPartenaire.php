<?php
    
class Partenaire
{
    var $nom;
    var $adresse;
    var $photo_profil;
    var $description;
    var $file;

    public function __construct()
    {
        $this->nom="";
        $this->adresse="";
        $this->photo_profil="";
        $this->description="";
        /*$this->article[];
        $this->images[];*/
    }

    public function authentification($username, $password)
    {
        if($requete_authent = mysql_query("select * from utilisateurs where login='$usr' AND mdp='$pwd' AND type='admin_part';"))
		{

			if ($rep=mysql_fetch_array($requete_authent))
			{
	            session_start();
                $_SESSION['login']=$usr;
                $_SESSION['mdp']=$pwd;
				header("refresh:0;url=../Partenaires/$username/index.php");
			}
			else
			{
				echo "<strong><center>Verifiez vos parametre de connexion </center> </strong>";
			}
		}
    }
    
    public function creerPage()
    {
        $codeIndex="<html xmlns=http://www.w3.org/1999/xhtml>
                            <head>
                            <meta http-equiv=Content-Type content=text/html; charset=utf-8 />
                            <title>$this->nom</title>
                            <meta name=description content=$this->description />
                            <link href=../css/style.css rel=stylesheet type=text/css />

                            </head>

                            <body>

	                            <div id=templatemo_menu_panel>
    	                            <div id=templatemo_menu_section>
                                        <ul>
                                            <li><a href=# class=current>Accueil</a></li>
                                            <li><a href=contact.php>Contact</a></li>                     
                                        </ul> 
		                            </div>
                                </div> <!-- end of menu -->


                            <div id=templatemo_header_content_container>
    
                                    <div id=templatemo_header_section>
                                        <div id=templatemo_title_section>
                                        $this->nom
                                        </div>
                                    </div> <!-- end of templatemo header panel -->
        
                                    <div id=templatemo_content>
                                        <div id=templatemo_content_left>
				
                                            <div class=templatemo_post>
                                                <div class=post_title>
                    	                            $this->nom
                    	                              <div class=post_info>
                    		                            <a href=# target=_blank>{{lien FB}}</a>, {{Date}}, à $this->adresse
	                                                </div>
                                                </div>
                    
                                                <div class=post_body>
                                                    <img src=../images/$this->photo_profil width=512px alt= />
                                                    <p> $this->description </p>
                      
                                                </div>

                                            </div> <!-- end of post -->

               
                
                                        </div> <!-- end of content left -->

        
                                        <div id=templatemo_content_right>
                                            <div class=templatemo_right_section>
                	                            <h2>Facebook</h2>
					                            <ul>

                                                </ul>  
                                            </div>
                         
                                            <div class=templatemo_right_section>
                	                            <h2>Archives</h2>
					                            <ul>
                                                    <li><a href=#>$this->nom</a></li>
                                                </ul>  
                                            </div>
                
                                             <div class=templatemo_right_section>
	                                            <h2>Popular Posts</h2>
                	                            <ul class=popular_post>	
                                                    <li><a href=#>$this->nom</a><br />Author 1 - Oct 14, 2048 <span class=comment>12 reponses</span></li>
                                                </ul>
                                            </div>

               
                                
                                        </div> <!-- end of right content -->
	                                </div> <!-- end of content -->
                                </div> <!-- end of content container -->

	                            <div id=templatemo_bottom_panel>
    	                            <div id=templatemo_bottom_section>
        
            
                                        <div class=templatemo_bottom_section_content>
                                            <h3>Certificats</h3>
                 
                                            <a href=http://validator.w3.org/check?uri=referer><img style=border:0;width:88px;height:31px src=http://www.w3.org/Icons/valid-xhtml10 alt=Valid XHTML 1.0 Transitional width=88 height=31 vspace=8 border=0 /></a>
                            <a href=http://jigsaw.w3.org/css-validator/check/referer><img style=border:0;width:88px;height:31px  src=http://jigsaw.w3.org/css-validator/images/vcss-blue alt=Valid CSS! vspace=8 border=0 /></a> 
                                        </div>
            
                                    </div> <!-- end of templatemo bottom section -->
                                </div> <!-- end of templatemo bottom panel -->
                            <div id=templatemo_footer_panel>
    	                            <div id=templatemo_footer_section>
			                            Copyright © <a href={{lien FB}}>$this->nom </a> | 
                                        by <a href=../../ target=_parent>YMIR Prod ©</a>
                                    </div>
                                </div>

                            </html>";
        $codeContact="<html xmlns=http://www.w3.org/1999/xhtml>
                            <head>
                            <meta http-equiv=Content-Type content=text/html; charset=utf-8 />
                            <title>$this->nom</title>
                            <meta name=description content=$this->description />
                            <link href=../css/style.css rel=stylesheet type=text/css />

                            </head>

                            <body>

	                            <div id=templatemo_menu_panel>
    	                            <div id=templatemo_menu_section>
                                        <ul>
                                            <li><a href=index.php >Accueil</a></li>
                                            <li><a href=contact.php class=current>Contact</a></li>                     
                                        </ul> 
		                            </div>
                                </div> <!-- end of menu -->


                            <div id=templatemo_header_content_container>
    
                                    <div id=templatemo_header_section>
                                        <div id=templatemo_title_section>
                                        $this->nom
                                        </div>
                                    </div> <!-- end of templatemo header panel -->
        
                                    <div id=templatemo_content>
                                        <div style=float: left; text-align: left;>
	                                            <h2>Formulaire de Contact</h2>
                                                <form method=POST action=../config/messagerie.php >
                                                <table>
                                                    <tr>
                                                        <td>Nom</td>
                                                        <td><input type=text name=nom required/></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><input type=text name=email required/></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Message</td>
                                                        <td><textarea cols=25 rows=8 name=message></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type=submit value=Envoyer></td>
                                                    </tr>
                                                 </table>
                                                 </form>
                                             </div>

        
                                        <div id=templatemo_content_right>
                                            <div class=templatemo_right_section>
                	                            <h2>Facebook</h2>
					                            <ul>

                                                </ul>  
                                            </div>
                         
                                            <div class=templatemo_right_section>
                	                            <h2>Archives</h2>
					                            <ul>
                                                    <li><a href=#>$this->nom</a></li>
                                                </ul>  
                                            </div>
                
                                             <div class=templatemo_right_section>
	                                            <h2>Popular Posts</h2>
                	                            <ul class=popular_post>	
                                                    <li><a href=# >$this->nom</a><br />Author 1 - Oct 14, 2048 <span class=comment>12 replies</span></li>
                                                </ul>
                                            </div>

               
                                
                                        </div> <!-- end of right content -->
	                                </div> <!-- end of content -->
                                </div> <!-- end of content container -->

	                            <div id=templatemo_bottom_panel>
    	                            <div id=templatemo_bottom_section>
        
            
                                        <div class=templatemo_bottom_section_content>
                                            <h3>Certificats</h3>
                 
                                            <a href=http://validator.w3.org/check?uri=referer><img style=border:0;width:88px;height:31px src=http://www.w3.org/Icons/valid-xhtml10 alt=Valid XHTML 1.0 Transitional width=88 height=31 vspace=8 border=0 /></a>
                            <a href=http://jigsaw.w3.org/css-validator/check/referer><img style=border:0;width:88px;height:31px  src=http://jigsaw.w3.org/css-validator/images/vcss-blue alt=Valid CSS! vspace=8 border=0 /></a> 
                                        </div>
            
                                    </div> <!-- end of templatemo bottom section -->
                                </div> <!-- end of templatemo bottom panel -->
                            <div id=templatemo_footer_panel>
    	                            <div id=templatemo_footer_section>
			                            Copyright © <a href={{lien FB}}>$this->nom </a> | 
                                        by <a href=../../ target=_parent>YMIR Prod ©</a>
                                    </div>
                                </div>

                            </html>";
        $fileIndex="index.php";
        $fileContact="contact.php";
        chdir("../../Partenaires");
        mkdir("$this->nom");
        chdir("$this->nom");
        $handler=fopen("$fileIndex",w);
        $handler2=fopen("$filContact",w);
        fwrite($handler, $codeIndex);
        fwrite($handler2, $codeContact);
        //header("location:../../Partenaires/$this->nom/$file");
        header("location:../partenaire.php");
        fclose($handler);
        fclose($handler2);
    }
    
    public function Ajouter()
    {
        $addPart = "INSERT into partenaires (id,nom, description,adresse, chemin_image) values (NULL, '$this->nom', '$this->description', '$this->adresse', '$this->photo_profil');";
        $createCredentials = "INSERT into utilisateur (id,login,mdp,type) values(NULL, '$this->nom', '$this->nom_123','admin_part');";
        if($addPart && $createCredentials)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
            
    }

    public function listePart()
    {
        return mysql_query("select * from partenaires");
    }
}

?>
