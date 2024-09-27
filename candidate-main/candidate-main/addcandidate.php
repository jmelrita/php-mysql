<?php
include('db.php');
$message = "";

if(isset($_GET['addcandidate'])){
	
	$candID = $_GET['candID'];
	$candFName = $_GET['candFName'];
	$candMName = $_GET['candMName'];
	$candLName = $_GET['candLName'];
	$position = $_GET['position'];
	$candStat = $_GET['candStat'];
	
	if(!empty($candID) && !empty($candFName) && !empty($candMName) && !empty($candLName) && !empty($position) && !empty($candStat)){
		$field = array('candID', 'candFName', 'candMName', 'candLName', 'posID', 'candStat');
		$data = array($candID, $candFName, $candMName, $candLName,$position,$candStat);
		$addcand = addrecord('candidates', $field, $data);
		
		$message = "Candidate Added";
		header("Location:dashboard.php?message=$message");
	}
	else
	{
		$message = "Fill fields";
	}
}
?>

<html>
	<head>
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
		
		<form action="addcandidate.php" align="center">
			<a href="dashboard.php"><- Go back</a> <br><br>
			<label for="candID">Candidate ID</label>
			<input type="text" name="candID" id="candID">
		
			<br>
		
			<label for="candFName">Candidate First Name</label>
			<input type="text" name="candFName" id="candFName">
			<br>
			
			<label for="candMName">Candidate Middle Name</label>
			<input type="text" name="candMName" id="candMName">
			<br>
			
			<label for="candLName">Candidate Last Name</label>
			<input type="text" name="candLName" id="candLName">
			<br>
			

			<label for="position">Position</label>
			<select id="position" name="position">
				<?php 
				$pos = getallrecords('positions');
				
				foreach($pos as $p){
						echo "<option value='$p[0]'>$p[1]</option>";
				}
				?>
			</select>
			<br>
			
			
			<label for="candStat">Candidate Status</label>
				<select id="candStat" name="candStat">
					<option value="Active">Active</option>
					<option value="Inactive">Inactive</option>
				</select>
			<br><br>
			<button type="submit" name="addcandidate">
				Submit
			</button>
					<p><?php echo $message;?></p>
		</form>

	</body>
</html>