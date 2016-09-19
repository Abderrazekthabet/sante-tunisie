<?php
include("../../config/db_info.php");
include("../../Panneau_Admin/config/visite.php");
$cnx = new Connexion();
$cnx->seConnecter();
$visite= new Visite();

if(isset($_POST['query']))
{
    $nbre = $_POST['query'];
    $visite->setVisiteMedicament($nbre);
    $req = mysql_query("select visites from medicaments where id=$nbre");
    while($result = mysql_fetch_array($req))
    {
        echo $result['visites'];
    }
}

?>