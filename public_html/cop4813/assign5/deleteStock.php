<?php
session_start();

$_SESSION['error'] = "";
$_SESSION['success'] = "";

	$tick = $_POST['tick_delete'];
	$searchStr = '"'.$tick.'"';
	$portf = array();
	$acct = array();

	$portf_fp = fopen("stocks.txt", 'r');	
	while($portf_line = fgets($portf_fp))
	{
		array_push($portf, $portf_line);
	}
	fclose($portf_fp);	
	
	$acct_fp = fopen("account.txt", 'r');	
	while($acct_line = fgets($acct_fp))
	{
		array_push($acct, $acct_line);
	}
	fclose($acct_fp);
	
	foreach($portf as $item)
	{
		if(strpos($item, $searchStr) !== false)
		{
			$portfLine = $item;
		}
	}
	
	foreach($acct as $item)
	{
		if(strpos($item, $searchStr) !== false)
		{
			$acctLine = $item;
		}
	}
	
	$portf = array_values(array_diff($portf, array($portfLine)));
	$acct = array_values(array_diff($acct, array($acctLine)));
	
	sort($portf);
	sort($acct);

	$portf_fp = fopen("stocks.txt", 'w');	
	foreach($portf as $item)
	{
		fwrite($portf_fp, $item);
	}	
	fclose($portf_fp);
	
	$acct_fp = fopen("account.txt", 'w');	
	foreach($acct as $item)
	{
		fwrite($acct_fp, $item);
	}	
	fclose($acct_fp);

$_SESSION['success'] = "stock_deleted";
header('Location: manager.php');
	
?>