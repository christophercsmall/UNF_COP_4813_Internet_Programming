<?php
//get variables
$ID = $_GET['ID'];

//create myql access
$mysql_access = mysql_connect('localhost', 'n00931863', 'spring2016931863');

if (!mysql_access)
{
	die('Could not connect: '. mysql_error());
}

//select db
mysql_select_db('n00931863');


//create query
$query = "DELETE FROM Books WHERE ID=" . $ID;

//issue query
$result = mysql_query($query, $mysql_access);

mysql_close($mysql_access);

//redirect to index
header('Location: index.php');
?>