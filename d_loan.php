<?php 
include 'conn.php';
$id = $_GET['id'];
 
mysqli_query($mysqli_connect,"delete from loan where id='$id'"); 
header("location:loan.php");
 
?>