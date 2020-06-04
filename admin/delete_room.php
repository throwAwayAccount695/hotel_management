<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/hotel_management/classes/Display.php');

$id = $_GET['id'];
$res = $display->select_all("rooms WHERE room_id='$id'");

unlink("../image/rooms/" . $res[0]['image']);

$display->delete_row("rooms", array("room_id" => $id));
header('location:dashboard.php?option=rooms');	
?>