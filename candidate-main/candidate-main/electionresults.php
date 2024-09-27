<?php
include('db.php');
$candHeader = array('Position', 'First Name','Middle Name','Last Name', 'Number of Votes');

global $conn;
connect();

$sql = "SELECT positions.posName, candidates.candFName, candidates.candMName, candidates.candLName, count(vote.candID) as numVotes FROM 
candidates,vote, positions WHERE candidates.candID = vote.candID AND candidates.posID = positions.posID GROUP BY candidates.candID";

$query = mysqli_query($conn, $sql);

$rows = mysqli_fetch_all($query);


?>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h1>Election Results</h1>
		<a href="dashboard.php"><- Go back </a>
		<br>
		<br>
		<table>
			<tr>
			<?php 
				foreach($candHeader as $field){
					echo "<th>$field</th>";
				}
			?>
			
			</tr>
			<?php
				foreach($rows as $row)
				{
					echo "<tr>";
					foreach($row as $field){
						echo "<td>$field</td>";
					}
					echo "</tr>";
				}
			?>
		</table>
		<br>
		<br>
	</body>
</html>
