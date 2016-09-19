<?php
function seConnecter(){
$host="localhost";
$user="root";
$pwd="";
$nomdb="khairi";

$lien=mysql_connect($host,$user,$pwd);
mysql_select_db($nomdb,$lien);
}
?>