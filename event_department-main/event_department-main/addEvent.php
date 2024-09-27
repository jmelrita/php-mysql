<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
</head>
<body style="text-align: center;">
    <?php
        include("dbcon.php");
        include("nav.php");
        
        if(isset($_POST["save"])){
            $eventID = $_POST["eventID"];
            $category = $_POST["category"];
            $eventName = $_POST["eventName"];
            $noOfParticipant = $_POST["noOfParticipant"];
            $tournamentManager = $_POST["tournamentManager"];

            $sql = "SELECT * FROM event WHERE eventID=$eventID";
            $result = mysqli_query($con, $sql);
            
            if(mysqli_num_rows($result) === 0){
                $sql = "INSERT INTO `event`(`eventID`, `category`, `eventName`, `noOfParticipant`, `tournamentManager`) VALUES ($eventID,'$category','$eventName',$noOfParticipant,$tournamentManager)";
                $result = mysqli_query($con, $sql);
                header("location: menu.php");
            }else{
                echo "Event already exist.";
            }
            
        }

    ?>
    </br>
    <a href="menu.php">BACK</a>
    <h1>Add Event</h1>
    <form method="POST" action="addEvent.php">
        <label>Event ID:</label>
        </br>
        <input type="number" name="eventID" required/>
        </br></br>
        <label>Category:</label>
        </br>
        <select name="category" required>
            <option value="Athletic">Athletic</option>
            <option value="Cultural">Cultural</option>
            <option value="Academic">Academic</option>
        </select>
        </br></br>
        <label>Event Name:</label>
        </br>
        <input type="text" name="eventName" required/>
        </br></br>
        <label># of Participants:</label>
        </br>
        <input type="number" name="noOfParticipant" required/>
        </br></br>
        <label>Tournament Manager:</label>
        </br>
        <select name="tournamentManager" required>
            <?php             
                $sql = "SELECT * FROM tournamentmanager";
                $result = mysqli_query($con, $sql);
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=$row[userName]>$row[fName] $row[lName]</option>";
                }
            ?>
        </select>
        </br></br>
        <button type="submit" name="save">SAVE</button>
    </form>
</body>
</html>