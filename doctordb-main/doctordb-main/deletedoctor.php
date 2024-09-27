<?php include 'connector.php';
$id=$_GET['id'];
$query="DELETE FROM doctor WHERE id='$id' ";
$data= mysqli_query($con,$query);
if($data){
	?>
	<script type="text/javascript">
	      alert("Data Deleted Successfully!");
		  window.open("http://localhost/cruddoctor/viewdoctor.php","_self");
		  </script>
	<?php	
  }
  else{
	  ?>
	  <script type= "text/javascript">
		 alert("Please try again!");
		</script>
	  <?php
  }

?>