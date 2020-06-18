<?php 
$id = $_GET['id'];
$sql = $display->select_all("rooms WHERE room_id='$id'");
$res = $sql[0];
$check = $display->select_all("rooms");
$duplicate = FALSE;
extract($_REQUEST);

//Echoes Out Error Messages From _GET Variables
if(isset($msg)){
	echo $msg;
}

if(isset($update)){
	//Loops Through Room Numbers To Check If That Room Number Allready Exists 
	for($i = 0; $i < count($check); $i++){
		if($check[$i]['room_no'] == $room_no && $room_no != $res['room_no']){
			$duplicate = TRUE;
		}
	}
	if(!$duplicate){
		//Check For File Name Change
		if($type != $res['type']){
			$old_str = str_replace(' ', '_', $res['type']);
			$old_str = strtolower($old_str);
			$path = '../image/' .  $old_str;

			$new_str = str_replace(' ', '_', $type);
			$new_str = strtolower($new_str);
			$new_path = '../image/' .  $new_str;
			rename($path, $new_path); 

			$files = glob($new_path . '/*.*');
			foreach ($files as $file) {
				$file_str = explode('/', $file);
				$file_str = end($file_str);
				rename($file, $new_path . '/' . str_replace($old_str, $new_str, $file_str));
			}
		}
		//Check If A New Main Image Has Been Added
		if($_FILES['img']['size'] != 0){
			$temp = explode('.', $_FILES['img']['name']);
			$temp = end($temp);
			$temp = str_replace(' ', '_', $type) . '.' . $temp;
			$temp = strtolower($temp);
			$img = $temp;
			unlink("../image/rooms/" . $res['image']);
			$display->update("rooms", array("room_no" => $room_no, "type"=> $type, "price" => $price, "details" => $details, "image" => $img), array("room_id" => $id));
			move_uploaded_file($_FILES['img']['tmp_name'], "../image/rooms/" . $img);
			header('location:dashboard.php?option=update_room&id=' . $id . "&msg=<h3 style='color:blue'>Room Updated With New Main Image!</h3>");	
		} else {
			$display->update("rooms", array("room_no" => $room_no, "type"=> $type, "price" => $price, "details" => $details), array("room_id" => $id));
			header('location:dashboard.php?option=update_room&id=' . $id . "&msg=<h3 style='color:blue'>Room Updated!</h3>");	
		}
	} else {
		header('location:dashboard.php?option=update_room&id=' . $id . "&msg=<h3 style='color:red'>Room number can't be an allready existing one!</h3>");	
	}

}
?>

<form method="post" enctype="multipart/form-data">
	<table class="table table-bordered">	
		<tr>	
			<th>Room No</th>
			<td><input type="number"  name="room_no" value="<?= $res['room_no']; ?>"  required class="form-control"/></td>
		</tr>
		
		<tr>	
			<th>Room Type</th>
			<td><input type="text" name="type" value="<?= $res['type']; ?>" required class="form-control"/></td>
		</tr>
		
		<tr>	
			<th>Price</th>
			<td><input type="number" name="price"  value="<?= $res['price']; ?>" required class="form-control"/></td>
		</tr>
		
		<tr>	
			<th>Details</th>
			<td><textarea name="details"  class="form-control"><?= $res['details']; ?></textarea></td>
		</tr>

		<tr>	
			<th>Main Image</th>
			<td><input type="file" name="img" class="form-control"/></td>
		</tr>
		
		<tr>
			<td colspan="2">
				<input type="submit" class="btn btn-primary" value="Update Room Details" name="update"/>
			</td>
		</tr>
	</table> 
</form>