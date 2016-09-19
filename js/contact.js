var sa_params='';

function sa_contactform()
{
	var sa_frm=document.sa_htmlform;
	for(i=0; i<sa_frm.elements.length; i++)
	{
		var sa_el=sa_frm.elements[i];
		
		if(sa_frm.elements[i].name)
		{	
			sa_params+='&'+sa_frm.elements[i].name+'='+encodeURIComponent(sa_frm.elements[i].value);
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

(function() {
	function getInputHandler(inputCallback) {
		return function(event) {
			if (event.target.type.toUpperCase() === "RADIO") {
				var radioGroup = document.getElementsByName(event.target.name)
				for (i = 0; i < radioGroup.length; i++) {
					radioGroup[i].setCustomValidity("");
				}
			} else {
				event.target.setCustomValidity("");
			}
			if (inputCallback) {
				inputCallback(event);
			}
			event.target.checkValidity();
		};
	}

	function getInvalidHandler(invalidCallback) {
		return function(event) {
			var element = event.target;
			var validity = element.validity;
			var suffix = validity.valueMissing ? "value-missing" : validity.typeMismatch ? "type-mismatch" : validity.patternMismatch ? "pattern-mismatch" : validity.tooLong ? "too-long" : validity.rangeUnderflow ? "range-underflow" : validity.rangeOverflow ? "range-overflow" : validity.stepMismatch ? "step-mismatch" : validity.customError ? "custom-error" : "";
			var specificErrormessage, genericErrormessage;
			if (suffix && (specificErrormessage = element.getAttribute("data-errormessage-" + suffix))) {
				element.setCustomValidity(specificErrormessage);
			} else if (genericErrormessage = element.getAttribute("data-errormessage")) {
				element.setCustomValidity(genericErrormessage);
			} else {
				element.setCustomValidity(element.validationMessage);
			}
			if (invalidCallback) {
				invalidCallback(event);
			}
		};
	}

	var civem = function() {
		var formElements = [];
		var inputElements = document.getElementsByTagName("input");
		var i;
		for (i = 0; i < inputElements.length; i++) {
			formElements.push(inputElements[i]);
		}
		var textareaElements = document.getElementsByTagName("textarea");
		for (i = 0; i < textareaElements.length; i++) {
			formElements.push(textareaElements[i]);
		}
		var selectElements = document.getElementsByTagName("select");
		for (i = 0; i < selectElements.length; i++) {
			formElements.push(selectElements[i]);
		}
		for (i = 0; i < formElements.length; i++) {
			var formElement = formElements[i];
			if (!formElement.willValidate) {
				continue;
			}
			console.log(formElement.tagName);
			if (formElement.tagName.toUpperCase() === "SELECT" || formElement.type.toUpperCase() === "RADIO" || formElement.type.toUpperCase() === "CHECKBOX") {
				formElement.onchange = getInputHandler(formElement.onchange);
			} else {
				formElement.oninput = getInputHandler(formElement.oninput);
			}
			formElement.oninvalid = getInvalidHandler(formElement.oninvalid);
		}
	};

	if (window.addEventListener) {
		window.addEventListener("load", civem, false);
	} else if (window.attachEvent) {
		window.attachEvent("onload", civem);
	}
}());
