<?php
include('db.php');
$message="";
if (isset($_GET['message']))
{
	$message = $_GET['message'];
	
}
session_start();

if(!(isset($_SESSION['username'])))
{
	$message = "Login first";
	header("Location:index.php?message=".$message);
}


$posHeader = array('Position ID', 'Position Name', 'Number of Positions', 'Position Status', 'Actions');
$candHeader = array('Candidate ID', 'Last Name', 'First Name', 'Middle Name', 'Position','Status', 'Actions');
$voteHeader = array('Voter ID', 'Password', 'Last Name', 'First Name', 'Middle Name', 'Status', 'Voted', 'Actions');

$positions = getallrecords('positions');
$candidates = getallrecords('candidates');
$voters = getallrecords('voters');


?>

<html>
	<head>
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h1>Welcome! <?php echo ucfirst($_SESSION['username'])." | ".$_SESSION['firstname']." ".$_SESSION['lastname']?></h1>
		<a href="logout.php">Logout</a>
		<br>
		<br>
		
		<a href="electionresults.php">Election Results</a>
		<a href="electionwinners.php"> Election Winners</a>
		
		<p><?php echo $message;?></p>
		
		<h1>Positions</h1>
		<a href="addposition.php">Add Position</a>
		<table>
			<tr>
			<?php 
				foreach($posHeader as $field){
					echo "<th>$field</th>";
				}
			?>
			</tr>
			<?php 
				foreach($positions as $pos)
				{
					echo "<tr>";
					foreach($pos as $field){
						echo "<td>$field</td>";
					}
					echo "<td><a href='delete.php?posID=$pos[0]'>Delete</a>  <a href='editposition.php?id=$pos[0]'>Edit</a></td>";
					echo "</tr>";
				}
			?>
		</table>
		<br>
		<br>
		<h1>Canditates</h1>
		<a href="addcandidate.php">Add Canditate</a>
		<table>
			<tr>
			<?php 
				foreach($candHeader as $field){
					echo "<th>$field</th>";
				}
			?>
			</tr>
			<?php 
				foreach($candidates as $cand)
				{
					echo "<tr>";
					$i = 0;
					foreach($cand as $field){
						
						if($i==4){
							foreach($positions as $pos)
							{
								if ($pos[0] == $field){
									echo "<td>$pos[1]</td>";
								}
								
							}
						}
						else{
							echo "<td>$field</td>";
						}
						$i++;
					}
					echo "<td><a href='delete.php?candID=$cand[0]'>Delete</a>  <a href='editcandidate.php?id=$cand[0]'>Edit</a></td>";
					echo "</tr>";
				}
			?>
		</table>
		<br>
		<br>
		<h1>Voters</h1>
		<a href="addvoter.php">Add Voters</a>
		<table>
			<tr>
				<?php 
				foreach($voteHeader as $field){
					echo "<th>$field</th>";
				}
			?>
			</tr>
			<?php 
				foreach($voters as $vote)
				{
					echo "<tr>";
					foreach($vote as $field){
						echo "<td>$field</td>";
					}
					echo "<td><a href='delete.php?voterID=$vote[0]'>Delete</a>  <a href='editvoter.php?voterID=$vote[0]'>Edit</a></td>";
					echo "</tr>";
				}
			?>
		</table>
		
	</body>
</html>