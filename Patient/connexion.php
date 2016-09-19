<?php

function seconnecter(){
$host="localhost";
$user="root";
$pwd="";
$nomdb="pfc";
$lien=mysql_connect($host,$user,$pwd);
mysql_select_db($nomdb,$lien);}

function sedeconnecter(){
mysql_close();
}
?>