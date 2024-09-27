<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
</head>

<body style="text-align:center;">
    <?php
    include ("dbcon.php");
    include ("nav.php");

    if (isset($_POST['save'])) {
        $deptID = $_POST['deptID'];
        $deptName = $_POST['deptName'];

        $sql = "SELECT * FROM department WHERE deptID='$deptID' AND deptName='$deptName'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "Department alreay existed.";
        } else {
            $sql = "INSERT INTO `department`(`deptID`, `deptName`) VALUES ($deptID,'$deptName')";
            mysqli_query($con, $sql);
            header("location: menu.php");
        }
    }
    ?>
    </br>
    <a href="menu.php">BACK</a>
    <h1>Create Department</h1>
    <form method="POST" action="addDepartment.php">
        <label>Department ID:</label>
        </br>
        <input type="number" name="deptID" required />
        </br></br>
        <label>Department Name:</label>
        </br>
        <input type="text" name="deptName" required>
        </br></br>
        <button type="submit" name="save">SAVE</button>
    </form>
</body>

</html>