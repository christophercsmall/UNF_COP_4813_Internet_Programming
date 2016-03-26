<?php
// Start the session
session_start();
?>

<?php include 'beginHTML.php';?>
<?php include 'loginHeaderHTML.php';?>

<div>

<h1>Add Stocks</h1>

<form action="addStock.php" method="post" id="form">

	Stock Tick: <input type='text' id='tick' name='tick' class="textContent textInput"/>
	<input type='submit' id='submitTick' class='textInput' value='Add Stock'/>	
	
</form>

<h1>Modify Stocks</h1>

<h1>Delete Stocks</h1>




</div>

<?php include 'endHTML.php';?>