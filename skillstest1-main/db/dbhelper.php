<?php
	///database abstraction
	$hostname = "127.0.0.1";
	$username = "root";
	$password = "";
	$database = "skills23";
	//
	function connect(){
		global $hostname,$username,$password,$database;
		return mysqli_connect($hostname,$username,$password,$database);
	}
	//
	function getall($table){
		$sql = "SELECT * FROM `$table`";
		$rows = array();
		$conn = connect();
		$query = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($query)){
			array_push($rows,$row);
		}
		mysqli_close($conn);
		return $rows;
	}
	//
	function getrecord($table,$field,$data){
		$sql = "SELECT * FROM `$table` WHERE `$field`='$data'";
		$conn = connect();
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);
		mysqli_close($conn);
		return $row;
	}
	//
	function deleterecord($table,$field,$data){
		$sql = "DELETE FROM `$table` WHERE `$field`='$data'";
		$conn = connect();
		$query = mysqli_query($conn,$sql);
		mysqli_close($conn);
		return true;
	}
	
	function updaterecord($table,$fields,$data){
		//update `item` set `itemname`='ganador',`itemprice`='60',`itemqty`='100'
		//where `itemcode`='1000';
		$ok = false;
		$flds = array();
		if(count($fields)==count($data)){
			for($i=1;$i<count($fields);$i++){
				array_push($flds,"`".$fields[$i]."`='".$data[$i]."'");
			}
			$fld = implode(",",$flds); 
			$sql = "UPDATE `$table` SET $fld WHERE `$fields[0]`=$data[0]";
			$conn = connect();
			$query = mysqli_query($conn,$sql);
			mysqli_close($conn);
			$ok = true;
			return $ok;
		}
		else echo "Field and data size not equal";
	}
	
	function addrecord($table,$fields,$data){
		$ok = false;
		if(count($fields) == count($data)){
			//INSERT INTO `item`(`itemcode`,`itemname`,`itemprice`,`itemqty`)
			//VALUES('3000','KULAFU 350ml','40','10')
			$flds = implode("`,`",$fields);
			$dta = implode("','",$data);
			$sql = "INSERT INTO `$table`(`$flds`) VALUES('$dta')";
			$conn = connect();
			$query = mysqli_query($conn,$sql);
			mysqli_close($conn);
			$ok = true;
		}
		return $ok;
	}
	
	
?>