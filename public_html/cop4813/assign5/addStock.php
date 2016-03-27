<?php
session_start();

$stock = strtoupper($_POST['tick']);
$tick_exists = false;
$file_name = "stocks.txt";

if($stock != '')
{
	$portf_fp = fopen($file_name, 'a+');
	$yahoo_fp = fopen('http://finance.yahoo.com/d/quotes.csv?s=' .$stock. '&f=sl1d1t1c1ohgv&e=.csv', 'r');

	$line = fgets($yahoo_fp);
	
	
	
	if($line == '' || substr_count($line, "N/A") > 0 || $line == "\n" || $line == null)
	{		
		fclose($portf_fp);
		fclose($yahoo_fp);
		$_SESSION['error'] = "error_tick_none";
		header('Location: manager.php');
	}
	else
	{
		while($portf_line = fgets($portf_fp))
		{			
			$tok_tick = str_replace('"', '', strtok($portf_line, ","));

			if ($tok_tick == $stock)
			{
				$tick_exists = true;
			}
		}
	
		if($tick_exists == false)
		{
			fwrite($portf_fp, $line);
			fclose($portf_fp);
			fclose($yahoo_fp);
			$_SESSION['error'] = "";
			$_SESSION['success'] = "stock_added";			
			header('Location: manager.php');
		}
		else
		{		
			$_SESSION['error'] = "error_tick_duplicate";	
			header('Location: manager.php');		
		}	
	}
}
else
{
	$_SESSION['error'] = "error_tick_empty";
	header('Location: manager.php');
}
?>
