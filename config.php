<?php 
$server = "********"; // server name
$username = "********"; // username from server to access database
$password = "********"; // password to access database
$database = "*********"; // database name

$con = mysqli_connect($server,$username,$password,$database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

?>