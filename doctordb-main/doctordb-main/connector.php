<?php 
 
 $host="localhost";
 $user= "root";
 $pass="";
 $db="skillsdoc";
 
 $con = mysqli_connect ($host,$user,$pass,$db);
 
 if($con){
	 
	 echo" ";
	 
 }else{
	 
	 echo"db not conneted";
 }

?>