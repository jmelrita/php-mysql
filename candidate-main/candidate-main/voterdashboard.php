<?php
session_start();
include('db.php');
if (!(isset($_SESSION['voter_user']))) {
    $message = "Login first";
    header("Location:index.php?message=$message");
}
$user = getrecord('voters', 'voterID', $_SESSION['voter_user']);


if($user[6] == "Yes")
{
	session_destroy();
	header("Location:voted.php");
}

$positions = getallrecords('positions');
$candidates = getallrecords('candidates');

$candidateheader = array('', 'First Name', 'Middle Name', 'Last Name');

$message = "";

if(isset($_POST['vote'])){
    $message = "";
    $i = 1;
    $empty = false;
    foreach($positions as $pos){
        ${"pos$i"} = array();   
        $posName =  strval($pos[1]);
        if(!empty($_POST[$posName]))
		{
            ${"pos$i"} = $_POST[$posName];
			
			
			foreach(${"pos$i"} as $each)
			{
				$fields = array('posID', 'voterID', 'candID');
				$data = array($pos[0], $user[0], $each);
				addrecord('vote', $fields, $data );
			}
			$user_fields = array('voterID', 'voterPass', 'voterFName', 'voterMName', 'voterLName', 'voterStat', 'voted');
			$user_data = array($user[0],$user[1],$user[2],$user[3],$user[4],$user[5],'Yes');
			updaterecord('voters',$user_fields,$user_data);
			
			$message = "You have successfully voted";
			header("Location:voted.php");
		}
        
        if(empty(${"pos$i"})) $empty = true;

        if(count(${"pos$i"}) > $pos[2]) {
            $message = "Select the required number of candidates";
        }

        if($empty)
        {
            $message = "Do not leave it uncheck";
        }
    
        $i++;
    }

 
}
?>


<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Welcome
        <?php echo $_SESSION['firstname'] . " " . $_SESSION['middlename'] . " " . $_SESSION['lastname']; ?>
    </h1>
    <a href="logout.php">Logout</a>


    <p><?php echo $message;?></p>
    <h1>Vote Candidates</h1>
    <form action="voterdashboard.php" method="POST">
        <?php
        foreach ($positions as $pos) {
            echo "<table>";
            echo "<h1>$pos[1]</h1>";
            echo "<p>Note: Select at most $pos[2]</p>";
            echo "<tr>";
            foreach ($candidateheader as $field) {
                echo "<th>$field</th>";
            }
            echo "</tr>";
            foreach ($candidates as $cand) {
                echo "<tr>";
                if ($cand[4] == $pos[0] && $cand[5] == 'Active') {
                    echo "<td><input type='checkbox' value ='$cand[0]' name='$pos[1][]' id='$pos[1][]'></td>";
                    echo "<td>$cand[1]</td>";
                    echo "<td>$cand[2]</td>";
                    echo "<td>$cand[3]</td>";

                }
                echo "</tr>";
            }
            echo "</table>";
            echo "<br><br>";
        }
        ?>
        <button type="submit" name="vote" style="width:100%; height:100px;">Submit</button>
    </form>
</body>

</html>