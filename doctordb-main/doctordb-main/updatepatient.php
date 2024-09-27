<?php include 'connector.php';
$id=$_GET['id'];
$select=" SELECT * FROM patient WHERE id= '$id'";
$data=mysqli_query($con,$select);
$row=mysqli_fetch_array($data);
?>

 <div>
	  <form action ="" method="Post">
			
	   <label>PatientId</label>
	   <input value="<?php echo $row['patid']?>" type="text" name="pid" placeholder="enter pid">
	   <br></br>
	   <label>Firstname</label>
	   <input value="<?php echo $row['patfname']?>" type="text" name="pfname" placeholder="enter pfname">
	   <br></br>
	   <label>Lastname</label>
	   <input value="<?php echo $row['patlname']?>" type="text" name="plname" placeholder="enter plname">
	   <br></br>
	   <label>Birthdate</label>
	   <input value="<?php echo $row['patbdate']?>" type="text" name="pbdate" placeholder=" enter pbdate">
	   <br></br>
	   <label>ContactNo</label>
	   <input value="<?php echo $row['pcno']?>" type="text" name="pcno" placeholder="enter pcno">
	   <br></br>
	   <input type="submit" name="update_btn" value="Save">
	   <button><a href= "viewpatient.php">Back</button>
		 
	  </form>
</div>

<?php
 if (isset ($_POST ['update_btn'])){
	 
	 $pid=$_POST ['pid'];
	 $pfname=$_POST['pfname'];
	 $plname=$_POST['plname'];
	 $pbdate=$_POST['pbdate'];
	 $pcno=$_POST['pcno'];
	
	 
	 $update="UPDATE  patient SET patid='$pid', patfname='$pfname', patlname='$plname', patbdate='$pbdate', pcno='$pcno' WHERE id='$id'";
	  $data = mysqli_query($con,$update);
	 if ($data){
		?>
		 <script type= "text/javascript">
		 alert("Data Updated successfully!")
		 window.open("http://localhost/cruddoctor/viewpatient.php","_self");
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