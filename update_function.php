<?php

include 'conn.php';

$id = $_POST['id'];
$tittle = $_POST['tittle'];
$author = $_POST['author'];
$ppd = $_POST['price'];
 
mysqli_query($mysqli_connect,"update book set tittle='$tittle', author='$author', price_per_day='$ppd' where id='$id'");
 
header("location:book.php");
 
?>