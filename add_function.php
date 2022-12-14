<?php 
include 'conn.php';

$tittle = $_POST['tittle'];
$author = $_POST['author'];
$ppd = $_POST['price'];

$add_book = mysqli_query($mysqli_connect,"insert into book values('','$tittle','$author','$ppd')");

header("location:book.php");
 
?>