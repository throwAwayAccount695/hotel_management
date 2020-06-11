<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/hotel_management/classes/Display.php');

$id = $_GET['id'];
$res = $display->select_all("rooms WHERE room_id='$id'");

$temp = str_replace(' ', '_', $res[0]['type']);
$temp = strtolower($temp);
$path = '../image/' .  $temp; 
$files = glob($path . '/*.*');
foreach ($files as $file) {
    unlink($file);
}

rmdir($path);
unlink("../image/rooms/" . $res[0]['image']);

$display->delete_row("rooms", array("room_id" => $id));
header('location:dashboard.php?option=rooms');	
?>