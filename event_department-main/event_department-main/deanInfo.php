<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dean Info</title>
</head>
<body style="text-align: center;">
<?php
        include("dbcon.php");
        include("nav.php");

        if(isset($_POST["save"])){
            $userName = $_SESSION['currentUser'];
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $mobile = $_POST["mobile"];
            $deptID = $_POST["deptID"];

            $sql = "SELECT * FROM dean WHERE userName=$userName";
            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) === 0){
                $sql = "INSERT INTO `dean`(`userName`,`fName`, `lName`, `mobile`, `deptID`) VALUES ($userName,'$fname','$lname','$mobile',$deptID)";
                mysqli_query($con, $sql);
                header("location: menu.php");
            }else{
                echo "Already exist";
            }
        }

    ?>
    </br>
    <a href="menu.php">BACK</a>
    <h1>Dean Info</h1>
    <form method="POST" action="deanInfo.php">
        <label>Username:<label>
        </br>
        <input type="number" name="userName" value="<?php echo $_SESSION['currentUser']?>" readonly/>
        </br></br>
        <label>Firstname:<label>
        </br>
        <input type="text" name="fname" required />
        </br></br>
        <label>Lastname:<label>
        </br>
        <input type="text" name="lname" required />
        </br></br>
        <label>Mobile:<label>
        </br>
        <input type="text" name="mobile" maxlength="11" required/>
        </br></br>
        <label>Department:<label>
        <select name="deptID">
            <?php
                $sql = "SELECT * FROM department";
                $result = mysqli_query($con, $sql);
                
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result)){
                        echo "<option value=$row[deptID]>$row[deptName]</option>";
                    }
                }
           
            ?>
        </select>
        </br></br>
        <button type="submit" name="save">SAVE</button>
    </form>
</body>
</html>