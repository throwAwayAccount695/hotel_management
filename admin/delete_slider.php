<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/hotel_management/classes/Display.php');

$id = $_GET['id'];
$res = $display->select_all("slider where id='$id'");
unlink("../image/Slider/" . $res[0]['image']);

if($display->delete_row("slider", array("id" => $id))){
	header('location:dashboard.php?option=slider');	
}
?>