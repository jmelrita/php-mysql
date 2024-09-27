<?php
	include('db.php');
	// Add Position:
// form
// input > Position ID 
// input > Position Name
// input > Number of Position
// select (active | inactive) > Position Status
// button > Save
$message = "";

if(isset($_GET['addposition'])){
	$posID = $_GET['posID'];
	$posName = $_GET['posName'];
	$numberPos = $_GET['numberPos'];
	$posStat = $_GET['posStat'];
	
	if(!empty($posID) && !empty($posName) && !empty($numberPos) && !empty($posStat)){
		$field =array('posID', 'posName', 'numOfPositions', 'possStat');
		$data = array($posID, $posName,$numberPos, $posStat);
		$addpos = addrecord('positions', $field, $data);
		$message = "Position added";
		header("Location:dashboard.php?message=$message");
	}
	else
		$message = "Fill all fields";
}
?>
<html>
	<head>
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
		
		<form action="addposition.php" align="center">
			<a href="dashboard.php"><- Go back</a> <br><br>
			<label for="posID">Position ID</label>
			<input type="text" name="posID" id="posID">
		
			<br>
		
			<label for="posName">Position Name</label>
			<input type="text" name="posName" id="posName">
			<br>
			

			<label for="numberPos">Number of Position</label>
			<input type="number" name="numberPos" id="numberPos">
			<br>
			
			
			<label for="posStat">Position Status</label>
				<select id="posStat" name="posStat">
					<option value="Active">Active</option>
					<option value="Inactive">Inactive</option>
				</select>
			<br><br>
			<button type="submit" name="addposition">
				Submit
			</button>
					<p><?php echo $message;?></p>
		</form>

	</body>
</html>