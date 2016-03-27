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

<?php include 'beginHTML.php';?>
<?php include 'loginHeaderHTML.php';?>

<div>

<h1>Dashboard</h1>

<form action='viewDetails.php' method='post' id='form'>
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
			<th>Account</th>
		</tr>
	
		<?php		
			sort($portf);
			sort($acct);
			
			foreach($portf as $item)
			{
				echo "<tr>
						<td>
							<input type='submit' class='textContent textInput' style='margin:0; font-weight:bolder; font-size:large; width:200px;' name='tick_delete' value='VIEW | $item[0]' />	
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

<?php 
	echo "<hr/>";
?>

<?php include 'endHTML.php';?>