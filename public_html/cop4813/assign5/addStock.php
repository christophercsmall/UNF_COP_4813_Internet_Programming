<?php

$stock = $_POST['tick'];

$file_name = 'stocks.txt';

$fp = fopen($file_name, "a");
$open = fopen("http://finance.yahoo.com/d/quotes.csv?s=" .$stock. "&f=sl1d1t1c1ohgv&e=.csv", "r");
$line = fgets($open);
fwrite($fp, $line);

echo $line;

fclose($open);
fclose($fp);

?>