<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "practice";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn){
    die("Connection Failed: ". mysqli_connect_error());
}

if(isset($_POST['submit'])){
    $mtgAgenda = $_POST['mtgAgenda'];
    $mtgVenue = $_POST['mtgVenue'];
    $mtgDate = $_POST['mtgDate'];
    $mtgTstart = $_POST['mtgTstart'];
    $mtgTend = $_POST['mtgTend'];
    $mtgFaci = $_POST['mtgFaci'];
    $mtgStatus = $_POST['mtgStatus'];

    $sql = "INSERT INTO meetings (mtgCode, mtgAgenda, mtgVenue, mtgDate, mtgTstart, mtgTend, mtgFaci, mtgStatus) 
    VALUES ('$mtgCode', '$mtgAgenda', '$mtgVenue', '$mtgDate', '$mtgTstart', '$mtgTend', '$mtgFaci', '$mtgStatus')";

    if (mysqli_query($conn, $sql)){
        header("Location: meetings.php");
        exit();
    }else{
        echo "Error" .mysqli_error($conn);
    }
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
                <a href="meetings.php" class = "btn btn-primary my-5">Return</a>
            </div>
        </div>
        
        <div class = "container">
            <div class = "text-center mb-4">
                <h2 class = "text-center">Adding New meetings</h2>
                <p class = "text-muted text-center"> Complete the Form Below to Add New Meeting</p>
            </div>
        

            <form method="POST">
                <div class = "form-group">
                    <label for="mtgAgenda" class = "form-label"> Agenda </label>
                    <input type="text" class = "form-control" name = "mtgAgenda" required placeholder="">
                </div>

                <div class = "form-group">
                    <label for="mtgVenue" class = "form-label"> Venue </label>
                    <input type="text" class = "form-control" name = "mtgVenue" required placeholder="">
                </div>

                <div class = "form-group">
                    <label for="mtgDate" class = "form-label"> Date </label>
                    <input type="date" class = "form-control" name = "mtgDate"  required placeholder="">
                </div>

                <div class = "form-group">
                    <label for="mtgTstart" class = "form-label"> Time Start </label>
                    <input type="time" class = "form-control" name = "mtgTstart" required placeholder="">
                </div>

                <div class = "form-group">
                    <label for="mtgTend" class = "form-label"> Time End </label>
                    <input type="time" class = "form-control" name = "mtgTend" required placeholder="">
                </div>

                <div class = "form-group">
                    <label for="mtgFaci" class = "form-label"> Facilitator </label>
                    <input type="text" class = "form-control" name = "mtgFaci" required placeholder="">
                </div>

                <div class = "form-group">
                    <label for="mtgStatus" class = "form-label"> Status </label>
                    <input type="text" class = "form-control" name = "mtgStatus" required placeholder="">
                </div>

                <button type = "submit" class = "btn btn-success" name = "submit"> Save </button>
            </form>
        </div>
    </body>
</html>