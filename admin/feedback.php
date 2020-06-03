<script>
	function delFeedback(id){
		if(confirm("You want to delete this Feedback ?")){
			window.location.href='delete_feedback.php?id=' + id;	
		}
	}
</script>
<table class="table table-striped table-hover">
	<h1>Feedback</h1><hr>
	<tr>
		<th>Sr No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Message</th>
		<th>Delete</th>
	</tr>
	<?php 
		$res = $display->select_all("feedback");
		for($i = 0; $i < count($res); $i++) :
	?>
	<tr>
		<td><?= $i + 1; ?></td>
		<td><?= $res[$i]['name']; ?></td>
		<td><?= $res[$i]['email']; ?></td>
		<td><?= $res[$i]['mobile']; ?></td>
		<td><?= $res[$i]['message']; ?></td>
		<td><a href="#"onclick="delFeedback('<?= $res[$i]['id']; ?>')"><span class="glyphicon glyphicon-remove"style='color:red'></span></a></td>
	</tr>	
	<?php endfor; ?>	
</table>