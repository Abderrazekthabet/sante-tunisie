<?php
/************************************************
	The Search PHP File
************************************************/


/************************************************
	MySQL Connect
************************************************/
include("../config/db_info.php");
$cnx = new Connexion();
$cnx->seConnecter();

/************************************************
	Search Functionality
************************************************/

// Define Output HTML Formating
$html = '';
$html .= '<li class="result">';
$html .= '<table> <tr>';
$html .= '<td width="80px" style="vertical-align:middle;"><img src="div_tableau" width="64px"/></td>';
$html .= '<td style="vertical-align:middle;"><h3>nameString</h3>';
$html .= '<h4>functionString</h4></td>';
$html .= '</tr></table>';
$html .= '</li>';

// Get Search
$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);

// Check Length More Than One Character
if (strlen($search_string) >= 1 && $search_string !== ' ') {
	// Build Query
	$query = 'SELECT * FROM medicaments WHERE nom LIKE "%'.$search_string.'%" OR categorie LIKE "%'.$search_string.'%"';

	// Do Search
	$result = mysql_query($query);
	while($results = mysql_fetch_array($result)) {
		$result_array[] = $results;
	}

	// Check If We Have Results
	if (isset($result_array)) {
		foreach ($result_array as $result) {

			// Format Output Strings And Hightlight Matches
			$display_function = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['categorie']);
			$display_name = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['nom']);
			$display_url = "../".$result['chemin_image'];

			// Insert Name
			$output = str_replace('nameString', $display_name, $html);

			// Insert Function
			$output = str_replace('functionString', $display_function, $output);

			// Insert URL
			$output = str_replace('div_tableau', $display_url, $output);

			// Output
			echo($output);
		}
	}else{

		// Format No Results Output
		$output = str_replace('div_tableau', 'images/oups.jpg', $html);
		$output = str_replace('nameString', '<b>Aucun Résultat trouvé</b>', $output);
		$output = str_replace('functionString', 'Désolé :(', $output);

		// Output
		echo($output);
	}
}


/*
// Build Function List (Insert All Functions Into DB - From PHP)

// Compile Functions Array
$functions = get_defined_functions();
$functions = $functions['internal'];

// Loop, Format and Insert
foreach ($functions as $function) {
	$function_name = str_replace("_", " ", $function);
	$function_name = ucwords($function_name);

	$query = '';
	$query = 'INSERT INTO search SET id = "", function = "'.$function.'", name = "'.$function_name.'"';

	$tutorial_db->query($query);
}
*/
?>