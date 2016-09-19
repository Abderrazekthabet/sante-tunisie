<?php
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$id_articles=$_GET['id_articles'];
$id_medecin=$_GET['id_medecin'];
$requete="delete from `articles` where idArticle='$id_articles'";
if(mysql_query($requete))
         {
          header("location:afficher_articles.php?id_medecin=".$id_medecin);
         }else
           header("location:afficher_articles.php?id_medecin=".$id_medecin);
?>