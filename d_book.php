<?php 
include 'conn.php';
$id = $_GET['id'];
 
mysqli_query($mysqli_connect,"delete from book where id='$id'"); 
header("location:book.php");
 
?>