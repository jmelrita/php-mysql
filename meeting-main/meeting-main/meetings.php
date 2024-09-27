<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "practice";

$conn = mysqli_connect("$hostname","$username","$password","$dbname");

if (!$conn){
    die("Connection Failed: " .mysqli_connect_error());
}

if (isset($_POST['search'])){
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM meetings WHERE mtgAgenda LIKE '%$keyword%' OR mtgCode LIKE '%$keyword%'"; 
}else{
    $sql = "SELECT * FROM meetings";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>

<html lang = "en">
    <head>
        <title> Meetings </title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <script>
            function confirmDelete(id){
                if(confirm ("Are you sure to delete this Meeting?")){
                    window.location.href = "delete_meeting.php?id=" + id;
                }
            }
        </script>
    </head>

    <body>  
        <div class = "container">
            <a href="index.php" class = "btn btn-primary my-5"> Return </a>
            <a href="add_meeting.php" class = "btn btn-primary my-5"> Add New Meetings</a>

            <h2 class = "text-center"> Meeting Records </h2>

            <form method="POST" class = "h-25 d-inline-block w-75 p-3">
                <input type="text" name="keyword" placeholder="Search">
                <button type = "submit" name = "search" class = "btn btn-outline-success"> Search </button>
            </form>
                
            <table class = "table table-bordered table-stripled">
                <thead class = "thead-dark">
                    <tr>
                        <th>Meeting Code</th>
                        <th>Agenda</th>
                        <th>Venue</th>
                        <th>Date</th>
                        <th>Time Start</th>
                        <th>Time End</th>
                        <th>Facilitator</th>
                        <th>Status</th>
                        <th colspan="2" class = "text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        while ($row = mysqli_fetch_assoc($result)){
                            echo  "<tr>";
                                echo "<td>".$row['mtgCode']."</td>";
                                echo "<td>".$row['mtgAgenda']."</td>";
                                echo "<td>".$row['mtgVenue']."</td>";
                                echo "<td>".$row['mtgDate']."</td>";
                                echo "<td>".$row['mtgTstart']."</td>";
                                echo "<td>".$row['mtgTend']."</td>";
                                echo "<td>".$row['mtgFaci']."</td>";
                                echo "<td>".$row['mtgStatus']."</td>";
                                echo "<td> <a href = 'update_meeting.php?id= ".$row['mtgCode']."'>Update</a> </td>";
                                echo "<td> <a href = 'javascript:void(0)' onclick = 'confirmDelete(".$row['mtgCode'].")'> Delete </a> </td>";
                            echo  "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>