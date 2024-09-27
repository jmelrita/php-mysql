<?php
// define database connection variables

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "books";
$messagedelete="";
$messageadd="";
$messageupdate="";

// create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['delete'])) {
       $isbn = isset($_POST['isbn']) ? mysqli_real_escape_string($conn, $_POST['isbn']) : "";

    // Check if ID exists
    $checkQuery = "SELECT isbn FROM books WHERE isbn = '$isbn'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // Delete the record
        $deleteQuery = "DELETE FROM books WHERE isbn = '$isbn'";
        if ($conn->query($deleteQuery) === TRUE) {
            $messagedelete="Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        $messagedelete= "ID not found";
    }
}
	


	


	// close database connection
	?>
	<?php
	$messageadd="";
 	if (isset($_POST['add'])) {
    $isbn = isset($_POST['isbn']) ? mysqli_real_escape_string($conn, $_POST['isbn']) : "";
    $title = isset($_POST['title']) ? mysqli_real_escape_string($conn, $_POST['title']) : "";
    $copyright = isset($_POST['copyright']) ? mysqli_real_escape_string($conn, $_POST['copyright']) : "";
    $edition = isset($_POST['edition']) ? mysqli_real_escape_string($conn, $_POST['edition']) : "";
    $price = isset($_POST['price']) ? mysqli_real_escape_string($conn, $_POST['price']) : "";
    $quantity = isset($_POST['quantity']) ? mysqli_real_escape_string($conn, $_POST['quantity']) : "";
if($conn){
    $query = "SELECT * FROM books WHERE isbn = '".$isbn."'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $messageadd = "ISBN already exists. Please try another ISBN.";
    }else  {
        // Use prepared statement to insert data
        $insertQuery = "INSERT INTO books (isbn, title, copyright, edition, price, quantity) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertQuery);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssssdd", $isbn, $title, $copyright, $edition, $price, $quantity);

        // Execute the statement
        $insertResult = mysqli_stmt_execute($stmt);

        if (!$insertResult) {
            die("Insert query failed: " . mysqli_error($conn));
        }

       $messageadd= "ITEM ADDED SUCCESSFULLY";

        // Close the statement
        mysqli_stmt_close($stmt);
    }
}
}

?>


	<!DOCTYPE html>
<html>
<STYLE>
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; 

}
.row:after {
  content: "";
  display: table;
  clear: both;
}
* {
  box-sizing: border-box;
}
table,td,th{
	border:1px solid black;
	text-align:center;
	font-size:30px;
	padding:10px;
}
table{
	margin:0%;
	
}
</STYLE>
	<body>

	<form method="POST" >
	<div class="row">
	<div class="column">
		ISBN# &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  name="isbn" required></input></br></br>
		Title &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;  <input type="text" name="title"></input></br></br>
		
		Copyright&nbsp; <input type="text" name="copyright"></input></br></br>
		Edition&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="edition"></input></br></br>
		Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="price" ></br></br>
		Quantity&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="quantity"></input></br>
		</div>
		
		<div class="column">
		<button type="submit" name="search">SEARCH</button>
		<button type="submit" name="delete">DELETE</button>
		<br>
		<br>
		<br>
		<button type="submit" name="edit">EDIT</button>
		<button type="submit" name="add">ADD</button>
		<br>
		</br>
	<div class="w3-panel w3-container w3-padding w3-green w3-center">
						<h3>
						<?php
             // Display success message for update operation
             if (isset($_SESSION['update_success']) && $_SESSION['update_success']) {
              echo "Update successful!";
              // Clear the session variable to avoid displaying the message again
              unset($_SESSION['update_success']);
          }
          
							echo $messagedelete;
							echo $messageadd;
						
							 
						?>
						</h3>
					</div>
	</div>
	

	<?php

// check connection


// handle form submission
if (isset($_POST['search'])) {
	
	
  // check if ISBN# is set and not empty
  if (isset($_POST['isbn']) && !empty($_POST['isbn'])) {
    // construct query to retrieve book with specified ISBN#

    $isbn = $_POST['isbn'];
	
    $sql = "SELECT * FROM books WHERE isbn = '$isbn'";
	
	 
  } 
  else {
    // construct query to retrieve all books
    $sql = "SELECT * FROM books";
  }

  // execute query and get result
  $result = mysqli_query($conn, $sql);

  // check if any rows returned
  if (mysqli_num_rows($result) > 0) {
    
    echo "<table><tr><th>ISBN#</th><th>Title</th><th>Copyright</th><th>Edition</th><th>Price</th><th>Quantity</th></tr>";
$sum = 0;
$q = 0;
    // output each row of data
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row["isbn"] . "</td><td>" . $row["title"] . "</td><td>" . $row["copyright"]
        . "</td><td>" . $row["edition"] . "</td><td>" . $row["price"] . "</td><td>" . $row["quantity"] . "</td></tr>";

$sum+= $row['price'];
		$q+= $row['quantity'];
		
    }
		
	
	echo "<tr><td></td><td></td><td></td><td></td><td><strong>".$sum."</td></strong><td><strong>".$q."</strong></td></tr>";
    // output table footer
    echo "</table>";
  } else {
    echo "No books found.";
  }

  
}

?>

<?php

if (isset($_POST['edit'])) {
    $isbn = isset($_POST['isbn']) ? mysqli_real_escape_string($conn, $_POST['isbn']) : "";

    // Check if ISBN exists
    $checkQuery = "SELECT isbn FROM books WHERE isbn = '$isbn'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
      header("Location: edit.php?isbn=".$isbn);
    } 
    
	else {
		 echo "You enter ISBN not found or filled the ISBN.";
		
	}
  
}

?>


</form>
		</body>

	</html>
