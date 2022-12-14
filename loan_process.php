<?php 
include 'conn.php';

$name = $_POST['name'];
$private_number = $_POST['private_number'];
$email = $_POST['email'];
$date = $_POST['date'];
$id_book = $_POST['id_book'];
$price_per_day = $_POST['price_perday'];
$day = $_POST['day'];
$sub_total = $_POST['sub_total'];

print_r($_POST);
// var_dump($_POST);


// foreach( $id_book as $x => $value ) {
//     print $value;
//     $add_book = mysqli_query($mysqli_connect,"insert into loan values('','$name','$private_number','$email',
//     '$date', '$id_book[$x]','$day[$x]', '$sub_total[$x]')");    
// }

// header("location:loan.php");
 
?>