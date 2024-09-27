<?php include 'connector.php';?>


<button><a href="indexdoctor.php">HOME</a></button>
<br></br>

<html>
<head>
 <title>Doctor Information</title>
</head>
<body>
      <div>
	      
		  <form action=" " method="Post">
	          <label>DOCTORID<label>
			  <input type="text" name="doctorid" placeholder="enter doctorid">
			  <br></br>
	          <label>FIRSTNAME<label>
			  <input type="text" name="firstname" placeholder="enter firstname">
			  <br></br>
	          <label>LASTNAME<label>
			  <input type="text" name="lastname" placeholder="enter lastname">
			  <br></br>
			  <label>ADDRESS<label>
			  <input type="text" name="address" placeholder="enter address">
			  <br></br>
			  <label>SPECIALIZATION<label>
			  <input type="text" name="specialization" placeholder="enter specialization">
			  <br></br>
	          <input type="submit" name="save_btn" value=" Save">
			  <button><a href= "viewdoctor.php">View</button>
		 
	     </form>
	  </div>
</body>
</html>

<?php
if (isset ($_POST ['save_btn'])){
	
	$doctorid= $_POST['doctorid'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$address=$_POST['address'];
	$specialization=$_POST['specialization'];
	
	$query= "INSERT INTO doctor(doctorid,firstname,lastname,address,specialization) VALUES('$doctorid','$firstname','$lastname','$address','$specialization')";
	$data = mysqli_query($con,$query);
	
	if($data){
		?>
		<script type="text/javascript">
		alert("Data save Succussfully !")
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