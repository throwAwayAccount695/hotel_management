<?php 
if(isset($new)){
	$img_new = $_FILES['img']['name'];
	
	if($display->insert_into("slider", array("image", "caption"), array($img_new, $cap))){
		move_uploaded_file($_FILES['img']['tmp_name'],"../image/Slider/$img_new");	
		header('location:dashboard.php?option=slider');	
	}
}
?>
<form method="post" enctype="multipart/form-data">
	<table class="table table-bordered">
		<tr style="height:40">
			<th>Caption</th>
			<td><input type="text" name="cap" class="form-control"/></td>
		</tr>
		<tr>	
			<th>Image</th>
			<td><input type="file" name="img" accept="image/*" class="form-control"/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" class="btn btn-primary" value="Add new Slider" name="new"/>
			</td>
		</tr>
	</table> 
</form>