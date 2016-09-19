<?php
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

$requete1="SELECT auteur FROM `articles`";
$resultat1=mysql_query($requete1);

$i=0;
$at_nom[$i]="";

while($ligne1=mysql_fetch_array($resultat1))
{
$at_nom[$i]=$ligne1['auteur'];
$i++;
}

// get the q parameter from URL
$q=$_REQUEST["q"]; $hint="";

// lookup all hints from array if $q is different from ""
if ($q !== "")
  { $q=strtolower($q); $len=strlen($q);
    foreach($at_nom as $name)
    { if (stristr($q, substr($name,0,$len)))
      { if ($hint==="" )
        { $hint=$name; }
        else
        { $hint .="<br>"."$name"; }
      }
    }
  }

// Output "no suggestion" if no hint were found
// or output the correct values
echo $hint==="" ? "Pas de suggestion" : $hint;

?>