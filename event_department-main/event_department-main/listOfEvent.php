<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Event</title>
</head>
<body style="text-align: center;">
    <?php
     include("dbcon.php");
     include("nav.php");

     if(isset($_GET['delete'])){
        $eventID = $_GET['delete'];

        $sql = "DELETE FROM event WHERE eventID=$eventID";
        mysqli_query($con, $sql);
        header("location: listOfEvent.php");
     }

    ?>
    </br>
    <a href="menu.php">BACK</a>
    <h1>List of Events</h1>
    <center>
        <table border=1>
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Number of Participants</th>
                    <th>Tournament</th>
                    <th colspan="2">Actions</th>
                </tr>  
                <tr>
                    <th></th>
                    <th>Men | Women</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr style="background: yellow;">
                    <th></th>
                    <th>Athletic Events</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                
                    <?php 
                        $sql = "SELECT event.eventID, event.eventName, event.noOfParticipant, tournamentmanager.userName, tournamentmanager.fName, tournamentmanager.lName FROM event INNER JOIN tournamentmanager ON event.tournamentManager = tournamentmanager.userName WHERE category='Athletic'";
                        $result = mysqli_query($con,$sql);

                        while ($row = mysqli_fetch_array($result)) {
                            echo "
                            <tr>
                                <td>$row[eventName]</td>
                                <td>$row[noOfParticipant]</td>
                                <td>$row[fName] $row[lName]</td>
                                <td><a href='listOfEvent.php?delete=$row[eventID]'>Delete</a></td>
                                <td><a href='eventUpdate.php?update=$row[eventID]'>Update</a></td>
                            </tr>
                                ";
                        }
                    ?>
            
                <tr style="background: pink;">
                    <th></th>
                    <th>Cultural Events</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <?php 
                        $sql = "SELECT event.eventID, event.eventName, event.noOfParticipant, tournamentmanager.userName, tournamentmanager.fName, tournamentmanager.lName FROM event INNER JOIN tournamentmanager ON event.tournamentManager = tournamentmanager.userName WHERE category='Cultural'";
                        $result = mysqli_query($con,$sql);

                        while ($row = mysqli_fetch_array($result)) {
                            echo "
                            <tr>
                                <td>$row[eventName]</td>
                                <td>$row[noOfParticipant]</td>
                                <td>$row[fName] $row[lName]</td>
                                <td><a href='listOfEvent.php?delete=$row[eventID]'>Delete</a></td>
                                <td><a href='eventUpdate.php?update=$row[eventID]'>Update</a></td>
                            </tr>
                            ";
                        }
                    ?>
                </tr>
                <tr style="background: green;">
                    <th></th>
                    <th>Academic Events</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <?php 
                        $sql = "SELECT event.eventID, event.eventName, event.noOfParticipant, tournamentmanager.userName, tournamentmanager.fName, tournamentmanager.lName FROM event INNER JOIN tournamentmanager ON event.tournamentManager = tournamentmanager.userName WHERE category='Academic'";
                        $result = mysqli_query($con,$sql);

                        while ($row = mysqli_fetch_array($result)) {
                            echo "
                            <tr>
                                <td>$row[eventName]</td>
                                <td>$row[noOfParticipant]</td>
                                <td>$row[fName] $row[lName]</td>
                                <td><a href='listOfEvent.php?delete=$row[eventID]'>Delete</a></td>
                                <td><a href='eventUpdate.php?update=$row[eventID]'>Update</a></td>
                            </tr>
                            ";
                        }
                    ?>
                </tr>
            </tbody>
        </table>
    </center>
</body>
</html>