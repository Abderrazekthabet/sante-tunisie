function test_login(){
msg="";
var x=document.getElementById('email').value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  msg="Addresse e-mail non valide";
  }
  return msg;
}

function test_password(){
msg="";
if(document.getElementById('password').value.length < 5)
{
msg=msg+"\n"+"Mot de passe de (5 ou plus) caractères";
}
return msg;
}

function login(){
msg=test_login();
msg=msg+"\n"+test_password();
if(msg !="\n")
alert(msg);
else
document.login_patient.submit();
}

function insc(){
msg=test_email();
msg=msg+"\n"+test_cemail();
msg=msg+"\n"+test_mdp();
msg=msg+"\n"+test_cmdp();
msg=msg+"\n"+test_cin();
msg=msg+"\n"+test_phone();
msg=msg+"\n"+test_date();
msg=msg+"\n"+test_ville();
if(msg !="\n\n\n\n\n\n\n")
alert(msg);
else
document.formulaire_patient.submit();
}






function test_email(){
msg="";
var x=document.getElementById('email1').value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  msg="Addresse e-mail non valide";
  }
  return msg;
}

function test_cemail(){
msg="";
if(document.getElementById('cemail').value != document.getElementById('email1').value){
msg=msg+"\n"+"Email non identique";
}
return msg;
}

function test_mdp(){
msg="";
if(document.getElementById('password1').value.length < 5)
{
msg=msg+"\n"+"Mot de passe de (5 ou plus) caractères";
}
return msg;
}

function test_cmdp(){
msg="";
if(document.getElementById('cpassword').value != document.getElementById('password1').value){
msg=msg+"\n"+"Mot de passe non identique";
}
return msg;
}


function test_cin()
{
  msg="";
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
  msg="";
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
 msg="";
if(document.getElementById('day').value==0 || document.getElementById('month').value==0 || document.getElementById('year').value==0){
msg=msg+"\n"+"Vérifier votre date naissance";
}
return msg;
}

function test_ville(){
 msg="";
if(document.getElementById('ville').value==0){
msg=msg+"\n"+"Vérifier votre gouvernorat";
}
return msg;
}