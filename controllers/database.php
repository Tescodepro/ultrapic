<?php
// $servername = "localhost"; 
// $username = "root";
// $password = "";
// $database = "ultrapic";

$servername = "localhost"; 
$username = "ultrapic";
$password = "Ultrapic0o2023";
$database = "ultrapic";

// Create connection
$dbconnect = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($dbconnect->connect_error) {
    die("Connection failed: " . $dbconnect->connect_error);
}

?>
