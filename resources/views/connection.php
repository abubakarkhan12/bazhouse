<?php
$servername = "localhost";
$username = "bazhouse_db";
$db ='bazhouse_db';

$password = "B.9e6pmO2XXd6alvnvS14";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>