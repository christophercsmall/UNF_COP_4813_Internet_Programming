<?php
session_start();
//Redirect if logged in
if($_SESSION['Email'] == null )
{
	header('Location: Login.php');  
}

?>
