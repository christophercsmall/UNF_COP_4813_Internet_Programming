<?php include 'beginHTML.php';?>

<?php

    $mysql_access = mysql_connect('localhost', 'n00931863', 'spring2016931863');

    if (!mysql_access)
    {
    die('Could not connect: '. mysql_error());
    }

    //select db
    mysql_select_db('n00931863');

    $query = "SELECT * FROM Books";

    $result = mysql_query($query, $mysql_access);

?>
<div style='width:100%; display:flex;'>
<div style='width:inherit; display:inline-block;'>
	<div style="margin-bottom:10px; margin-right:10px;">
	<form action='' name='recordForm' method='get'>
		<?php
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
				
				echo "<tr class='textContent textInput rowStyle' onClick='rowClick($ID);'>";
				echo "<td><input required id='$ID' type='radio' name='ID' value='$ID' /></td>";
				echo "<td>$title</td>";	
				echo "<td>$author</td>";
				echo "<td>$genre</td>";
				echo "<td>$readStart</td>";
				echo "<td>$readFinish</td>";
				echo "<td>$stars</td>";
				echo "</tr>";
			}
			echo "</table>";
			mysql_close($mysql_access);
		?>
		
		<input id='chgBtn' type='button' value='Change Record' onClick='changeRecord()' class='textContent textInput' disabled/>
		<input id='dltBtn' type='button' value='Delete Record' onClick='deleteRecord()' class='textContent textInput' disabled/>
	</form>
	</div>                     
</div>
<div style='width:initial; display:inline-block;'>
<form id="addBookForm" action="add.php" method="post">
	<table class="textContent textInput">
		<tr>
			<td>Title: </td>
			<td><input required type="text" name="title" class="textContent textInput"/></td>
		</tr>
		<tr>
			<td>Author: </td>
			<td><input required type="text" name="author" class="textContent textInput"/></td>
		</tr>
		<tr>
			<td>Major Genre:</td>
			<td>
				<div class="textInput textContent rowStyle">
					<input id="sf" class="textContent" type="checkbox" name="genreList[]" value="Science_Fiction"><span class="checkBoxStyle" onClick="genreClick('sf')">SciFi</span><br/>
					<input id="f" class="textContent" type="checkbox" name="genreList[]" value="Fantasy"><span class="checkBoxStyle" onClick="genreClick('f')">Fantasy</span><br/>
					<input id="c" class="textContent" type="checkbox" name="genreList[]" value="Comedy"><span class="checkBoxStyle" onClick="genreClick('c')">Comedy</span><br/>
					<input id="d" class="textContent" type="checkbox" name="genreList[]" value="Drama"><span class="checkBoxStyle" onClick="genreClick('d')">Drama</span><br/>
					<input id="nf" class="textContent" type="checkbox" name="genreList[]" value="Non-Fiction"><span class="checkBoxStyle" onClick="genreClick('nf')">Non-Fiction</span><br/>
					<input id="r" class="textContent" type="checkbox" name="genreList[]" value="Romance"><span class="checkBoxStyle" onClick="genreClick('r')">Romance</span><br/>
					<input id="s" class="textContent" type="checkbox" name="genreList[]" value="Satire"><span class="checkBoxStyle" onClick="genreClick('s')">Satire</span><br/>
					<input id="t" class="textContent" type="checkbox" name="genreList[]" value="Tragedy"><span class="checkBoxStyle" onClick="genreClick('t')">Tragedy</span><br/>
					<input id="h" class="textContent" type="checkbox" name="genreList[]" value="Horror"><span class="checkBoxStyle" onClick="genreClick('h')">Horror</span>
				</div>				
			</td>
		</tr>
		<tr>
			<td>Started Reading:</td>
			<td><input required type="text" name="readStart" class="textContent textInput"/></td>
		</tr>
		<tr>
			<td>Finished Reading:</td>
			<td><input type="text" name="readFinish" class="textContent textInput"/></td>
		</tr>
		<tr>
			<td>Your Rating</td>
			<td>
			  <select required name="stars" class="textInput textContent" style='width:90%;'>
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
			<td style='text-align:right;'><input type='submit' value='Add Book' class='textContent textInput' /></td>
		</tr>		
	</table>
</form>
</div>      
</div>

<?php include 'endHTML.php';?>

