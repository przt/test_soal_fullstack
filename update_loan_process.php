<?php

include 'conn.php';

$name = $_POST['name'];
$private_number = $_POST['private_number'];
$email = $_POST['email'];
$date = $_POST['date'];
$id_book = $_POST['id_book'];
 
mysqli_query($mysqli_connect,"update loan set name='$name', 
                                            private_number='$private_number',
                                            email = '$email',
                                            date='$date',
                                            id_book='$id_book' where id='$id'");
 
header("location:loan.php");
 
?>