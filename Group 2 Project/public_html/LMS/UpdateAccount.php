<?php
session_start();
require 'UserValidate.php';

// Create connection
$mysqlConn = GetMySQLDatabaseCon();
$username = $_SESSION['UserName'];
$email = $_SESSION['Email'];

//Redirect if not logged in
if($email == null)
{
	header('Location: Login.php');
	exit;  
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$sqlQuery = "SELECT * FROM LMS_User where Email='$email'";
    $resultData = $mysqlConn->query($sqlQuery);
	$currentPass = "";
	$newPass = "";
	
	//Get user data from database
	if ($resultData->num_rows > 0) 
	{
        $record = $resultData->fetch_assoc();
		$currentPass = $record['UserPassword']
		
    } 
	else {
		header('Location: Login.php?error=1'); }
	
	//Check if new password was entered correctly twice.
	if($_POST['newPass1'] == $_POST['newPass2'])
	{
		$newPass = $_POST['passOne'];
	}
	else{
		header('Location: UserAccount.php?error=1'); }

    if($_POST['currentPassword'] != $currentPass)
	{
			header('Location: UserAccount.php?error=2');
	}
	else
	{
		$sqlQuery = "UPDATE LMS_User SET UserPassword='$newPass' WHERE Email='$email'"
	}
}





header('Location: UserAccount.php');
exit;  
?>