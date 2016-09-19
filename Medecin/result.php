<?php
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();
if(isset($_GET['nomRech'])){
$nomRech = $_GET['nomRech'];
$q=array('nomRech'=>$nomRech.'%');
$sql='SELECT nom,prenom FROM consultation WHERE nom like :nomRech or prenom like :nomRech';
$req=$cnx->prepare($sql);
$req->execute($q);
$count=$req->rowCount($sql);
if($count ==1){
$while($result=$req->fetch(PDO::FETCH_OBJ)){
 echo "nom :".$result->nom."<br/>prenom:".$result->prenom;
 }}else{echo "Aucun resultat pour :".$nomRech;}}?>