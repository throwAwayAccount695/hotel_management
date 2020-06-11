<?php 
if(isset($add)){
	$sql = $display->select_all("rooms WHERE room_no = '$room_no'", TRUE);
	if(mysqli_num_rows($sql)){
		echo "<h3 style='color:red'>this room is already added!</h3>";	
	} else{	
		$temp = explode('.', $_FILES['img']['name']);
		$temp = end($temp);
		$temp = str_replace(' ', '_', $type) . '.' . $temp;
		$temp = strtolower($temp);
		$img = $temp;
		$display->insert_into("rooms", array("room_no", "type", "price", "details", "image"), array($room_no, $type, $price, $details, $img));
		move_uploaded_file($_FILES['img']['tmp_name'], "../image/rooms/" . $img);
		echo "<h3 style='color:blue'>Rooms added successfully!</h3>";
	}
}
?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<tr>	
		<th>Room No</th>
		<td><input type="number" name="room_no"  class="form-control"/></td>
	</tr>
	
	<tr>	
		<th>Room Type</th>
		<td><input type="text" name="type"  class="form-control"/></td>
	</tr>
	
	<tr>	
		<th>Price</th>
		<td><input type="number" name="price"  class="form-control"/></td>
	</tr>
	
	<tr>	
		<th>Details</th>
		<td><textarea name="details"  class="form-control"></textarea></td>
	</tr>
	
	<tr>	
		<th>Images</th>
		<td><input type="file" name="img"  class="form-control"/></td>
	</tr>
	
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add Room Details" name="add"/>
		</td>
	</tr>
</table> 
</form>