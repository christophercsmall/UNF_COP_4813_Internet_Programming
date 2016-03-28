<?php
session_start();

if($_SESSION['userName'] == "")
{
	header('Location: index.php');
}

$_SESSION['error'] = "";
$_SESSION['success'] = "";

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
?>

<script>
		function viewYahooStockData(val) {
			alert("Now Directing to Yahoo Fincance Search for: " + val);
			var url = "http://finance.yahoo.com/q?s=" + val + "&fr=uh3_finance_web_gs_ctrl2&uhb=uhb2";
			var win = window.open(url, '_blank');
			win.focus();			
		}
</script>

<?php include 'beginHTML.php';?>
<?php include 'loginHeaderHTML.php';?>

<div>

<h1>Dashboard</h1>

<form action='' method='post' id='form'>
	<table style='text-align:center; width:100%;'>
		<tr style='text-decoration: underline; font-family: sans-serif;'>
			<th>VIEW</th>
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
			<th>Added</th>
			<th>Total</th>
		</tr>
	
		<?php		
			sort($portf);
			sort($acct);
			
			foreach($portf as $item)
			{
				echo "<tr>
						<td>
							<input type='button' onclick='viewYahooStockData(this.value)' class='textContent textInput' style='margin:0; font-weight:bolder; font-size:large; width:200px;' name='view' value='$item[0]' />	
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
						$acct_value = strtok(",");
						$acct_dateAdded = strtok(",");
						$acct_total = strtok(",");
						$thisTotal = $acct_amt*$acct_value;						
						
						if('"'.$item[0].'"' == $acct_tick)
						{
							echo "<td>
									$acct_amt
								</td>
								<td>
									$acct_dateAdded
								</td>
								<td>
									$thisTotal									
								</td>";
								$grandTotal += $thisTotal;
						}
					}
						
				echo "</tr>";
				
			}
			
		?>
	</table>			
</form>
<table style="width:100%; border-spacing:0;">
	<tr>
		<td style = "text-align:right;">
			<?php echo "Total Porfolio Value: $grandTotal"; ?>
		</td>
	</tr>
</table>
<br/>
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
?>

<?php include 'endHTML.php';?>