<?php include 'connector.php';
$id=$_GET['id'];
$select=" SELECT * FROM doctor WHERE id= '$id'";
$data=mysqli_query($con,$select);
$row=mysqli_fetch_array($data);
?>

 <div>
	  <form action ="" method="Post">
			
	   <label>DoctorId</label>
	   <input value="<?php echo $row['doctorid']?>" type="text" name="doctorid" placeholder="enter doctorid">
	   <br></br>
	   <label>Firstname</label>
	   <input value="<?php echo $row['firstname']?>" type="text" name="firstname" placeholder="enter firstname">
	   <br></br>
	   <label>Lastname</label>
	   <input value="<?php echo $row['lastname']?>" type="text" name="lastname" placeholder="enter lastname">
	   <br></br>
	   <label>Address</label>
	   <input value="<?php echo $row['address']?>" type="text" name="address" placeholder=" enter address">
	   <br></br>
	   <label>Specialization</label>
	   <input value="<?php echo $row['specialization']?>" type="text" name="specialization" placeholder="specialization">
	   <br></br>
	   <input type="submit" name="update_btn" value="Save">
	   <button><a href= "viewdoctor.php">Back</button>
		 
	  </form>
</div>

<?php
 if (isset ($_POST ['update_btn'])){
	 
	 $doctorid=$_POST ['doctorid'];
	 $firstname=$_POST['firstname'];
	 $lastname=$_POST['lastname'];
	 $address=$_POST['address'];
	 $specialization=$_POST['specialization'];
	
	 
	 $update="UPDATE  doctor SET doctorid='$doctorid', firstname='$firstname', lastname='$lastname', address='$address', specialization='$specialization' WHERE id='$id'";
	  $data = mysqli_query($con,$update);
	 if ($data){
		?>
		 <script type= "text/javascript">
		 alert("Data Updated successfully!")
		 window.open("http://localhost/cruddoctor/viewdoctor.php","_self");
		</script>
		<?php
		 
	 }
	 else
	 {
		?>
		 <script type= "text/javascript">
		 alert("Please try again!")
		</script>
		<?php
		 
	 }
 }

?>