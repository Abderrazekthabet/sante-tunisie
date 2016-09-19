function affichInsc(test)
{
	if(test)
	{
	document.getElementById("tabsInsc").style.visibility="visible";
	document.getElementById("tabsInsc").style.height="150px";
	affichCnx(false);
	}
	else
	{
	document.getElementById("tabsInsc").style.visibility="hidden";
	document.getElementById("tabsInsc").style.height="0px";
	}
}

function affichCnx(test)
{
	if(test)
	{
	document.getElementById("tabsCnx").style.visibility="visible";
	document.getElementById("tabsCnx").style.height="150px";
	affichInsc(false);
	}
	else
	{
	document.getElementById("tabsCnx").style.visibility="hidden";
	document.getElementById("tabsCnx").style.height="0px";
	}
}

function hideTabs()
{
	affichInsc(false);
	affichCnx(false);	
}