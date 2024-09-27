<?php include 'connector.php'?>


<button><a href="addconsult.php">Add</a></button>
<br></br>

<table border="1px" cellpadding="10px" cellspacing="0">

       <tr>
	    <th></th>
		
	   <th>CONSULTATION ID</th>
	   <th>PATIENT ID</th>
	   <th>DOCTOR'S ID</th>
	   <th>CONSULT DATE</th>
	   <th>DIAGNOSIS</th>
	   <th>PRESCRIPTION</th>
	   
	   <th colspan="2">Actions</th>
	   </tr>
	   <?php
	    $query="SELECT * FROM consult ";
		$data=mysqli_query ($con,$query);
		$result=mysqli_num_rows ($data);
		if ($result){
			
			while ($row=mysqli_fetch_array($data)){
				?>
				      <tr>
					         <td><?php echo $row['id'] ?></td>
					      <td><?php echo $row['conid'] ?></td>
						  <td><?php echo $row['patid'] ?></td>
						  <td><?php echo $row['docid'] ?></td>
						  <td><?php echo $row['condate'] ?></td>
						  <td><?php echo $row['dia'] ?></td>
						   <td><?php echo $row['presc'] ?></td>
						  
						  <td><a href="updateconsult.php?id=<?php echo $row['id']; ?>">Edit<a/> </td>
						  
						  
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