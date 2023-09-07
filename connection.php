<?php
$servername = "xxxxxxx";
$username = "xxxxxxx"; 
$password = "xxxxxxxxx";    
$dbname = "xxxxxxxxx";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
