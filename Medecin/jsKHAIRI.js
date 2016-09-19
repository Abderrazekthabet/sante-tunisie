function champsVide(){
	msg="";
	    if (window.document.form.nom.value=="")			{msg+="champ nom est vide \n";}	
		if (window.document.form.prenom.value=="")		{msg+="champ prenom est vide \n";}
		if (window.document.form.adresse.value=="")		{msg+="champ adresse est vide \n";}
		if (!((window.document.form.email.value.indexOf("@")>=0))|| !((window.document.form.email.value.indexOf(".")>=0))) 
	    {msg+="Verifier votre mail! \n";}
		if (window.document.form.telephone.value=="")	{msg+="champ telephone est vide \n";}
		if (window.document.form.fax.value=="")	        {msg+="champ fax est vide \n";}
		if (window.document.form.type.value=="")		{msg+="champ type est vide \n";}
		if (window.document.form.specialite.value=="")		{msg+="champ specialite est vide \n";}
		if (window.document.form.commentaire.value=="") {msg+="champ commentaire est vide \n";}
	    
   return msg;
	}
		
function telephone(){
	msg="";
	contenu=window.document.form.telephone.value;
		if  (isNaN(contenu)){
		msg+="caractere non numerique \n";		
		}
	if (contenu.length>8)
	msg+= "telephone doit etre min 8 entier \n";
 return msg;
	}
	function fax(){
	msg="";
	contenu=window.document.form.telephone.value;
		if  (isNaN(contenu)){
		msg+="caractere non numerique \n";		
		}
	if (contenu.length>8)
	msg+= "fax doit etre min 8 entier \n";
 return msg;
	}
function validation(){
	x= champsVide();
	y= telephone();
	
 if ((x=="") && (y=="")) {alert ("Votre formulaire est complet");}
  else alert(x+y);}		