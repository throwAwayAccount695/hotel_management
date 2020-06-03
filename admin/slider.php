<script>
	function delSlider(id){
		if(confirm("You want to delete this Slider ?")){
			window.location.href='delete_slider.php?id=' + id;	
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<tr>
		<td colspan="5"><a href="dashboard.php?option=add_slider" class="btn btn-primary">Add New</a></td>
	</tr>
	<tr style="height:40">
		<th>Sr No</th>
		<th>Image</th>
		<th>Caption</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>
	<?php 
		$sql = $display->select_all("slider");
		for($i = 0; $i < count($sql); $i++) :
	?>
		<tr>
			<td><?= $i + 1; ?></td>
			<td><img src="<?= "../image/Slider/" . $sql[$i]['image'];?>" width="50" height="50"/></td>
			<td><?= $sql[$i]['caption']; ?></td>
			<td><a href="dashboard.php?option=update_slider&id=<?= $sql[$i]['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
			<td><a href="#" onclick="delSlider('<?= $sql[$i]['id']; ?>')"><span class="glyphicon glyphicon-remove" style='color:red'></span></a></td>
		</tr>	
	<?php endfor; ?>	
</table>