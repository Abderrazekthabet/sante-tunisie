<?php
/************************************************
	Connection avec BS
************************************************/
include ("../../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

/************************************************
	Fonction de recherche
************************************************/

// Affichage
$html = '';
$html .= '<a href=""><li class="result" >';
$html .= '<table> <tr>';
$html .= '<td width="80px" style="vertical-align:middle;"><img src="ImageMedic" width="64px"/></td>';
$html .= '<td style="vertical-align:middle;">NomMedic<br>';
$html .= 'CatMedic</td>';
$html .= '</tr></table>';
$html .= '</li></a>';

// recuperer la chaine a recherche
$chaine_rech =  $_POST['query'];

// Verifier la longueur de la chaine
if (strlen($chaine_rech) >= 1 && $chaine_rech !== ' ') {
	$query = 'SELECT * FROM medicaments WHERE nom LIKE "%'.$chaine_rech.'%" OR categorie LIKE "%'.$chaine_rech.'%"';

	$result = mysql_query($query);
	while($results = mysql_fetch_array($result)) {
		$result_array[] = $results;
	}

	if (isset($result_array)) {
		foreach ($result_array as $result) {

			$affich_cat = preg_replace("/".$chaine_rech."/i", "<b class='highlight'>".$chaine_rech."</b>", $result['categorie']);
			$affich_nom = preg_replace("/".$chaine_rech."/i", "<b class='highlight'>".$chaine_rech."</b>", $result['nom']);
			$affich_image = $result['chemin_image'];

			// Inserer Nom
			$output = str_replace('NomMedic', $affich_nom, $html);

			// Inserer Categorie
			$output = str_replace('CatMedic', $affich_cat, $output);

			// Inserer chemin image
			$output = str_replace('ImageMedic', $affich_image, $output);
			
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