<?php
//get variables
$ID = $_POST['ID'];

$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$author = filter_var($_POST['author'], FILTER_SANITIZE_STRING);
$genre = filter_var($_POST['genre'], FILTER_SANITIZE_STRING);
$readStart = filter_var($_POST['readStart'], FILTER_SANITIZE_STRING);
$readFinish = filter_var($_POST['readFinish'], FILTER_SANITIZE_STRING);
$stars = filter_var($_POST['stars'], FILTER_SANITIZE_STRING);

foreach($_POST['genreList'] as $genre)
{
	$genreString = $genreString . $genre . '|' ;
}

$genreString = rtrim($genreString, "|");

//create myql access
$mysql_access = mysql_connect('localhost', 'n00931863', 'spring2016931863');

if (!mysql_access)
{
	die('Could not connect: '. mysql_error());
}

//select db
mysql_select_db('n00931863');


//create query
$query = "UPDATE Books SET ID='$ID', title='$title', author='$author', genre='$genreString', readStart='$readStart', readFinish='$readFinish', stars='$stars' WHERE ID=" . $ID;

//issue query
$result = mysql_query($query, $mysql_access);

mysql_close($mysql_access);

//redirect to index
header('Location: index.php');
?>