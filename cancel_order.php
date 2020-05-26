<?php 
require_once('classes/Display.php');
if(!isset($_GET['order_id'])){
    header('location:index.php');
} else{
    $oid = $_GET['order_id'];
    $bool = $display->delete_row("room_booking_details", array("id" => $oid));
    if($bool){
        header('location:order.php');
    }
}
?>