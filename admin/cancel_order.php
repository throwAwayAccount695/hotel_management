<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/hotel_management/classes/Display.php');

$id = $_GET['booking_id'];
$display->delete_row("room_booking_details", array("id" => $id));
header('location:dashboard.php?option=booking_details');
?>