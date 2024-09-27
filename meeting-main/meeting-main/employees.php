<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "practice";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn){
    die("Connection Failed: ". mysqli_connect_error());
}

if(isset($_POST['submit'])){
    $empFName = $_POST['empFName'];
    $empMName = $_POST['empMName'];
    $empLName = $_POST['empLName'];
    $empPosition = $_POST['empPosition'];
    $empDept = $_POST['empDept'];
    $empCampus = $_POST['empCampus'];

    $sql = "INSERT INTO employees (empNo, empFName, empMName, empLName, empPosition, empDept, empCampus) 
    VALUES ('$empNo', '$empFName', '$empMName', '$empLName', '$empPosition', '$empDept', '$empCampus')";

    if (mysqli_query($conn, $sql)){
        header("Location: index.php");
        exit();
    }else{
        echo "Error" .mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>

<html lang = "en">
    <head>
        <title>Add Employees</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <div class = "navbar">
            <div class = "dropdown-content">
                <a href="index.php" class = "btn btn-primary my-5">Return</a>
            </div>
        </div>
        
        <div class = "container">
            <div class = "text-center mb-4">
                <h2 class = "text-center">Adding New Employees</h2>
                <p class = "text-muted text-center"> Complete the Form Below to Add New Employee</p>
            </div>
        

            <form method="POST">
                <div class = "form-group">
                    <label for="empFName" class = "form-label"> First Name</label>
                    <input type="text" class = "form-control" name = "empFName" placeholder="">
                </div>

                <div class = "form-group">
                    <label for="empMName" class = "form-label"> Middle Name </label>
                    <input type="text" class = "form-control" name = "empMName" placeholder="">
                </div>

                <div class = "form-group">
                    <label for="empLName" class = "form-label"> Last Name </label>
                    <input type="text" class = "form-control" name = "empLName" placeholder="">
                </div>

                <div class = "form-group">
                    <label for="empPosition" class = "form-label"> Position Name </label>
                    <input type="text" class = "form-control" name = "empPosition" placeholder="">
                </div>

                <div class = "form-group">
                    <label for="empDept" class = "form-label"> Department </label>
                    <input type="text" class = "form-control" name = "empDept" placeholder="">
                </div>

                <div class = "form-group">
                    <label for="empCampus" class = "form-label"> Campus </label>
                    <input type="text" class = "form-control" name = "empCampus" placeholder="">
                </div>

                <button type = "submit" class = "btn btn-success" name = "submit"> Save </button>
            </form>
        </div>
    </body>
</html>