
function changeRecord()
{
    document.recordForm.action = 'change.php';
    document.recordForm.submit();
}

function deleteRecord()
{
    document.recordForm.action = 'delete.php';
    document.recordForm.submit();
}

function rowClick(id)
{	
	var recordID = id;
	
	document.getElementById("chgBtn").disabled = false;
	document.getElementById("dltBtn").disabled = false;
	
	document.getElementById(recordID).checked = true;
}

function genreClick(genre)
{
	var genreID = genre;
	
	switch(document.getElementById(genre).checked)
	{
		case true: 
			document.getElementById(genre).checked = false;
			break;
		case false:	
			document.getElementById(genre).checked = true;
			break;
	}
}

function addClick()
{
	var form  = document.getElementById('addBookForm');
	
	if (form.isValid())
	{
		document.getElementById('formIncompleteError').style.display = "none";
		document.recordForm.action = 'add.php';
		document.recordForm.submit();
	}
	else
	{
		alert("error");
		document.getElementById('formIncompleteError').style.display = "";
	}	
}