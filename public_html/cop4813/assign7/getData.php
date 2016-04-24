<?php

	$stars = $_GET['selection'];
	
	$mysql_access = mysql_connect('localhost', 'n00931863', 'spring2016931863');

    if (!mysql_access)
    {
    die('Could not connect: '. mysql_error());
    }

    //select db
    mysql_select_db('n00931863');

if ($stars != "--")
{
    $query = "SELECT * FROM Books WHERE stars=" . $stars;

    $result = mysql_query($query);
	
	$row = mysql_fetch_array($result);
	
	echo "<table class='tableStyle textContent textInput'>";   
	
	echo "<th style='padding:10px;'></th>";
	echo "<th style='padding:10px;'>Title</th>";
	echo "<th style='padding:10px;'>Author</th>";
	echo "<th style='padding:10px;'>Genre</th>";
	echo "<th style='padding:10px;'>Read Start</th>";
	echo "<th style='padding:10px;'>Read Finish</th>";
	echo "<th style='padding:10px;'>Rating</th>";
	
	while ($row = mysql_fetch_row($result))
	{
		$ID = $row[0];
		$title = $row[1];
		$author = $row[2];
		$genre = $row[3];
		$readStart = $row[4];
		$readFinish = $row[5];
		$stars = $row[6];		
		
		echo "<tr class='textContent textInput rowStyle'>";
		echo "<td>&#149;</td>";
		echo "<td>$title</td>";	
		echo "<td>$author</td>";
		echo "<td>$genre</td>";
		echo "<td>$readStart</td>";
		echo "<td>$readFinish</td>";
		echo "<td>$stars</td>";
		echo "</tr>";
	}
	echo "</table>";
}
else
{	
	echo "<table class='tableStyle textContent textInput'>";   
	echo "<th style='padding:10px;'></th>";
	echo "<th style='padding:10px;'>Title</th>";
	echo "<th style='padding:10px;'>Author</th>";
	echo "<th style='padding:10px;'>Genre</th>";
	echo "<th style='padding:10px;'>Read Start</th>";
	echo "<th style='padding:10px;'>Read Finish</th>";
	echo "<th style='padding:10px;'>Rating</th>";
	echo "</table>";
}
	mysql_close($mysql_access);

?>