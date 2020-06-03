<?php 
$id = $_GET['id'];
$sql = $display->select_all("slider where id='$id'");
$path="../image/Slider/" . $sql[0]['image'];

if(isset($update)){
	$imgNew = $_FILES['img']['name'];
	if($imgNew == ""){
		$arr = array("caption" => $cap);	
	} else{
		$arr = array("caption" => $cap, "image" => $imgNew);	
		//delete old image
		unlink($path);
		move_uploaded_file($_FILES['img']['tmp_name'],"../image/Slider/".$_FILES['img']['name']);
	}
	
	if($display->update("slider", $arr ,array("id" => $id))){
		header('location:dashboard.php?option=slider');	
	}
}
?>
<form method="post" enctype="multipart/form-data">
	<table class="table table-bordered">
		<tr style="height:40">
			<th>Caption</th>
			<td><input type="text" name="cap" value="<?= $sql[0]['caption']; ?>" class="form-control"/></td>
		</tr>
		<tr>	
			<th>Image</th>
			<td><input type="file" name="img" accept="image/*" class="form-control"/>
			<img src="<?= $path; ?>" height="100px" width="100px"/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" class="btn btn-primary" value="update" name="update"/>
			</td>
		</tr>
	</table> 
</form>