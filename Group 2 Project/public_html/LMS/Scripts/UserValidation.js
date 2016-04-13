function ValidateLogin()
{
	var email = document.getElementById('txtLoginEmail').value;
	var password = document.getElementById('txtLoginPassword').value;
	if (email != "" && password != "") {	  
        document.getElementById('errorDiv').innerHTML = "";
	    document.getElementById('errorDiv').style.display = "none";
        return true;
	}
	else {
	    document.getElementById('errorDiv').innerHTML = "Please enter Email or Password";
	    document.getElementById('errorDiv').style.display = "block";
        return false;
	}
}

function RegisterUser()
{
    return true; 
}