<?php
//DATABASE ABSTRACTION

$hostname = "127.0.0.1";
$username = "root";
$password ="";
$database = "election";
$conn;


function connect(){
	global $hostname,$username,$password,$database,$conn;
	
	$conn = mysqli_connect($hostname,$username,$password,$database);
	
}

function disconnect(){
	global $conn;
	
	$conn = mysqli_close($conn);

}	

function getallrecords($table){
	global $conn;
	
	$sql = "SELECT * FROM `$table`";
	connect();
	$query = mysqli_query($conn,$sql);
	$rows = mysqli_fetch_all($query);
	
	
	return $rows;
}

function getrecord($table, $field, $value){
	global $conn;
	
	$sql = "SELECT * FROM `$table` WHERE `$field` = '$value'";
	connect();
	$query = mysqli_query($conn, $sql);
	
	$row = mysqli_fetch_all($query);
	
	if(count($row)>0)
		return $row[0];
}

function addrecord($table, $fields, $data){
	global $conn;
	
	if(count($fields) == count($data)){
		$flds = implode("`,`", $fields);
		$dta = implode("','", $data);
		connect();
		$sql = "INSERT INTO `$table`(`$flds`) VALUES ('$dta')";
		$query = mysqli_query($conn, $sql);
		disconnect();
		return true;
	}
	else
		return false;
}

function deleterecord($table, $field, $value){
	global $conn;
	$check_existing = getrecord($table, $field, $value);
	
	if(!empty($check_existing)){
		$sql = "DELETE FROM `$table` WHERE `$field` = '$value'";
		connect();
		$query = mysqli_query($conn, $sql);
		disconnect();
		return true;
	}
	else{
		return false;
	}
}

function updaterecord($table, $fields, $data){
	global $conn;
	
	if(count($fields) == count($data)){
		$flds = array();
		for($i=1; $i<count($fields);$i++)
		{
			$flds[$i] = "`$fields[$i]`='$data[$i]'";
		}
		$flds_f = implode(",", $flds);
		
		$sql = "UPDATE `$table` SET $flds_f WHERE `$fields[0]` = '$data[0]'";
		connect();
		$query = mysqli_query($conn,$sql);
		
		disconnect();
		return true;
	}
	else
		return false;
}

function countData($table, $field,$value){
	global $conn;
	
	connect();
	
	$sql = "SELECT * FROM `$table` WHERE `$field` = '$value'";
	$query = mysqli_query($conn,$sql);
	
	$count = mysqli_num_rows($query);
	disconnect();
	return $count;
	
}


?>