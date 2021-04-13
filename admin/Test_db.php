<?php
$servername = "128.100.117.98";
$username = "namiki";
$password = "namiki";
$dbname = "npt-lvp";

// Create connection
$conn= mysqli_connect($servername,$username,$password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected Successfully.";
?>