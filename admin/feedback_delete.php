<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/hotel_management/classes/Display.php');

$id = $_GET['id'];
$display->delete_row("feedback", array("id" => $id));
header('location:dashboard.php?option=feedback');	
?>