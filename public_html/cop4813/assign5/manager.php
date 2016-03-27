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

<script>
	function addStock(){
		document.getElementById('addStock').style.display = "";
		document.getElementById('modifyStock').style.display = "none";
		document.getElementById('deleteStock').style.display = "none";
	}
	function modifyStock(){
		document.getElementById('addStock').style.display = "none";
		document.getElementById('modifyStock').style.display = "";
		document.getElementById('deleteStock').style.display = "none";
	}
	function deleteStock(){
		document.getElementById('addStock').style.display = "none";
		document.getElementById('modifyStock').style.display = "none";
		document.getElementById('deleteStock').style.display = "";
	}
</script>

<div>

	<h1>Portfolio Manager</h1>


	<span><a href="#" onclick='addStock()'>Add Stocks</a></span> | <span><a href="#" onclick='modifyStock()'>Modify Stocks</a></span> | <span><a href="#" onclick='deleteStock()'>Delete Stocks</a></span>
	<hr/>
		
	<div  id='addStock' style='display:none'>
		<form action='addStock.php' method='post' id='form'>

			Stock Tick: <input type='text' id='tick' name='tick' class='textContent textInput' style='text-transform: uppercase;'/>
			<input type='submit' id='submitTick' class='textInput' value='Add Stock'/>	
			
		</form>	
	</div>
	
	<div  id='modifyStock' style='display:none'>
	
	
	
	</div>
	
	<div  id='deleteStock' style='display:none'>
		<form action='deleteStock.php' method='post' id='form'>		
			<table style='text-align:center;'>
				<tr style='text-decoration: underline; font-family: sans-serif;'>
					<th></th>
					<th>Ticker</th>
					<th>Value</th>
					<th>Trade Date</th>
					<th>Trade Time</th>
					<th>Change</th>
					<th>Open Value</th>
					<th>Day's High</th>
					<th>Days's Low</th>
					<th>Volume</th>
				</tr>
				<?php			
				$portf_fp = fopen("stocks.txt", 'r');
				$portf = array();
				
				
				while($portf_line = fgets($portf_fp))
				{
					$stock = array();
					
					$tok_tick = str_replace('"', '', strtok($portf_line, ","));
					$tok_l1 = strtok(",");
					$tok_d1 = strtok(",");
					$tok_t1 = strtok(",");
					$tok_c1 = strtok(",");
					$tok_o = strtok(",");
					$tok_h = strtok(",");
					$tok_g = strtok(",");
					$tok_v = strtok(",");
					
					array_push($stock, $tok_tick);
					array_push($stock, $tok_l1);
					array_push($stock, $tok_d1);
					array_push($stock, $tok_t1);
					array_push($stock, $tok_c1);
					array_push($stock, $tok_o);
					array_push($stock, $tok_h);
					array_push($stock, $tok_g);
					array_push($stock, $tok_v);

					array_push($portf, $stock);
				}
				fclose($portf_fp);
				sort($portf);
				
				foreach($portf as $item)
				{
					echo "<tr>
							<td>
								<input type='submit' class='textContent textInput' style='margin:0; font-weight:bolder; font-size:large; width:200px;' name='tick_delete' value='DELETE | $item[0]' />	
							</td>";
						
						foreach($item as $key => $value)
						{
							echo "<td>
									$value
								</td>";
						}
					echo "</tr>";
				}
				?>
			</table>			
		</form>				
	</div>

</div>

<?php 
	echo "<hr/>";
	echo $success;
	echo $error;
?>

<?php include 'endHTML.php';?>
