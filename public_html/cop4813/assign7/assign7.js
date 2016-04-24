function ajaxFunction()
{
	var ajaxRequest;
	
	try {
		ajaxRequest = new XMLHttpRequest();
	} catch (e) {
		try {
			ajaxRequest = new ActiveXObject("Msxml12.XMLHTTP");
		} catch (e) {
			try {
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {
				alert("Your browser broke.");
				return false;
			}
		}
	}
	
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			document.getElementById("output").innerHTML = ajaxRequest.responseText;
		}
	}
	
	var selection = document.ratingForm.rating.value;
	
	ajaxRequest.open("GET", "getData.php?selection=" + selection, true);
	ajaxRequest.send(null);	
}

