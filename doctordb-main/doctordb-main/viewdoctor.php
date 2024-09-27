<?php include 'connector.php'?>


<button><a href="adddoctor.php">Add</a></button>
<br></br>

<table border="1px" cellpadding="10px" cellspacing="0">

       <tr>
	    <th></th>
		
	   <th>DoctorID</th>
	   <th>Firstname</th>
	   <th>Lastname</th>
	   <th>Address</th>
	   <th>Specialization</th>
	   
	   <th colspan="2">Actions</th>
	   </tr>
	   <?php
	    $query="SELECT * FROM doctor ";
		$data=mysqli_query ($con,$query);
		$result=mysqli_num_rows ($data);
		if ($result){
			
			while ($row=mysqli_fetch_array($data)){
				?>
				      <tr>
					       <td><?php echo $row['id'] ?></td>
					      <td><?php echo $row['doctorid'] ?></td>
						  <td><?php echo $row['firstname'] ?></td>
						  <td><?php echo $row['lastname'] ?></td>
						  <td><?php echo $row['address'] ?></td>
						  <td><?php echo $row['specialization'] ?></td>
						  
						  <td><a href="updatedoctor.php?id=<?php echo $row['id']; ?>">Edit<a/> </td>
						  <td><a href="deletedoctor.php?id=<?php echo $row['id']; ?>">Delete<a/> </td>
						  
					  </tr>
				<?php
				
   	    	}
		}
		else
		{
		?>
		<tr>
		    <td>No Record Found</td>
		
		</tr>
		
		<?php
		}
	   ?>
</table>