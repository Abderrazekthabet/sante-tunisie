
function verifierNumerique(x){		

	var sous = /[^A-z]/g;
	if (x.match(sous) == null) return true;
	else return false;
	
}

function verifierChampsVds_Article(){
    var titre = document.getElementById('titre');
    var sujet = document.getElementById('sujet');
    var article = document.getElementById('article');
	if( titre.value == '') titre.style.border='1px solid red';
	if( titre.value != '') titre.style.border='1px solid #006';
	if( sujet.value== '') sujet.style.border='1px solid red';
	if( sujet.value!= '') sujet.style.border = '1px solid #006';
	if( article.value== '' || article.value == '<center><b>Ajoutez quelques Mots !!</b></center>') document.getElementById('articleDIV').innerHTML = "<center><b>Ajoutez quelques Mots !!</b></center>";
	//alert(articleDIV.innerHTML);
	if( article.value!= '') article.style.border = '1px solid #006';
	if ( (titre.value != '') && (sujet.value!= '') && (article != ''))
	{
        return true;
	}
	return false;

}

function verifierTout_Article(){
    var titre = document.getElementById('titre');
    var sujet = document.getElementById('sujet');
    var problemCount = 0;
	//alert(document.getElementById('article').value);
    /********			Verifier champs vides  		***********/
    if (!verifierChampsVds_Article()){
            problemCount++;
    }

    	/********			Verifier Titre  		***********/
	if(!(verifierNumerique(titre.value)))
	{
		titre.style.border='1px solid red';
		problemCount++;
	}
	if (verifierNumerique(titre.value) && (titre.value != ''))
	{
		titre.style.border='1px solid #006';
	}

        	/********			Verifier Sujet  		***********/
	if(!(verifierNumerique(sujet.value)))
	{
		sujet.style.border='1px solid red';
		problemCount++;
	}
	if (verifierNumerique(sujet.value) && (sujet.value != ''))
	{
		sujet.style.border='1px solid #006';
	}

    if (problemCount != 0) return false;
	if (problemCount == 0) document.getElementById('form').submit();

}


function CheckAll(){
   
    if (document.getElementById('tous').checked == 1) {
        $("#etudiant").attr('disabled','disabled');
        $("#chercheur").attr('disabled','disabled');
        $("#entreprise").attr('disabled','disabled');
        $("#professionnel").attr('disabled','disabled');
        $("#medias").attr('disabled','disabled');
    }
    else {
        $("#etudiant").removeAttr('disabled');
        $("#chercheur").removeAttr('disabled');
        $("#entreprise").removeAttr('disabled');
        $("#professionnel").removeAttr('disabled');
        $("#medias").removeAttr('disabled');
    }

}

function verifierPubic(){
    var tous = document.getElementById('tous');
    var etudiant = document.getElementById('etudiant');
    var chercheur = document.getElementById('chercheur');
    var entreprise = document.getElementById('entreprise');
    var professionnel = document.getElementById('professionnel');
    var medias = document.getElementById('medias');
    if(tous.checked || etudiant.checked || chercheur.checked || entreprise.checked || professionnel.checked || medias.checked) return true;
    else {
        $("#checkcheck").effect("shake");
        return false;
    }
}
function verifierChampsVds_Event(){

	nom = document.getElementById('nom');
	theme = document.getElementById('theme');
	date = document.getElementById('date');
	lieu = document.getElementById('lieu');
	description = document.getElementById('description');
	VerifPublic = verifierPubic();

	if( nom.value== '') nom.style.border='1px solid red';
	if( nom.value!= '') nom.style.border='1px solid #006';
	if( theme.value== '') theme.style.border='1px solid red';
	if( theme.value!= '') theme.style.border='1px solid #006';
	
	
	if( date.value== '') date.style.border='1px solid red';
	if( date.value!= '') date.style.border='1px solid #006';
	if( lieu.value== '') lieu.style.border='1px solid red';
	if( lieu.value!= '') lieu.style.border='1px solid #006';
	
	if( description.value == '') description.style.border='1px solid red';
	if( description.value != '') description.style.border='1px solid #006';
	if ( (nom.value != '') && (theme.value!= '') && (VerifPublic) && (date.value!= '') && (lieu.value!= '') && (description.value!= ''))
	{
		return true;
	}
	return false;

}

function verifierTout_Event(){
	nom = document.getElementById('nom');
	theme = document.getElementById('theme');
	publicVise = document.getElementById('labelPublic');
	lieu = document.getElementById('lieu');
	description = document.getElementById('description');
    
    	var problemCount = 0;
	/********			Verifier champs vides  		***********/		
	if (!verifierChampsVds_Event()) problemCount++;
    
    
    
    if (problemCount != 0) return false;
	if (problemCount == 0) document.getElementById('form').submit();


}

