<?php include 'connector.php'?>


<button><a href="addpatient.php">Add</a></button>
<br></br>

<table border="1px" cellpadding="10px" cellspacing="0">

       <tr>
	    <th></th>
		
	   <th>Patient Id</th>
	   <th>Firstname</th>
	   <th>Lastname</th>
	   <th>Birthdate</th>
	   <th>Concta No.</th>
	   
	   <th colspan="2">Actions</th>
	   </tr>
	   <?php
	    $query="SELECT * FROM patient ";
		$data=mysqli_query ($con,$query);
		$result=mysqli_num_rows ($data);
		if ($result){
			
			while ($row=mysqli_fetch_array($data)){
				?>
				      <tr>
					         <td><?php echo $row['id'] ?></td>
					      <td><?php echo $row['patid'] ?></td>
						  <td><?php echo $row['patfname'] ?></td>
						  <td><?php echo $row['patlname'] ?></td>
						  <td><?php echo $row['patbdate'] ?></td>
						  <td><?php echo $row['pcno'] ?></td>
						  
						  <td><a href="updatepatient.php?id=<?php echo $row['id']; ?>">Edit<a/> </td>
						  <td><a href="deletepatient.php?id=<?php echo $row['id']; ?>">Delete<a/> </td>
						  
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