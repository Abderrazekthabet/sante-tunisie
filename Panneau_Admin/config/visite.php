<?php

class Visite
{
    var $viste_global;
    var $visite_pharmacie;
    var $visite_membre;

    public function __construct()
    {
        $this->visite_global=0;
        $this->visite_pharmacie=0;
        $this->visite_membre=0;
    }

    public function setVisitePharmacie()
    {
        mysql_query("update visites set visite_pharmacie=visite_pharmacie+1");

    }

    public function getVisitePharmacie()
    {
        return mysql_query("select visite_pharmacie as nbrePharm from visites;");
    }

    public function setVisiteMedicament($id)
    {
        return mysql_query("update medicaments set visites=visites+1 where id=$id;");
    }

    public function getNbreVisitesMedicamentsTotal()
    {
        return mysql_query("select sum(visites) as SOMME from medicaments;");
    }

    public function getNbreVisitesMedicament($id)
    {
        $somme = "select sum(visites) from medicaments";
        return mysql_query("select round((visites/($somme))*100) as pourcentage from medicaments where id=$id;");
    }

    public function getNbrePatients()
    {
        $requete = mysql_query("select count(*) as nombre from patients;");
        $rez = mysql_fetch_array($requete);
        return $rez['nombre'];
    }

    public function getNbreMedecins()
    {
        $requete = mysql_query("select count(*) as nombre from medecin;");
        $rez = mysql_fetch_array($requete);
        return $rez['nombre'];
    }

    public function getNbreAssociations()
    {
        $requete = mysql_query("select count(*) as nombre from associations;");
        $rez = mysql_fetch_array($requete);
        return $rez['nombre'];
    }

    public function getNbreCategories($type)
    {
        $requete = mysql_query("select count(*) as nombre from medicaments where categorie='$type';");
        $rez = mysql_fetch_array($requete);
        return $rez['nombre'];
    }

    public function getGouvernoratsPatients($nom)
    {
        $requete = mysql_query("select count(*) as nombre from patients where gouvernorat='$nom';");
        $rez = mysql_fetch_array($requete);
        return $rez['nombre'];
    }

    public function getGouvernoratsMedecins($nom)
    {
        $requete = mysql_query("select count(*) as nombre from medecin where gouvernorat='$nom';");
        $rez = mysql_fetch_array($requete);
        return $rez['nombre'];
    }

    public function getAgePatients($tranche)
    {
        if ($tranche=="jeune")
        {
            $requete = mysql_query("SELECT count(*) as nombre from patients where round( DATEDIFF( sysdate( ) , STR_TO_DATE(date_naissance, '%Y-%m-%d') ) / 365.25 )>18 and round( DATEDIFF( sysdate( ) , STR_TO_DATE(date_naissance, '%Y-%m-%d') ) / 365.25 )<25 ");
            $rez = mysql_fetch_array($requete);
            return $rez['nombre'];
        }

        if ($tranche=="adulte")
        {
            $requete = mysql_query("SELECT count(*) as nombre from patients where round( DATEDIFF( sysdate( ) , STR_TO_DATE(date_naissance, '%Y-%m-%d') ) / 365.25 )>25 and round( DATEDIFF( sysdate( ) , STR_TO_DATE(date_naissance, '%Y-%m-%d') ) / 365.25 )<50 ");
            $rez = mysql_fetch_array($requete);
            return $rez['nombre'];
        }

        if ($tranche=="seniors")
        {
            $requete = mysql_query("SELECT count(*) as nombre from patients where round( DATEDIFF( sysdate( ) , STR_TO_DATE(date_naissance, '%Y-%m-%d') ) / 365.25 )>50 ");
            $rez = mysql_fetch_array($requete);
            return $rez['nombre'];
        }


    }

    public function getSpecMedecin($spec)
    {
        $requete = mysql_query("select count(*) as nombre from medecin where specialite='$spec';");
        $rez = mysql_fetch_array($requete);
        return $rez['nombre'];
    }

    public function getCategAssociations($categ)
    {
        $requete = mysql_query("select count(*) as nombre from associations where categorie='$categ';");
        $rez = mysql_fetch_array($requete);
        return $rez['nombre'];
    }
}
?>
