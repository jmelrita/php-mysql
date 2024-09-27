<?php
include('db.php');
if(isset($_GET['posID'])){
	$posID = $_GET['posID'];
	$delpos = deleterecord('positions','posID', $posID);
	
	$message = "Delete Position Success";
	header("Location:dashboard.php?message=$message");
}

if(isset($_GET['candID']))
{
	$candID = $_GET['candID'];
	$delcand = deleterecord('candidates','candID', $candID);
	
	$message = "Delete Candidate Success";
	header("Location:dashboard.php?message=$message");
}
if(isset($_GET['voterID'])){
	$voterID = $_GET['voterID'];
	$delvoter = deleterecord('voters', 'voterID', $voterID);
	$message = "Delete Voter Success";
	header("Location:dashboard.php?message=$message");
}
else{
	$message = "Delete Failed";
	header("Location:dashboard.php?message=$message");
}
?>