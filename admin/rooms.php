<script>
	function del_room(id){
		if(confirm("You want to delete this Room ?")){
			window.location.href='delete_room.php?id=' + id;	
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<h1>Room Details</h1><hr>
	<tr>
		<td colspan="9"><a href="dashboard.php?option=add_rooms" class="btn btn-primary">Add New Rooms</a></td>
	</tr>
	<tr style="height:40">
		<th>Sr No</th>
		<th>Image</th>
		<th>Room No</th>
		<th>Type</th>
		<th>Price</th>
		<th>Details</th>
		<th>Image Carousel</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>
	<?php $res = $display->select_all("rooms"); ?>
	<?php for($i = 0; $i < count($res); $i++) : ?>
		<tr>
			<td><?= $i + 1; ?></td>
			<td><img src="<?= "../image/rooms/" . $res[$i]['image'];?>" width="50" height="50"/></td>
			<td><?= $res[$i]['room_no']; ?></td>
			<td><?= $res[$i]['type']; ?></td>
			<td><?= $res[$i]['price']; ?></td>
			<td><?= $res[$i]['details']; ?></td>
			<td><a href="dashboard.php?option=room_carousel&id=<?= $res[$i]['room_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
			<td><a href="dashboard.php?option=update_room&id=<?= $res[$i]['room_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
			<td><a href="#" onclick="del_room('<?= $res[$i]['room_id']; ?>')"><span class="glyphicon glyphicon-remove" style='color:red'></span></a></td>
		</tr>	
	<?php endfor; ?>	
</table>