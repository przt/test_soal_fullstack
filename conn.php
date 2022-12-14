<?php
$mysqli_connect = new mysqli("localhost","root","","e_lib");

// Check connection
if ($mysqli_connect -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli_connect -> connect_error;
  exit();
}
?>