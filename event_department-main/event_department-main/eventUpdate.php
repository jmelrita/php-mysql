<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
</head>
<body>
    <?php 
        include("dbcon.php");

        $eventID;
        $category ="";
        $eventName="";
        $noOfParticipant;
        $tournamentManager;

        if(isset($_GET['update'])){
            $eventID = $_GET['update'];
            
            $sql = "SELECT * FROM event WHERE eventID=$eventID";
            $result = mysqli_query($con, $sql);
            
            if($row=mysqli_fetch_array($result)){
                $eventID = $row["eventID"];
                $category = $row["category"];
                $eventName = $row["eventName"];
                $noOfParticipant = $row["noOfParticipant"];
                $tournamentManager = $row["tournamentManager"];
            }
        }

        if(isset($_POST['save'])){
            $eventID = $_POST['eventID'];
            $category = $_POST['category'];
            $eventName = $_POST['eventName'];
            $noOfParticipant = $_POST['noOfParticipant'];
            $tournamentManager = $_POST['tournamentManager'];
  
            $sql = "UPDATE `event` SET `category`='$category',`eventName`='$eventName',`noOfParticipant`=$noOfParticipant,`tournamentManager`=$tournamentManager WHERE eventID=$eventID";
            mysqli_query($con, $sql);
            header("location: listOfEvent.php");
        }  
    ?>
    <a href="listOfEvent.php">Back</a>
    <h1>Update Event</h1>

    <form method="POST" action="eventUpdate.php">
        <label>Event ID:</label>
        </br>
        <input type="number" name="eventID" value=<?php echo $eventID;?> readonly/>
        </br></br>
        <label>Category:</label>
        </br>
        <select name="category" required>
            <option value="Athletic" <?php if($category === 'Athletic'){ echo "selected";}?>>Athletic</option>
            <option value="Cultural" <?php if($category === 'Cultural'){ echo "selected";}?>>Cultural</option>
            <option value="Academic" <?php if($category === 'Academic'){ echo "selected";}?>>Academic</option>
        </select>
        </br></br>
        <label>Event Name:</label>
        </br>
        <input type="text" name="eventName" value='<?php echo $eventName;?>' required/>
        </br></br>
        <label># of Participants:</label>
        </br>
        <input type="number" name="noOfParticipant" value=<?php echo $noOfParticipant;?> required/>
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