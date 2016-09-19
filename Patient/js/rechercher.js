

function recher_asso(){
        if(document.getElementById('type_asso').value!="categorie"){
                if(document.getElementById('nom_asso').value==""){
				alert("Indiquer le nom");
				  }
				  else document.recherche_association.submit();
          }

else if(document.getElementById('type_asso').value!="nom"){
       if(document.getElementById('categ_asso').value=="0"){
				alert("Verifier la categorie");
				  }
				  else document.recherche_association.submit();
}

}


function recher_eve(){
        if(document.getElementById('eve_day').value!="0" && document.getElementById('eve_month').value!="0" && document.getElementById('eve_year').value!="0")
		{
		document.recherche_evenement.submit();
		}
		else{alert("Vérifier votre date");}
}




function recher_article(){
        if(document.getElementById('type_article').value!="auteur"){
                if(document.getElementById('titre_article').value==""){
				alert("Vérifier le titre");
				  }
				  else document.recherche_article.submit();
          }

else if(document.getElementById('type_article').value!="nom"){
       if(document.getElementById('auteur_article').value=="0"){
				alert("Verifier le nom d'auteur");
				  }
				  else document.recherche_article.submit();
}

}


function recher_medecin(){
                 if(document.getElementById('type_medecin').value=="np"){
                     a=np();
					            if(a !=""){
								  alert(a);
								}else document.recherche_medecin.submit();
                     }
					 
				 if(document.getElementById('type_medecin').value=="s"){
                     a=sp();
					            if(a !=""){
								  alert(a);
								}else document.recherche_medecin.submit();
                     }

				 if(document.getElementById('type_medecin').value=="nps"){
                     a=np();
					 a=a+sp();
					            if(a !=""){
								  alert(a);
								}else document.recherche_medecin.submit();
                     }	 
}

function np(){
msg="";
if(document.getElementById('nom_medecin').value=="" && document.getElementById('prenom_medecin').value==""){
				msg="Verifier nom et prenom";
				  }
				  return msg;
}

function sp(){
msg="";
if(document.getElementById('sp_med').value=="0"){
				msg="Verifier la specialite";
				  }
				  return msg;
}
