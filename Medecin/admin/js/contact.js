var sa_params='';

function sa_contactform()
{
	var sa_frm=document.sa_htmlform;
	for(i=0; i<sa_frm.elements.length; i++)
	{
		var sa_el=sa_frm.elements[i];
		
		if(sa_frm.elements[i].nom)
		{	
			sa_params+='&'+sa_frm.elements[i].nom+'='+encodeURIComponent(sa_frm.elements[i].value);
		}
	
	if(!sa_el.value && sa_el.getAttribute('required')=='true')
	{
		alert('Verifiez les champs saisies');
		sa_el.focus();
		return false;
	}
}

var s = document.createElement('script');
s.setAttribute('type','text/javascript');
s.setAttribute('src','postform.js');
document.body.appendChild(s);
return false;
}
function sa_contactsent()
{
	if(typeof sa_sent_text=='undefined')
	{
		sa_sent_text='Merci de nous avoir contacté. Nous nous engageons à répondre dans les plus brefs délais.';
	}
document.getElementById('sa_contactdiv').innerHTML=sa_sent_text+'<br><br>Formulaire de contact par &copy; 2014 YMIR Prod';
}