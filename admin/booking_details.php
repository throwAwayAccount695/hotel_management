
<table class="table table-bordered table-striped table-hover">
	<h1>Room Booking Details</h1><hr>
	<tr>
		<th>Sr No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile Number</th>
		<th>Address</th>
		<th>Room Type</th>
		<th>Check in Date</th>
		<th>Check Out Time</th>
		<th>Check Out Date</th>
		<th>Occupancy</th>
		<th>Cancel Order</th>
	</tr>

	<?php 
		$res = $display->select_all("room_booking_details");
		for($i = 0; $i < count($res); $i++) :
	?>
	<tr>
		<td><?= $i + 1; ?></td>
		<td><?= $res[$i]['name']; ?></td>
		<td><?= $res[$i]['email']; ?></td>
		<td><?= $res[$i]['phone']; ?></td>
		<td><?= $res[$i]['address']; ?></td>
		<td><?= $res[$i]['room_type']; ?></td>
		<td><?= $res[$i]['check_in_date']; ?></td>
		<td><?= $res[$i]['check_in_time']; ?></td>
		<td><?= $res[$i]['check_out_date']; ?></td>
		<td><?= $res[$i]['Occupancy']; ?></td>
		<td><a style="color:red" href="cancel_order.php?booking_id=<?= $res[$i]['id']; ?>">Cancel</a></td>
	</tr>
	<?php endfor; ?>	
</table>