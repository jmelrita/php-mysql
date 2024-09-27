<?php
include('db.php');


$positions = getallrecords('positions');
$header = array('First Name','Middle Name','Last Name', 'Number of Votes');
?>
<html>
	<head>
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<h1>
	Election Winners
	</h1>
	
	<a href="dashboard.php"> <- Go back</a>
	
	<?php
		foreach($positions as $pos){
			
			echo "<h1>$pos[1]</h1>";
			echo "<table>";
			echo "<tr>";
			foreach($header as $field){
				echo "<th>$field</th>";
			}
			echo "</tr>";
		
			global $conn;
			connect();
			$sql = "select positions.posName, candidates.candFName, candidates.candLName, count(vote.candID) as numVotes FROM candidates,vote,positions WHERE candidates.candID = vote.candID AND candidates.posID = positions.posID AND candidates.posID = $pos[0] GROUP BY candidates.candID ORDER BY count(vote.candID) DESC LIMIT $pos[2]";
			$query = mysqli_query($conn, $sql);
			
			$rows = mysqli_fetch_all($query);
			
			
			foreach($rows as $row){
				echo "<tr>";
				foreach($row as $field){
					echo "<td>$field</td>";
				}
				echo "</tr>";
			}
		
			echo "</table>";
		}
	
	?>
	</body>
</html>