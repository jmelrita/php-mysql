<?php 
include('db.php');
$message = "";
if(isset($_GET['id']))
{
	$id = $_GET['id']; 
	$cand = getrecord('candidates', 'candID', $id);
}
else
	$id ="";
	

if(isset($_GET['editcandidate'])){
	$candID = $_GET['candID'];
	$candFName = $_GET['candFName'];
	$candMName = $_GET['candMName'];
	$candLName = $_GET['candLName'];
	$position = $_GET['position'];
	$candStat = $_GET['candStat'];
	if(!empty($candID) && !empty($candFName) && !empty($candMName) && !empty($candLName) && !empty($position) && !empty($candStat))
	{
		$fields = array('candID', 'candFName', 'candMName', 'candLName', 'posID', 'candStat');
		$data = array($candID,$candFName,$candMName,$candLName,$position, $candStat);
		$editcand = updaterecord('candidates', $fields, $data );
		$message = "Candidate Update Success";
		header("Location:dashboard.php?message=$message");
	}
	else
	{
		$message = "Fill Fields";
		$cand = array($candID,$candFName,$candMName,$candLName, $position, $candStat );
	}
}
?>

<html>
	<head>
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
		
		<form action="editcandidate.php" align="center">
			<a href="dashboard.php"><- Go back</a> <br><br>
			<label for="candID">Candidate ID</label>
			<input type="text" name="candID" id="candID" value="<?php echo $cand[0]; ?>">
		
			<br>
		
			<label for="candFName">Candidate First Name</label>
			<input type="text" name="candFName" id="candFName" value="<?php echo $cand[1]; ?>">
			<br>
			
			<label for="candMName">Candidate Middle Name</label>
			<input type="text" name="candMName" id="candMName" value="<?php echo $cand[2]; ?>">
			<br>
			
			<label for="candLName">Candidate Last Name</label>
			<input type="text" name="candLName" id="candLName" value="<?php echo $cand[3]; ?>"> 
			<br>
			

			<label for="position">Position</label>
			<select id="position" name="position">
				<?php 
				$pos = getallrecords('positions');
				
				foreach($pos as $p){
						if($p[0] == $cand[4])
						echo "<option value='$p[0]' selected>$p[1]</option>";
						else
						echo "<option value='$p[0]' >$p[1]</option>";
				}
				?>
			</select>
			<br>
			
			
			<label for="candStat">Candidate Status</label>
				<select id="candStat" name="candStat">
					<?php
						if($cand[5]=='Active')
						echo "<option value='Active' selected>Active</option>";
						else
						echo "<option value='Active'>Active</option>";
						if($cand[5] == 'Inactive')
						echo "<option value='Inactive' selected>Inactive</option>";
						else
						echo "<option value='Inactive'>Inactive</option>";
					?>
				</select>
			<br><br>
			<button type="submit" name="editcandidate">
				Update
			</button>
					<p><?php echo $message;?></p>
		</form>

	</body>
</html>