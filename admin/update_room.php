<?php 
$id = $_GET['id'];
$sql = $display->select_all("rooms WHERE room_id='$id'");
$res = $sql[0];
extract($_REQUEST);

if(isset($update)){
	$display->update("rooms", array("room_no" => $room_no, "type"=> $type, "price" => $price, "details" => $details), array("room_id" => $id));
	header('location:dashboard.php?option=rooms');
}
?>

<form method="post" enctype="multipart/form-data">
	<table class="table table-bordered">	
		<tr>	
			<th>Room No</th>
			<td><input type="text"  name="room_no" value="<?= $res['room_no']; ?>"  class="form-control"/></td>
		</tr>
		
		<tr>	
			<th>Room Type</th>
			<td><input type="text" name="type" value="<?= $res['type']; ?>"  class="form-control"/></td>
		</tr>
		
		<tr>	
			<th>Price</th>
			<td><input type="text" name="price"  value="<?= $res['price']; ?>" class="form-control"/></td>
		</tr>
		
		<tr>	
			<th>Details</th>
			<td><textarea name="details"  class="form-control"><?= $res['details']; ?></textarea></td>
		</tr>
		
		<tr>
			<td colspan="2">
				<input type="submit" class="btn btn-primary" value="Update Room Details" name="update"/>
			</td>
		</tr>
	</table> 
</form>