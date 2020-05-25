<?php 
    include('connection.php');
    $oid = $_GET['order_id'];
    $q = mysqli_query($con,"DELETE FROM room_booking_details WHERE id='$oid' ");

    if($q){
        header('location:order.php');
    }
?>