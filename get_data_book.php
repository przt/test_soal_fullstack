<?php 
include 'conn.php';
$id = $_POST['id'];
    $dataA = array();

    $data = mysqli_query($mysqli_connect, "select price_per_day from book where id='$id'");  
    while($value = mysqli_fetch_assoc($data)){
        array_push($dataA, $value);
    }
    echo json_encode($dataA);
    
    die();
?>