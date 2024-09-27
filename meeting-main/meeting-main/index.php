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
    $sql = "SELECT * FROM employees WHERE empFName LIKE '%$keyword%' OR empNo LIKE '%$keyword%'"; 
}else{
    $sql = "SELECT * FROM employees";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>

<html lang = "en">
    <head>
        <title> Index </title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <script>
            function confirmDelete(id){
                if(confirm ("Are you sure to delete this Employee?")){
                    window.location.href = "delete.php?id=" + id;
                }
            }
        </script>
    </head>

    <body>     
        <div class = "container">
            <a href="employees.php" class = "btn btn-primary my-5"> Add New Employee </a>
            <a href="meetings.php" class = "btn btn-primary my-5"> Meeting Records </a>

            <h2 class = "text-center"> Employee's Records</h2>

            <form method="POST" class = "h-25 d-inline-block w-75 p-3">
                <input type="text" name="keyword" placeholder="Search">
                <button type = "submit" name = "search" class = "btn btn-outline-success"> Search </button>
            </form>
                
            <table class = "table table-bordered table-stripled">
                <thead class = "thead-dark">
                    <tr>
                        <th>Employee Number</th>
                        <th>Name</th>
                        <th>Middle Name</th>
                        <th>Family Name</th>
                        <th>Position</th>
                        <th>Department</th>
                        <th>Campus</th>
                        <th colspan="2" class = "text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        while ($row = mysqli_fetch_assoc($result)){
                            echo  "<tr>";
                                echo "<td>".$row['empNo']."</td>";
                                echo "<td>".$row['empFName']."</td>";
                                echo "<td>".$row['empMName']."</td>";
                                echo "<td>".$row['empLName']."</td>";
                                echo "<td>".$row['empPosition']."</td>";
                                echo "<td>".$row['empDept']."</td>";
                                echo "<td>".$row['empCampus']."</td>";
                                echo "<td> <a href = 'update.php?id= ".$row['empNo']."'>Update</a> </td>";
                                echo "<td> <a href = 'javascript:void(0)' onclick = 'confirmDelete(".$row['empNo'].")'> Delete </a> </td>";
                            echo  "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>