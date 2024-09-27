<?php 
$posID;
$message = "";
$pos = array('','','','');
include('db.php');
if(isset($_GET['id']))
{
	$posID = $_GET['id'];
	$pos = getrecord('positions', 'posID', $posID);
}
else
	$posID = "";



if(isset($_GET['editposition'])){
	$positionID = $_GET['posID'];
	$posName = $_GET['posName'];
	$numberPos = $_GET['numberPos'];
	$posStat = $_GET['posStat'];
	
	if(!empty($positionID) && !empty($posName) && !empty($numberPos) && !empty($posStat)){
		$field = array('posID', 'posName', 'numOfPositions', 'possStat');
		$data = array($positionID,$posName, $numberPos, $posStat );
		$updateposition = updaterecord('positions', $field, $data);
		$message = "Update success";
		header("Location:dashboard.php?message=$message");
	}
	else{
		$message = "Fill all fields";
	}
}


?>

<html>
	<head>
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
		
		<form action="editposition.php" align="center">
			<a href="dashboard.php"><- Go back</a> <br><br>
			<label for="posID">Position ID</label>
			<input type="text" name="posID" id="posID" value="<?php echo $pos[0];?>">
		
			<br>
		
			<label for="posName">Position Name</label>
			<input type="text" name="posName" id="posName" value="<?php echo $pos[1];?>">
			<br>
			

			<label for="numberPos">Number of Position</label>
			<input type="number" name="numberPos" id="numberPos" value="<?php echo $pos[2];?>">
			<br>
			
			
			<label for="posStat">Position Status</label>
				<select id="posStat" name="posStat">
				<?php 
					if($pos[3] == 'Active')
						echo "<option value='Active' selected>Active</option>";
					else
						echo "<option value='Active'>Active</option>";
					
					if ($pos[3] == 'Inactive')
						echo "<option value='Inactive' selected>Inactive</option>";
					else
						echo "<option value='Inactive'>Inactive</option>";
				?>
				</select>
			<br><br>
			<button type="submit" name="editposition">
				Update
			</button>
					<p><?php echo $message;?></p>
		</form>

	</body>
</html>