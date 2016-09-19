
function modif(){
msg=test_email();
msg=msg+"\n"+test_mdp();
msg=msg+"\n"+test_cin();
msg=msg+"\n"+test_phone();
msg=msg+"\n"+test_ville();
/*if(msg !="\n\n\n\n")
alert(msg);
else*/
document.parametres_patient.submit();
}


function test_email(){
msg=".";
var x=document.getElementById('email').value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  msg="Addresse e-mail non valide";
  }
  return msg;
}



function test_mdp(){
msg=".";
if(document.getElementById('password').value.length < 5)
{
msg=msg+"\n"+"Mot de passe de (5 ou plus) caractères";
}
return msg;
}




function test_cin()
{
  msg=".";
if(document.getElementById('cin').value.length!= 8)
{
msg=msg+"\n"+"Ecrire votre CIN avec 8 chiffres";
}
if(isNaN(document.getElementById('cin').value))
{
msg=msg+"\n"+"Votre CIN doit etre numérique";
}
return msg;
}

function test_phone()
{
  msg=".";
if(document.getElementById('tel').value.length!= 8)
{
msg=msg+"\n"+"Ecrire votre N° téléphone avec 8 chiffres";
}
if(isNaN(document.getElementById('tel').value))
{
msg=msg+"\n"+"Votre N° téléphone doit etre numérique";
}
return msg;
}

function test_date(){
 msg=".";
if(document.getElementById('date').value=="0000-00-00" ||document.getElementById('date').length != 10){
msg=msg+"\n"+"Vérifier votre date naissance";
}
return msg;
}

function test_ville(){
 msg=".";
if(document.getElementById('ville').value==0){
msg=msg+"\n"+"Vérifier votre gouvernorat";
}
return msg;
}



function aj_agenda(){
if(document.getElementById('agenda_day').value==0 && document.getElementById('agenda_month').value==0 && document.getElementById('agenda_year').value==0){
alert("Vérifier le date");
}else document.ajouter_agenda.submit();
}