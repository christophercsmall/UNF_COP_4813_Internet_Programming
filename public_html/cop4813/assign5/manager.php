<?php
session_start();

	if ($_SESSION['success'] == "stock_added")
	{
		$success = "Stock successfully added to your porfolio.";
	}

	if ($_SESSION['error'] == "error_tick_duplicate")
	{
		$error = "|Error: Stock already exists in portfolio.|";
	}
	else if ($_SESSION['error'] == "error_tick_empty")
	{
		$error = "|Error: Empty field submission. Please input a valid stock tick.|";
	}
	else if ($_SESSION['error'] == "error_tick_none")
	{
		$error = "|Error: Stock tick not found. Please try another.|";
	}
	else if ($_SESSION['error'] == "")
	{
		$error = "";
	}
?>

<?php include 'beginHTML.php';?>
<?php include 'loginHeaderHTML.php';?>

<div>

<h1>Add Stocks</h1>

<form action='addStock.php' method='post' id='form'>

	Stock Tick: <input type='text' id='tick' name='tick' class='textContent textInput' style='text-transform: uppercase;'/>
	<input type='submit' id='submitTick' class='textInput' value='Add Stock'/>	
	
</form>

<h1>Modify Stocks</h1>

<h1>Delete Stocks</h1>

</div>

<?php 
	echo "<hr/>";
	echo $success;
	echo $error;
?>

<?php include 'endHTML.php';?>