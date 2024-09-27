<?php 
include('db.php');
$message="";
if(isset($_GET['voterID'])){
    $voterID = $_GET['voterID'];
    $voter = getrecord('voters','voterID', $voterID);
}

if(isset($_GET['editvoter'])){
 
    $voterID      = $_GET['voterID'];
    $voterPass    = $_GET['voterPass'];
    $voterFName   = $_GET['voterFName']; 
    $voterMName   = $_GET['voterMName'];
    $voterLName   = $_GET['voterLName'];
    $voterStat    = $_GET['voterStat'];
    $voted        = $_GET['voted'];

    if(!empty($voterID) &&    
    !empty($voterPass) && 
    !empty($voterFName) &&
    !empty($voterMName) &&
    !empty($voterLName) &&
    !empty($voterStat)  &&
    !empty($voted) )
    {
        $field = array('voterID', 'voterPass', 'voterFName','voterMName','voterLName', 'voterStat', 'voted');
        $data = array($voterID,
        $voterPass,
        $voterFName,
        $voterMName,
        $voterLName,
        $voterStat,
        $voted);
        
        $editvoter = updaterecord('voters',$field, $data);
        $message = "Update Successful";
        header("Location:dashboard.php?message=$message");
    }
    else{
        $message = "Fill Fields";
    }
}   
?>

<html>
	<head>
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
		
		<form action="editvoter.php" align="center">
			<a href="dashboard.php"><- Go back</a> <br><br>
			<label for="voterID">Voter ID</label>
			<input type="text" name="voterID" id="voterID" value="<?php echo $voter[0];?>">
		
			<br>
		
			<label for="voterPass">Voter Password</label>
			<input type="text" name="voterPass" id="voterPass" value="<?php echo $voter[1];?>">
			<br>
			

			<label for="voterFName">First Name</label>
			<input type="text" name="voterFName" id="voterFName" value="<?php echo $voter[2];?>">
			<br>
            <label for="voterMName">Middle Name</label>
			<input type="text" name="voterMName" id="voterMName" value="<?php echo $voter[3];?>">
			<br>
            <label for="voterLName">Last Name</label>
			<input type="text" name="voterLName" id="voterLName" value="<?php echo $voter[4];?>">
			<br>
			
			
			<label for="voterStat">Voter Status</label>
				<select id="voterStat" name="voterStat">
                    <?php 
                    if($voter[5] == 'Active')
                    echo '<option value="Active" selected>Active</option>';
                    else
                    echo '<option value="Active">Active</option>';

                    if($voter[5] == 'Inactive')
                    echo '<option value="Inactive" selected>Inactive</option>';
                    else
                    echo '<option value="Inactive">Inactive</option>';
                    ?>
				</select>

            <br>
			<label for="voted">Voted</label>
				<select id="voted" name="voted">
                    <?php 
                    if($voter[6] == 'No')
                    echo '<option value="No" selected>No</option>';
                    else
                    echo '<option value="No">No</option>';
                    if($voter[6] == 'Yes')
                    echo '<option value="Yes" selected>Yes</option>';
                    else
                    echo '<option value="Yes">Yes</option>';
                    ?>
                    
					
				</select>
			<br><br>
			<button type="submit" name="editvoter">
				Update
			</button>
					<p><?php echo $message;?></p>
		</form>

	</body>
</html>