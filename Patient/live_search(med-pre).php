<?php
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();



$requete2="SELECT distinct prenom FROM `medecin`";
$resultat2=mysql_query($requete2);


$k=0;
$doc_prenom[$k]="";

while($ligne2 =mysql_fetch_array($resultat2))
{
$doc_prenom[$k]=$ligne2['prenom'];
$k++;
}

// get the q parameter from URL
$q=$_REQUEST["q"]; $hint="";

// lookup all hints from array if $q is different from ""
if ($q !== "")
  { $q=strtolower($q); $len=strlen($q);
    foreach($doc_prenom as $name)
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