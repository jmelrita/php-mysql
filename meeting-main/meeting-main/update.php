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

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $newFName = $_POST['newFName'];
        $newMName = $_POST['newMName'];
        $newLName = $_POST['newLName'];
        $newPosition = $_POST['newPosition'];
        $newDept = $_POST['newDept'];
        $newCampus = $_POST['newCampus'];

        $updateSql = "UPDATE employees SET empFName = '$newFName', empMName = '$newMName', empLName = '$newLName', empPosition = '$newPosition', empDept = '$newDept', empCampus = '$newCampus' WHERE empNo = $employeeId";
        $updateResult = mysqli_query($conn, $updateSql);


        if ($updateResult){
            header("Location: index.php");
            exit();
        }else{
            echo "Error Updating Employee Data: " .mysqli_error($conn);
        }
    }

    $fetchSql = "SELECT * FROM employees WHERE empNo = $employeeId";
    $fetchResult = mysqli_query($conn, $fetchSql);
    $employeeData = mysqli_fetch_assoc($fetchResult);
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
                <h2 class = "text-center">Update Employee's Record</h2>
                <p class = "text-muted text-center"> Complete the Form Below to Update the Record of the Employee</p>
            </div>
        

            <form method="POST">
                <div class = "form-group">
                    <label for="newFName" class = "form-label"> First Name </label>
                    <input type="text" class = "form-control" name = "newFName" value = "<?php echo $employeeData['empFName']?>">
                </div>

                <div class = "form-group">
                    <label for="newMName" class = "form-label"> Middle Name </label>
                    <input type="text" class = "form-control" name = "newMName" value = "<?php echo $employeeData['empMName']?>">
                </div>

                <div class = "form-group">
                    <label for="newLName" class = "form-label"> Last Name </label>
                    <input type="text" class = "form-control" name = "newLName" value = "<?php echo $employeeData['empLName']?>">
                </div>

                <div class = "form-group">
                    <label for="newPosition" class = "form-label"> Position </label>
                    <input type="text" class = "form-control" name = "newPosition" value = "<?php echo $employeeData['empPosition']?>">
                </div>

                <div class = "form-group">
                    <label for="newDept" class = "form-label"> Department </label>
                    <input type="text" class = "form-control" name = "newDept" value = "<?php echo $employeeData['empDept']?>">
                </div>
                
                <div class = "form-group">
                    <label for="newCampus" class = "form-label"> Campus </label>
                    <input type="text" class = "form-control" name = "newCampus" value = "<?php echo $employeeData['empCampus']?>">
                </div>


                <button type = "submit" class = "btn btn-success"> Update </button>
            </form>
        </div>
    </body>
</html>