<?php
/************************************************
	Connection avec BD & INCLUDES
************************************************/
include("../../config/db_info.php");
include("../../Panneau_Admin/config/visite.php");
$cnx = new Connexion();
$cnx->seConnecter();
$visite= new Visite();

/************************************************
	Fonction de recherche
************************************************/

// Affichage
$html = '';
$html .= '<li class="result" onClick="setDivMedic(ID)" id="ID">';
$html .= '<table> <tr>';
$html .= '<td width="80px" style="vertical-align:middle;">' ;
$html .= '<input type="hidden" value="categ" id="CategMedID"/> <input type="hidden" value="visites" id="VisitesMedID"/> <input type="hidden" value="nom" id="NomMedID"/> <input type="hidden" value="ImageMedic" id="ImgMedID"/> <textarea style="display: none;" id="DescMedID">DescMedic</textarea>';
$html .= '<img src="ImageMedic" width="64px"/></td>';
$html .= '<td style="vertical-align:middle;">NomMedic<br>';
$html .= 'CatMedic</td>';
$html .= '</tr></table>';
$html .= '</li>';

// recuperer la chaine a recherche
$chaine_rech =  $_POST['query'];

// Verifier la longueur de la chaine
if (strlen($chaine_rech) >= 1 && $chaine_rech !== ' ') {
	$query = 'SELECT * FROM medicaments WHERE nom LIKE "%'.$chaine_rech.'%" OR categorie LIKE "%'.$chaine_rech.'%"';
    if (strlen($chaine_rech) == 1)
        {
            $visite->setVisitePharmacie();
        }
	$result = mysql_query($query);
	while($results = mysql_fetch_array($result)) {
		$result_array[] = $results;
	}

	if (isset($result_array)) {
		foreach ($result_array as $result) {

			$affich_cat = preg_replace("/".$chaine_rech."/i", "<span style='color:#F2600B;'>".$chaine_rech."</span>", $result['categorie']);
			$affich_nom = preg_replace("/".$chaine_rech."/i", "<span style='color:#F2600B;'>".$chaine_rech."</span>", $result['nom']);
			$affich_image = "../Panneau_Admin/images/medics/".$result['chemin_image'];
            $id=$result['id'];
            $desc=$result['description'];
            $consult=$result['visites'];

			// Inserer Nom
			$output = str_replace('NomMedic', $affich_nom, $html);
            $output = str_replace('nom', $result['nom'], $output);
            $output = str_replace('categ', $result['categorie'], $output);

			// Inserer Categorie
			$output = str_replace('CatMedic', $affich_cat, $output);

			// Inserer chemin image
			$output = str_replace('ImageMedic', $affich_image, $output);

            // Inserer ID
            $output = str_replace('ID', $id, $output);

            //Inserer Description
            $output = str_replace('DescMedic', $desc, $output);


            //Inserer Nombre
            $output = str_replace('visites', $consult, $output);

            //$visite->setVisiteMedicament($id);

			// Sortie
			echo($output);
		}
	}else{

		// Pas de resultats
		$output = str_replace('ImageMedic', 'images/oups.jpg', $html);
		$output = str_replace('NomMedic', '<b>Désolé </b>', $output);
		$output = str_replace('CatMedic', 'Aucun Résultat trouvé', $output);

		// Output
		echo($output);
	}
}

?>