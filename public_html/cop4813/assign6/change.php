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
$query = "SELECT * FROM Books WHERE ID=" . $ID;

//issue query
$result = mysql_query($query, $mysql_access);

mysql_close($mysql_access);

	$row  = mysql_fetch_row($result);

	$ID = $row[0];
	$title = $row[1];
	$author = $row[2];
	$genre = $row[3];
	$readStart = $row[4];
	$readFinish = $row[5];
	$stars = $row[6];
	
	$genreArray = array();
	
	$token = strtok($genre, "|");
	
	while ($token != false)
	{
		array_push($genreArray, $token);
		$token = strtok("|");
	}
?>

<?php include 'beginHTML.php';?>

<form action="change_b.php" method="post">

<?php
	echo "<input type='hidden' name=ID value='$ID' />";
?>

	<table class="textContent textInput">
		<tr>
			<td>Title: </td>
			<td><input required type="text" name="title" class="textContent textInput" value='<?php echo $title; ?>'/></td>
		</tr>
		<tr>
			<td>Author: </td>
			<td><input required type="text" name="author" class="textContent textInput" value='<?php echo $author; ?>'/></td>
		</tr>
		<tr>
			<td>Major Genre:</td>
			<td>
				<div class="textInput textContent rowStyle">
					<input <?php if (in_array("Science_Fiction", $genreArray)){ echo "checked='checked'";} ?> id="sf" class="textContent" type="checkbox" name="genreList[]" value="Science_Fiction"><span class="checkBoxStyle" onClick="genreClick('sf')">SciFi</span><br/>
					<input <?php if (in_array("Fantasy", $genreArray)){ echo "checked='checked'";} ?> id="f" class="textContent" type="checkbox" name="genreList[]" value="Fantasy"><span class="checkBoxStyle" onClick="genreClick('f')">Fantasy</span><br/>
					<input <?php if (in_array("Comedy", $genreArray)){ echo "checked='checked'";} ?> id="c" class="textContent" type="checkbox" name="genreList[]" value="Comedy"><span class="checkBoxStyle" onClick="genreClick('c')">Comedy</span><br/>
					<input <?php if (in_array("Drama", $genreArray)){ echo "checked='checked'";} ?> id="d" class="textContent" type="checkbox" name="genreList[]" value="Drama"><span class="checkBoxStyle" onClick="genreClick('d')">Drama</span><br/>
					<input <?php if (in_array("Non-Fiction", $genreArray)){ echo "checked='checked'";} ?> id="nf" class="textContent" type="checkbox" name="genreList[]" value="Non-Fiction"><span class="checkBoxStyle" onClick="genreClick('nf')">Non-Fiction</span><br/>
					<input <?php if (in_array("Romance", $genreArray)){ echo "checked='checked'";} ?> id="r" class="textContent" type="checkbox" name="genreList[]" value="Romance"><span class="checkBoxStyle" onClick="genreClick('r')">Romance</span><br/>
					<input <?php if (in_array("Satire", $genreArray)){ echo "checked='checked'";} ?> id="s" class="textContent" type="checkbox" name="genreList[]" value="Satire"><span class="checkBoxStyle" onClick="genreClick('s')">Satire</span><br/>
					<input <?php if (in_array("Tragedy", $genreArray)){ echo "checked='checked'";} ?> id="t" class="textContent" type="checkbox" name="genreList[]" value="Tragedy"><span class="checkBoxStyle" onClick="genreClick('t')">Tragedy</span><br/>
					<input <?php if (in_array("Horror", $genreArray)){ echo "checked='checked'";} ?> id="h" class="textContent" type="checkbox" name="genreList[]" value="Horror"><span class="checkBoxStyle" onClick="genreClick('h')">Horror</span>
				</div>				
			</td>
		</tr>
		<tr>
			<td>Started Reading:</td>
			<td><input required type="text" name="readStart" class="textContent textInput" value='<?php echo $readStart; ?>'/></td>
		</tr>
		<tr>
			<td>Finished Reading:</td>
			<td><input type="text" name="readFinish" class="textContent textInput" value='<?php echo $readFinish; ?>'/></td>
		</tr>
		<tr>
			<td>Your Rating</td>
			<td>
			  <select required name="stars" class="textInput textContent" style='width:90%; value='<?php echo $stars; ?>''>
				<option value="">--</option>
				<option value="1">*</option>
				<option value="2">**</option>
				<option value="3">***</option>
				<option value="4">****</option>
				<option value="5">*****</option>
			  </select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td style='text-align:right;'><input type='submit' value='Update Book' class='textContent textInput' /></td>
		</tr>		
	</table>
</form>

<?php include 'endHTML.php';?>