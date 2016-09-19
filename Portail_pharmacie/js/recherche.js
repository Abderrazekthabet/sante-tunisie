function chercherEndroit()
{
		var place = document.getElementById("depart").value;
		var url = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAPctD2O-vDXsTHMnDfx4ZCZpXhY_S7c5U &q="+place+"";
		document.getElementById("map").setAttribute('src',url);
}
