<?php
session_start();

	if($_SESSION['userName'] == "")
	{
		header('Location: index.php');
	}

	if ($_SESSION['success'] == "stock_added")
	{
		$success = "Stock successfully added to your porfolio.";
	}
	else if ($_SESSION['success'] == "stock_deleted")
	{
		$success = "Stock successfully deleted from your porfolio.";
	}
	else if ($_SESSION['success'] == "stock_updated")
	{
		$success = "Stock successfully updated.";
	}
	else if ($_SESSION['success'] == "")
	{
		$success = "";
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

<?php 

	$portf_fp = fopen("stocks.txt", 'r');
	$acct_fp = fopen("account.txt", 'r');
	
	$portf = array();	
	$acct = array();
	
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
	while($acct_line = fgets($acct_fp))
	{
		array_push($acct, $acct_line);
	}
	fclose($portf_fp);
	fclose($acct_fp);
	sort($portf);
	sort($acct);
?>

<?php include 'beginHTML.php';?>
<?php include 'loginHeaderHTML.php';?>

<script>
	function addStock(){
		document.getElementById('addStock').style.display = "";
		document.getElementById('modifyStock').style.display = "none";
		document.getElementById('deleteStock').style.display = "none";
		document.getElementById('alert').style.display = "none";
		document.getElementById('updateStock').style.display = "none";
	}
	function modifyStock(){
		document.getElementById('addStock').style.display = "none";
		document.getElementById('modifyStock').style.display = "";
		document.getElementById('deleteStock').style.display = "none";
		document.getElementById('alert').style.display = "none";
		document.getElementById('updateStock').style.display = "none";
	}
	function deleteStock(){
		document.getElementById('addStock').style.display = "none";
		document.getElementById('modifyStock').style.display = "none";
		document.getElementById('deleteStock').style.display = "";
		document.getElementById('alert').style.display = "none";
		document.getElementById('updateStock').style.display = "none";
	}
	function showUpdateAccount(val){
		var btnVal = val;
		document.getElementById('updateStock').style.display = "";
		document.getElementById('stockName').innerHTML = btnVal;
		document.getElementById('amt').value = 0;
		document.getElementById('stockToUpdate').value = btnVal;
	}
</script>

<div>

	<h1>Portfolio Manager</h1>

	<span><a href="#" onclick='addStock()'>Add Stocks</a></span> | <span><a href="#" onclick='modifyStock()'>Modify Stocks</a></span> | <span><a href="#" onclick='deleteStock()'>Delete Stocks</a></span>
	<hr/>
		
	<div id='addStock' style='display:none'>
		<form action='addStock.php' method='post' id='form'>
			Stock Tick: <input type='text' id='tick' name='tick' class='textContent textInput' style='text-transform: uppercase;'/>
			<input type='submit' id='submitTick' class='textInput' value='Add Stock'/>			
		</form>	
	</div>
	
	<div id='modifyStock' style='display:none'>
		<form action='modifyStock.php' method='post' id='form'>		
			<table style='text-align:center; width:100%;'>
				<tr style='text-decoration: underline; font-family: sans-serif;'>					
					<th>MODIFY</th>
					<th>Ticker</th>
					<th>Value</th>
					<th>Trade Date</th>
					<th>Trade Time</th>
					<th>Change</th>
					<th>Open Value</th>
					<th>Day's High</th>
					<th>Days's Low</th>
					<th>Volume</th>
					<th>Account</th>
				</tr>
				
				<?php		
					foreach($portf as $item)
					{
						echo "<tr>
								<td>
									<input id='updateAcctBtn' type='button' onclick='showUpdateAccount(this.value)' class='textContent textInput' style='margin:0; font-weight:bolder; font-size:large; width:200px;' name='modify' value='$item[0]' />	
								</td>";
								
							foreach($item as $key => $value)
							{
								echo "<td>
										$value
									</td>";
							}
							
							foreach($acct as $acct_line)
							{
								$acct_tick = strtok($acct_line, ",");
								$acct_amt = strtok(",");
								
								if('"'.$item[0].'"' == $acct_tick)
								{
									echo "<td>
											$acct_amt
										</td>";
								}
							}												
						echo "</tr>";
					}
				?>
			</table>			
		</form>
	</div>
	
	<div  id='deleteStock' style='display:none'>
		<form action='deleteStock.php' method='post' id='form'>		
			<table style='text-align:center; width:100%;'>
				<tr style='text-decoration: underline; font-family: sans-serif;'>
					<th>DELETE</th>
					<th>Ticker</th>
					<th>Value</th>
					<th>Trade Date</th>
					<th>Trade Time</th>
					<th>Change</th>
					<th>Open Value</th>
					<th>Day's High</th>
					<th>Days's Low</th>
					<th>Volume</th>
					<th>Account</th>
				</tr>
				
				<?php				
					foreach($portf as $item)
					{
						echo "<tr>
								<td>
									<input type='submit' class='textContent textInput' style='margin:0; font-weight:bolder; font-size:large; width:200px; color:#FF5e5e' name='tick_delete' value='$item[0]' />	
								</td>";
							
							foreach($item as $key => $value)
							{
								echo "<td>
										$value
									</td>";
							}
							
							foreach($acct as $acct_line)
							{
								$acct_tick = strtok($acct_line, ",");
								$acct_amt = strtok(",");
								
								if('"'.$item[0].'"' == $acct_tick)
								{
									echo "<td>
											$acct_amt
										</td>";
								}
							}				
						echo "</tr>";
					}
				?>
			</table>			
		</form>				
	</div>	
	
	<table style="width:100%; border-spacing:0;">
		<tr>
			<td style = "text-align:right;">
				<form action='fetchCurrentMarketData.php' method='post'>
					<input type='submit' name='fetchCurrentMarketData' class='textInput' value='Fetch Updated Market Data' style='text:right;' />
				</form>
			</td>
		</tr>
	</table>
</div>

<?php 
	echo "<hr/>";	
	echo "<div id='alert'>$success $error</div>";
?>

<div  id='updateStock' style='display:none'>
	<form action='updateAccount.php' method='post' id='form'>
		Change Account For <span id='stockName'></span> To: <input type='number' min='0' id='amt' name='amt' class='textContent textInput' style='text-transform: ;'/>
		<input id='stockToUpdate' type='text' hidden name='stockToUpdate' value='' />
		<input type='submit' class='textInput' value='Update Account'/>			
	</form>	
</div>

<?php include 'endHTML.php';?>
