<?php include 'connector.php';?>

<button><a href="indexdoctor.php">Home</a></button>
<br></br>

<html>
<head>
  <title>Patient Information</title>
</head>
    <body>
	     <div>
		  <form action="" method="Post">
		     <label>PatientId</label>
			<input type="text" name="pid" placeholder="enter pid">
			<br></br>
		    <label>Firstname</label>
			<input type="text" name="pfname" placeholder="enter pfname">
			<br></br>
			<label>Lastname</label>
			<input type="text" name="plname" placeholder="enter lastname">
			<br></br>
		    <label>Birthdate</label>
			<input type="text" name="pbdate" placeholder="enter pbdate">
			<br></br>
			<label>ContactNo</label>
			<input type="text" name="pcno" placeholder="enter pcno">
			<br></br>
			
			<input type="submit" name="save_btn" value="Save">
			<button><a href= "viewpatient.php">View</button>
			
		  </form>
		 </div>	
	</body>
</html>
<?php

if (isset ($_POST ['save_btn'])){
	
	$pid= $_POST['pid'];
	$pfname=$_POST['pfname'];
	$plname=$_POST['plname'];
	$pbdate=$_POST['pbdate'];
	$pcno=$_POST['pcno'];
	
	$query= " INSERT INTO patient(patid,patfname,patlname,patbdate,pcno) VALUES('$pid','$pfname','$plname','$pbdate','$pcno')";
	$data= mysqli_query($con,$query);
	
	if($data){
		?>
		<script type="text/javascript">
		alert("Patient info added successfully")
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
		alert("Please try again!")
		</script>
		<?php
	}
}
?>
