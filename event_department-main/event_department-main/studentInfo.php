<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align: center;">
    <?php   
        include("dbcon.php");
        include("nav.php");

        if(isset($_POST['save'])){
            $idNum = $_POST['idNum'];
            $eventID = $_POST['eventID'];
            $lastName = $_POST['lastName'];
            $firstName = $_POST['firstName'];
            $middleInit = $_POST['middleInit'];
            $course = $_POST['course'];
            $year = $_POST['year'];
            $civilStatus = $_POST['civilStatus'];
            $gender = $_POST['gender'];
            $birthdate = $_POST['birthdate'];
            $contactNo = $_POST['contactNo'];
            $address = $_POST['address'];
            $coachID = $_POST['coachID'];

            $sql = "SELECT * FROM coach WHERE userName=$coachID";
            $result = mysqli_query($con,$sql);    
            $row = mysqli_fetch_array($result);
            $coachDeptID = $row['deptID'];
            
            $deanID;
            $deptID;
            $sql = "SELECT dean.userName, dean.deptID, department.deptID AS ID, department.deptName FROM dean INNER JOIN department ON dean.deptID = department.deptID WHERE department.deptName = '$course'";
            $result = mysqli_query($con, $sql);
            if($row=mysqli_fetch_array($result)){
                $deanID = $row['userName'];
                $deptID = $row['ID'];
                if($deptID === $coachDeptID ){
                    $sql = "INSERT INTO `athlete`(`idNum`, `eventID`, `deptID`, `lastName`, `firstName`, `middleInit`, `course`, `year`, `civilStatus`, `gender`, `birthdate`, `contactNo`, `address`, `coachID`, `deanID`) VALUES ($idNum,$eventID,$deptID,'$lastName','$firstName','$middleInit','$course',$year,'$civilStatus','$gender','$birthdate','$contactNo','$address',$coachID,$deanID)";
                    $result = mysqli_query($con, $sql);
                    echo "Successful";
                }else{
                    echo "Course does'nt match with Coach Department.";
                }
            }else{
                echo "Failed";
            }
            
               
        }
    
        
    ?>
    </br>
    <a href="menu.php">BACK</a>
    <h1>Athlete Info</h1>
    <form method="POST" action="studentInfo.php">
        <label>ID:</label>
        </br>
        <input type="number" name="idNum" value=<?php echo $_SESSION['currentUser']?> readonly />
        </br></br>
        <label>Event:</label>
        </br>
        <select name="eventID" required>
            <?php
                $sql = "SELECT * FROM event";
                $result = mysqli_query($con,$sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value=$row[eventID]>$row[eventName]</option>";
                }
            ?>
        </select>
        </br></br>
        <label>Lastname:</label>
        </br>
        <input type="text" name="lastName" required/>
        </br></br>
        <label>Firstname:</label>
        </br>
        <input type="text" name="firstName" required/>
        </br></br>
        <label>Middle Initial:</label>
        </br>
        <input type="text" name="middleInit" required/>
        </br></br>
        <label>Course:</label>
        </br>
        <select name="course" required>
            <option value="BSIT">BSIT</option>
            <option value="BSCS">BSCS</option>
            <option value="BSCP">BSCP</option>
        </select>
        </br></br>
        <label>Year:</label>
        </br>
        <select name="year" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        </br></br>
        <label>Civil Status:</label>
        </br>
        <select name="civilStatus" required>
            <option value="single">Single</option>
            <option value="married">Married</option>
            <option value="divorced">Divorced</option>
            <option value="widowed">Widowed</option>
        </select>
        </br></br>
        <label>Gender:</label>
        </br>
        <input type="radio" name="gender" value="male" required/><label>Male</label>
        <input type="radio" name="gender" value="female" required/><label>Female</label>
        <input type="radio" name="gender" value="others" required/><label>Others</label>
        </br></br>
        <label>Birthdate:</label>
        </br>
        <input type="date" name="birthdate" required/>
        </br></br>
        <label>Contact #:</label>
        </br>
        <input type="text" name="contactNo" required/>
        </br></br>
        <label>Address:</label>
        </br>
        <input type="text" name="address" required/>
        </br></br>
        <label>Coach:</label>
        </br>
        <select name="coachID" required>
            <?php
                $sql = "SELECT * FROM coach";
                $result = mysqli_query($con,$sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value=$row[userName]>$row[fName] $row[lName]</option>";
                }
            ?>
        </select>
        </br></br>
        <button type="submit" name="save">SAVE</button>
    </form>
</body>
</html>