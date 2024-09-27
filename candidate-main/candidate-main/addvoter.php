<?php 
include('db.php');

$message = "";

if(isset($_GET['addvoter'])){
    
    $voterID = $_GET['voterID'];
    $voterPass = $_GET['voterPass'];
    $voterFName = $_GET['voterFName'];
    $voterMName = $_GET['voterMName'];
    $voterLName = $_GET['voterLName'];
    $voterStat = $_GET['voterStat'];
    $voted = $_GET['voted'];


    if(!empty($voterID) &&  !empty($voterPass) && !empty($voterFName) && !empty($voterMName) && !empty($voterLName) && 
    !empty($voterStat) && !empty($voted)){
        $field = array('voterID', 'voterPass', 'voterFName', 'voterMName', 'voterLName', 'voterStat',  'voted');
        $data = array($voterID,$voterPass, $voterFName, $voterMName, $voterLName,$voterStat,$voted);
        $addvote = addrecord('voters', $field, $data);
        $message ="Voter added";
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
		
		<form action="addvoter.php" align="center">
			<a href="dashboard.php"><- Go back</a> <br><br>
			<label for="voterID">Voter ID</label>
			<input type="text" name="voterID" id="voterID">
		
			<br>
		
			<label for="voterPass">Voter Password</label>
			<input type="password" name="voterPass" id="voterPass">
			<br>
			

			<label for="voterFName">First Name</label>
			<input type="text" name="voterFName" id="voterFName">
			<br>
            <label for="voterMName">Middle Name</label>
			<input type="text" name="voterMName" id="voterMName">
			<br>
            <label for="voterLName">Last Name</label>
			<input type="text" name="voterLName" id="voterLName">
			<br>
			
			
			<label for="voterStat">Voter Status</label>
				<select id="voterStat" name="voterStat">
					<option value="Active">Active</option>
					<option value="Inactive">Inactive</option>
				</select>

            <br>
			<label for="voted">Voted</label>
				<select id="voted" name="voted">
                    <option value="No">No</option>
					<option value="Yes">Yes</option>
				</select>
			<br><br>
			<button type="submit" name="addvoter">
				Submit
			</button>
					<p><?php echo $message;?></p>
		</form>

	</body>
</html>