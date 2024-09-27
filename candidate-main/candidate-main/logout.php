<?php
session_start();

session_destroy();

$message = "Logout Successful";
header("Location:index.php?message=".$message);
?>