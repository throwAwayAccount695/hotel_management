<table class="table table-bordered table-striped table-hover">
	<h1>User Registration</h1><hr>
	<tr>
		<th>Sr No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Mobile</th>
		<th>Address</th>
		<th>Gender</th>
		<th>Country</th>
		<th>Pictrure</th>
	</tr>
	<?php 
		$res = $display->select_all("create_account");
		for($i = 0; $i < count($res); $i++) :
	?>
	<tr>
		<td><?= $i + 1; ?></td>
		<td><?= $res[$i]['name']; ?></td>
		<td><?= $res[$i]['email']; ?></td>
		<td><?= $res[$i]['password']; ?></td>
		<td><?= $res[$i]['mobile']; ?></td>
		<td><?= $res[$i]['address']; ?></td>
		<td><?= $res[$i]['gender']; ?></td>
		<td><?= $res[$i]['country']; ?></td>
		<td><?= $res[$i]['pictrure']; ?></td>
	</tr>	
	<?php endfor; ?>	
</table>