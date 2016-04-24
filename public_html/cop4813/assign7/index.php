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

    $result = mysql_query($query);

?>
<div style='width:100%; display:flex;'>
<div style='width:inherit; display:inline-block;'>
	<div style="margin-bottom:10px; margin-right:10px;">

	<div id="output"></div>		
	
	</div>                     
</div>
<div style='width:initial; display:inline-block;'>
	<table class="textContent textInput">

		<tr>
			<td>Your Rating</td>
			<td>
				<form name='ratingForm'>		
					<label for="rating">Select Rating</label>
					<select name="rating" class="textInput textContent" onChange="ajaxFunction()">		
						<option value="--">--</option>
						<option value="1">*</option>
						<option value="2">**</option>
						<option value="3">***</option>
						<option value="4">****</option>
						<option value="5">*****</option>	
					</select>		
				</form>
			</td>
		</tr>	
	</table>
</div>      
</div>

<?php include 'endHTML.php';?>

