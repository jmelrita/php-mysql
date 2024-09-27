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
    $employeeId = $_GET['id'];

    $sql = "DELETE FROM employees WHERE empNo = $employeeId";

    if (mysqli_query($conn, $sql)){
        echo "Employee $employeeId is Successfuly Deleted.";
    }else{
        echo "Error Deleting the Employee: " .mysqli_error($conn);
    }
}

header("Location: index.php");

mysqli_close($conn);
?>
