<?php
include('db.php');
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php
		session_start();
		if(isset($_SESSION['username'])){
			header("Location:dashboard.php");
		}
		if(isset($_GET['message']))
			$message = $_GET['message'];
		else
			$message ="";
		
		if(isset($_POST['login'])){
		

			$user = $_POST['username'];
			$pass = $_POST['password'];
			if(!empty($user) && !empty($pass)){
				
				$check_username = getrecord('useradmin','username', $user);
				if(!empty($check_username)){
					if($check_username[0] == $user && $check_username[1] == $pass)
					{	
							
							
							$_SESSION['username'] = $check_username[0];
							$_SESSION['firstname'] = $check_username[2];
							$_SESSION['lastname'] = $check_username[3];
							$message = "Login Success";
							header("Location:dashboard.php?message=".$message);
					}
				}
				else
				{
					$check_voter = getrecord('voters', 'voterID', $user);
					if(!empty($check_voter)){
						if($check_voter[0] == $user && $check_voter[1] == $pass)
						{
							$_SESSION['voter_user'] = $check_voter[0];
							$_SESSION['firstname'] = $check_voter[2];
							$_SESSION['middlename'] = $check_voter[3];
							$_SESSION['lastname'] = $check_voter[4];
							$message = "Login Success";
							header("Location:voterdashboard.php?message=".$message);
						}
					}
				}
			
			}
			else{
				$message = "Fill fields";
			}
		}
		?>
		<form method="POST" action="index.php" align="center">
			<h1>Election System</h1>
		
	
	
			<label for="username">Username</label>
			<input type="text" name="username" id="username">
		

		<br> <br>
	
			<label for="password">Password</label>
			<input type="password" name="password" id="password">
	
			<br>
			<br>
			<button type="submit" name="login" id="login">Login</button>
			<button type="reset">Reset</button>
			
			<p><?php echo $message;?></p>
		</form>
	
	</body>
</html>