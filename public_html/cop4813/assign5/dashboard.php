<?php
session_start();

$portf_fp = fopen("stocks.txt", 'r');
$portf = array();

while($portf_line = fgets($portf_fp))
	{		
		array_push($portf, $portf_line);
	}
	fclose($portf_fp);

?>

<?php include 'beginHTML.php';?>
<?php include 'loginHeaderHTML.php';?>

<div>

<h1>Dashboard</h1>

<table>
<?php
foreach($portf as $line)
{
	echo "<tr><td>".$line."</td></tr>";
}
?>
</table>



</div>

<?php 
	echo "<hr/>";
?>

<?php include 'endHTML.php';?>