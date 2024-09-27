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
    $meetingId = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $newAgenda = $_POST['newAgenda'];
        $newVenue = $_POST['newVenue'];
        $newDate = $_POST['newDate'];
        $newTstart = $_POST['newTstart'];
        $newTend = $_POST['newTend'];
        $newFaci = $_POST['newFaci'];
        $newStatus = $_POST['newStatus'];

        $updateSql = "UPDATE meetings SET mtgAgenda = '$newAgenda', mtgVenue = '$newVenue', mtgDate = '$newDate', mtgTstart = '$newTstart', mtgTend = '$newTend', mtgFaci = '$newFaci', mtgStatus = '$newStatus' WHERE mtgCode = $meetingId";
        $updateResult = mysqli_query($conn, $updateSql);


        if ($updateResult){
            header("Location: meetings.php");
            exit();
        }else{
            echo "Error Updating Meeting Data: " .mysqli_error($conn);
        }
    }

    $fetchSql = "SELECT * FROM meetings WHERE mtgCode = $meetingId";
    $fetchResult = mysqli_query($conn, $fetchSql);
    $meetingData = mysqli_fetch_assoc($fetchResult);
}
?>

<!DOCTYPE html>

<html lang = "en">
    <head>
        <title>Add meetings</title>

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
                <h2 class = "text-center">Update Meetings Record</h2>
                <p class = "text-muted text-center"> Complete the Form Below to Update the Meetings</p>
            </div>
        

            <form method="POST">
                <div class = "form-group">
                    <label for="newAgenda" class = "form-label"> Agenda </label>
                    <input type="text" class = "form-control" name = "newAgenda" value = "<?php echo $meetingData['mtgAgenda']?>">
                </div>

                <div class = "form-group">
                    <label for="newVenue" class = "form-label"> Venue </label>
                    <input type="text" class = "form-control" name = "newVenue" value = "<?php echo $meetingData['mtgVenue']?>">
                </div>

                <div class = "form-group">
                    <label for="newDate" class = "form-label"> Date </label>
                    <input type="date" class = "form-control" name = "newDate" value = "<?php echo $meetingData['mtgDate']?>">
                </div>

                <div class = "form-group">
                    <label for="newTstart" class = "form-label"> Time Start </label>
                    <input type="time" class = "form-control" name = "newTstart" value = "<?php echo $meetingData['mtgTstart']?>">
                </div>

                <div class = "form-group">
                    <label for="newTend" class = "form-label"> Time End </label>
                    <input type="time" class = "form-control" name = "newTend" value = "<?php echo $meetingData['mtgTend']?>">
                </div>
                
                <div class = "form-group">
                    <label for="newFaci" class = "form-label"> Facilitator </label>
                    <input type="text" class = "form-control" name = "newFaci" value = "<?php echo $meetingData['mtgFaci']?>">
                </div>
                
                <div class = "form-group">
                    <label for="newStatus" class = "form-label"> Status </label>
                    <input type="text" class = "form-control" name = "newStatus" value = "<?php echo $meetingData['mtgStatus']?>">
                </div>

                <button type = "submit" class = "btn btn-success"> Update </button>
            </form>
        </div>
    </body>
</html>