<?php
$titreRecupere=$_POST['titre'];
$sujetRecupere=$_POST['sujet'];
$auteurRecupere=$_POST['auteur'];
$contenuRecupere=$_POST['contenu'];
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
$id_medecin=$_GET['id_medecin'];
$requet="INSERT INTO `articles` (`idArticle`, `titre`, `sujet`,`auteur`,`contenu`)VALUES (NULL, '$titreRecupere', '$sujetRecupere', '$auteurRecupere', '$contenuRecupere')";
if(mysql_query($requet))
         {
          header("location:ajouter_articles1.php?id_medecin=".$id_medecin);
         }else
           header("location:afficher_articles.php?id_medecin=".$id_medecin);
?>