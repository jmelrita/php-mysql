<?php include 'connector.php';?>

<button><a href="indexdoctor.php">Home</a></button>
<br></br>

<html>
<head>
<title>Consultation Information</title>
</head>
<body>
   <div>
           <form action="" method="Post">
		   <label>CONSULTATION ID</label>
           <input type="text" name="cid" placeholder="enter cid">	
           <br></br>		   
		   <label>PATIENT ID</label>
           <input type="text" name="pid" placeholder="enter pid">	
           <br></br>
		   <label>DOCTOR'S ID</label>
           <input type="text" name="did" placeholder="enter did">	
           <br></br>
		   <label>CONSULT DATE</label>
           <input type="text" name="cdate" placeholder="enter cdate">	
           <br></br>
		   <label>DIAGNOSIS</label>
           <input type="text" name="diag" placeholder="enter diag">	
           <br></br>
		   <label>PRESCRIPTION</label>
           <input type="text" name="prescr" placeholder="enter prescr">	
           <br></br>
		   
          <input type="submit" name="save_btn" value="Save">
          <button><a href="viewconsult.php">View</a></button>
   </form>
   
   </div>

</body>
</html>
<?php
if(isset ($_POST['save_btn'])){
	
	$cid= $_POST['cid'];
	$pid= $_POST['pid'];
	$did= $_POST['did'];
	$cdate= $_POST['cdate'];
	$diag= $_POST['diag'];
	$prescr= $_POST['prescr'];
	
	$query= "INSERT INTO consult(conid,patid,docid,condate,dia,presc)VALUES('$cid','$pid','$did','$cdate','$diag','$prescr')";
	$data=mysqli_query($con,$query);
	
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