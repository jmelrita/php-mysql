<?php 
// define database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "books";
$messageadd="";
$messagedelete="";
$messageupdate="";

// create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


$isbn = "";
$title = "";
$copyright = "";
$edition = "";
$price = "";
$quantity = "";

//get the value of the URL parameter isbn from ako.php
if (isset($_GET["isbn"])) {
    $isbn = $_GET["isbn"];

    //check if the connection is successful...
    if ($conn) {
        //query the record that you want to edit

        //form the query string that will select all records from books table
        $sql = "SELECT * FROM books WHERE isbn = " . $isbn . " ";

        //execute the sql query using the mysqli_query function
        $book = mysqli_query($conn, $sql);

        if (mysqli_num_rows($book) > 0) {
            while ($record = mysqli_fetch_assoc($book)) {
                //transfer the recordset into local php variables
                $isbn = $record["isbn"];
                $title = $record["title"];
                $edition = $record["edition"];
                $quantity = $record["quantity"];
                $price = $record["price"];
                $copyright = $record["copyright"];
            }
        } else {
            echo "<p>Record not found.</p>";
        }
    } else {
        echo "<p>Error connecting to DB.</p>";
    }
    mysqli_close($conn);
}
?>
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
		ISBN# &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="isbn"  value="<?php echo $isbn; ?>" ></input></br></br>
		Title &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;  <input type="text" value="<?php echo $title; ?>" name="title"></input></br></br>
		
		Copyright&nbsp; <input type="text" name="copyright" value="<?php echo $copyright; ?>"></input></br></br>
		Edition&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="edition" value="<?php echo $edition; ?>"></input></br></br>
		Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="price" value="<?php echo $price; ?>"></br></br>
		Quantity&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="quantity" value="<?php echo $quantity; ?>"></input></br>
		</div>
		
		<div class="column">
		<button type="submit" name="search">SEARCH</button>
		<button type="submit" name="delete">DELETE</button>
		<br>
		<br>
		<br>
		<button type="submit" name="update">EDIT</button>
		<button type="submit" name="add">ADD</button>
		<br>
		</br>
		
		<?php
							echo $messagedelete;
							echo $messageadd;
							echo $messageupdate;
							
						?>
	</div>
	</form>


	<?php
		if(isset($_POST["update"]))
		{
			//get all the inputs
			$isbn = $_POST["isbn"];
			$title = $_POST["title"];
			$copyright = $_POST["copyright"];
			$price = $_POST["price"];
			$quantity = $_POST["quantity"];
			$edition = $_POST["edition"];
			
			//check if you have established a connection to the database named: market
			$conn = mysqli_connect("localhost", "root", "", "books");
			
			//check if the connection is successful...
			if($conn)
			{
				//prepare the sql query for the update
				$sql = "update books 
							set title = '".$title."', 
								copyright = ".$copyright.",
								edition = ".$edition.",
								price = ".$price.",
								quantity = '".$quantity."' 
								
							where	
								isbn = ".$isbn." ";
								
				mysqli_query($conn, $sql);
				
				$_SESSION['update_success'] = true;
				header("Location:ako.php");
				exit;
				
			}				
			else 
			{
				echo "<p>Error connecting to DB.</p>";
				
			}
		
			
		}

?>
