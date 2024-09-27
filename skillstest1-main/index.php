<?php
	error_reporting(0);
	include("db/dbhelper.php");
	$header = array('itemcode','item name','price','quantity','total');
	$flag = 0;
	$table = "item";
	$fields=['itemcode','itemname','itemprice','itemqty'];
	$itemcode = "";
	$itemname = "";
	$itemprice = "";
	$itemqty = "";
	$message="";
	if(isset($_GET['submit'])){
		
		$button = $_GET['submit'];
		//echo $button;
		//
		$itemcode = $_GET['itemcode'];
		$itemname = $_GET['itemname'];
		$itemprice = $_GET['itemprice'];
		$itemqty = $_GET['itemqty'];
		$data = [$itemcode,$itemname,$itemprice,$itemqty];
		switch($button){
			case "SAVE": 
				$ok = addrecord($table,$fields,$data);
				$message=($ok)?"New Record Added":"Error Adding Record";
				break;
			case "EDIT": 
				
				$row = getrecord($table,'itemcode',$itemcode);
				$itemcode = $row['itemcode'];
				$itemname = $row['itemname'];
				$itemprice = $row['itemprice'];
				$itemqty = $row['itemqty'];
				if ($row==null) $message = "Record Not Found";
				break;
			case "DELETE":
				$ok = deleterecord($table,'itemcode',$itemcode);
				$message=($ok)?"Record Deleted":"Error Deleting Record";
				break;
			case "UPDATE":
				$ok = updaterecord($table,$fields,$data);
				$message=($ok)?"Record Updated":"Error Updating Record";
			
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="ie-edge">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" href="css/w3.css">
		<title>Skills 2023</title>
	</head>
	<body>
		<div class="w3-bar w3-blue w3-container w3-padding w3-card-4">
			<h3>Skills 2023</h3>
		</div>
		<br>
		<div class="w3-container w3-row" style="margin-right:10%">
			<div class="w3-col w3-half w3-container w3-padding w3-border w3-card-4">
				<form action="index.php">
					<p>
						<label>ITEMCODE</label>
						<input type="text" name="itemcode" class="w3-input w3-border" value="<?php echo $itemcode ?>">
					</p>
					<p>
						<label>ITEM NAME</label>
						<input type="text" name="itemname" class="w3-input  w3-border" value="<?php echo strtoupper($itemname) ?>">
					</p>
					<p>
						<label>ITEM PRICE</label>
						<input type="text" name="itemprice" class="w3-input w3-border" value="<?php echo $itemprice ?>">
					</p>
					<p>
						<label>ITEM QUANTITY</label>
						<input type="text" name="itemqty" class="w3-input w3-border" value="<?php echo $itemqty ?>">
					</p>
				
			</div>
				<div class="w3-col w3-half w3-container w3-padding">
					<input type="submit" value="UPDATE" name="submit" class="w3-button w3-blue" style="width:40%"/>
					<input type="submit" value="SAVE" name="submit" class="w3-button w3-blue" style="width:40%"/><br><br>
					<input type="submit" value="EDIT" name="submit" class="w3-button w3-blue" style="width:40%"/>
					<input type="submit" value="DELETE" name="submit" class="w3-button w3-blue" style="width:40%">
				</form>
					<div class="w3-panel w3-container w3-padding w3-green w3-center">
						<h3>
						<?php
							echo $message;
						?>
						</h3>
					</div>
				</div>
				
				
		</div>
		<div class="w3-container w3-padding">
			<table class="w3-table-all">
				<tr>
				<?php
					foreach($header as $h){
						echo "<th>".strtoupper($h)."</th>";
					}
				?>
				</tr>
				<?php
					$rows = getall('item');
					foreach($rows as $row){
						echo "<tr>";
							echo "<td>".$row['itemcode']."</td>";
							echo "<td>".$row['itemname']."</td>";
							echo "<td>".number_format($row['itemprice'],2)."</td>";
							echo "<td>".$row['itemqty']."</td>";
							echo "<td>".number_format(($row['itemqty'])*($row['itemprice']),2)."</td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</body>
</html>