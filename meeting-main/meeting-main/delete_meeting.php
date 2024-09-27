<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "practice";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn){
    die("Connection Failed: ". mysqli_connect_error());
}

if(isset($_GET['id'])){
    $meetingId = $_GET['id'];

    $sql = "DELETE FROM meetings WHERE mtgCode = $meetingId";

    if (mysqli_query($conn, $sql)){
        echo "Meeting $meetingId is Successfuly Deleted.";
    }else{
        echo "Error Deleting the Meeting: " .mysqli_error($conn);
    }
}

header("Location: meetings.php");

mysqli_close($conn);
?>
