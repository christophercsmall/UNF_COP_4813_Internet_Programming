<?php

session_start();
	
	$acct_file = "account.txt";
	$acct_fp = fopen($acct_file, 'r');
	
	$acct = array();
	$stockNewAmt = $_POST['amt'];
	$stockName = $_POST['stockToUpdate'];
	$dateTime = date('Y/m/d H:i:s a', time());

	while($acct_line = fgets($acct_fp))
	{
		array_push($acct, $acct_line);
	}
	fclose($acct_fp);
	
	foreach($acct as &$item)
	{
		if(strpos($item, '"'.$stockName.'"') !== false)
		{
			$tok_tick = strtok($item, ",");	
			$tok_amt = strtok(",");
			$tok_value = strtok(",");
			$tok_date = strtok(",");
			
			$item = '"'.$stockName.'"'.','.$stockNewAmt.','.$tok_value.','.$tok_date;
		}
	}
	unset($item);

	
	$acct_fp = fopen($acct_file, 'w');
	foreach($acct as $item)
	{
		fwrite($acct_fp, $item);
	}	
	fclose($acct_fp);

$_SESSION['success'] = "stock_updated";
$_SESSION['error'] = "";
header('Location: manager.php');
?>