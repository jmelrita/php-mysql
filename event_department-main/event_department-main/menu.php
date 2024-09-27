<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Menu</title>
</head>

<body style="text-align: center;">
    <?php
    include ("dbcon.php");
    include ("nav.php");

    ?>
    <?php
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "admin") {
            echo "<h1>Admin Menu</h1>";
            echo "<a href='addDepartment.php'>Create Department Data</a>";
            echo "</br></br>";
            echo "<a href='addEvent.php'>Add Event</a>";
            echo "</br></br>";
            echo "<a href='listOfEvent.php'>List of Event</a>";
        } elseif ($_SESSION['role'] == "student") {
            echo "<h1>Student Menu</h1>";
            echo "<a href='studentInfo.php'>Fill-up Your Info</a>";
        } elseif ($_SESSION['role'] == "tournamentManager") {
            echo "<h1>Tournament Manager Menu</h1>";
            echo "<a href='tournamentManagerInfo.php'>Fill-up Your Info</a>";
            echo "</br></br>";
        } elseif ($_SESSION['role'] == "coach") {
            echo "<h1>Coach Menu</h1>";
            echo "<a href='coachInfo.php'>Fill-up Your Info</a>";
            echo "</br></br>";
            echo "<a href='athletes.php'>My Athletes</a>";
            echo "</br></br>";
            echo "<a href='pendingAthletes.php'>Pending Athletes</a>";
            echo "</br></br>";
        }  elseif ($_SESSION['role'] == "dean") {
            echo "<h1>Dean Menu</h1>";
            echo "<a href='deanInfo.php'>Fill-up Your Info</a>";
            echo "</br></br>";
        }       
    }
    ?>


</body>

</html>