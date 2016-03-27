<?php

session_start();

	$userName = filter_var($_POST['username'], FILTER_SANITIZE_STRING); //must be same as name attr in post
	$passWord = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	$username_valid = false;
	$_SESSION['error'] = '';
	
	$file_name = 'creds.txt';
	$fp = fopen($file_name, 'r');
	
	while($line = fgets($fp))
	{
		$tok_userName = strtok($line, '|');
		$tok_passWord = strtok('|');
		
		if ($userName == $tok_userName && $passWord == $tok_passWord)
		{
			$username_valid = true;
		}
		
	}
	fclose($fp);

	if ($username_valid)
	{
		$_SESSION['userName'] = $userName;
		$_SESSION['passWord'] = $passWord;
		$_SESSION['error'] = '';
		header('Location: dashboard.php');		
	}
	else
	{		
		$_SESSION['error'] = 'error_login';
		header('Location: login.php');
	}

?>
