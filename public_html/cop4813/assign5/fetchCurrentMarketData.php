<?php

	$portf = array();
	$portfUpdated = array();

	$portf_fp = fopen("stocks.txt", 'r');
	
	while($portf_line = fgets($portf_fp)) 
		{			
			$tok_tick = str_replace('"', '', strtok($portf_line, ","));
			
			$yahoo_fp = fopen('http://finance.yahoo.com/d/quotes.csv?s=' .$tok_tick. '&f=sl1d1t1c1ohgv&e=.csv', 'r');
			$yahoo_line = fgets($yahoo_fp);
			array_push($portfUpdated, $yahoo_line);				
		}
	fclose($portf_fp);
	fclose($yahoo_fp);
	
	$portf_fp = fopen("stocks.txt", 'w');
	foreach($portfUpdated as $line)
	{
		fwrite($portf_fp, $line);	
	}
	fclose($portf_fp);
	
	header('Location: dashboard.php');

?>