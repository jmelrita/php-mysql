<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Athletes</title>
</head>
<body style="text-align:center;">
<?php
        include("dbcon.php");
        include("nav.php");

        if(isset($_GET['approve'])){
            $idNum = $_GET['approve'];
            $date = date('F j Y h:i:s A');

            echo $date;
            $sql = "UPDATE `athlete` SET `status`='Approved',`approveDate`='$date' WHERE idNum=$idNum";
            $result = mysqli_query($con, $sql);
            header("location: athletes.php");
        }

        if(isset($_GET['disapprove'])){
            $idNum = $_GET['disapprove'];
            $date = date('F j Y h:i:s A');

            echo $date;
            $sql = "UPDATE `athlete` SET `status`='Disapproved',`approveDate`='$date' WHERE idNum=$idNum";
            $result = mysqli_query($con, $sql);
            header("location: athletes.php");
        }
        
    ?>
    </br>
    <a href="menu.php">BACK</a>

    <h1>MY ATHLETES</h1>
    <center>
    <table border=1>
        <thead>
            <tr>
                <th>ID</th>
                <th>Event ID</th>
                <th>Department ID</th>
                <th>Full Name</th>
                <th>Course</th>
                <th>Year</th>
                <th>Civil Status</th>
                <th>Gender</th>
                <th>Birthdate</th>
                <th>Contact #</th>
                <th>Address</th>
                <th>Status</th>
                <th>Approved/Disapproved Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $coachID = $_SESSION['currentUser'];
                $string="";
       

                $sql = "SELECT idNum,eventID,deptID, CONCAT(firstName,' ',middleInit,'. ',lastName) AS fullName, course, year, civilStatus, gender, birthdate, contactNo, address, status, approveDate FROM athlete WHERE coachID=$coachID && status='Approved'";
                $result = mysqli_query($con,$sql);

                

                if(mysqli_num_rows($result)> 0){
                    while ($row = mysqli_fetch_array($result)) {
                        
                        if($row['status'] === 'Approved'){
                            $string= "<td><a href='athletes.php?disapprove=$row[idNum]'>Disapprove</a></td>";
                        }else{
                            $string= "<td><a href='athletes.php?approve=$row[idNum]'>Approve</a></td>";
                        }

                        echo "
                            <tr>
                                <td>$row[idNum]</td>
                                <td>$row[eventID]</td>
                                <td>$row[deptID]</td>
                                <td>$row[fullName]</td>
                                <td>$row[course]</td>
                                <td>$row[year]</td>
                                <td>$row[civilStatus]</td>
                                <td>$row[gender]</td>
                                <td>$row[birthdate]</td>
                                <td>$row[contactNo]</td>
                                <td>$row[address]</td>
                                <td>$row[status]</td>
                                <td>$row[approveDate]</td>
                                $string
                            </tr>
                        ";
                    }
                }else{
                    echo "
                        <tr>
                            <td colspan='14' style='text-align:center;'>No Data Found.</td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
        
    </table>
    </center>

</body>
</html>