<?php 
if(isset($update)){
	//hashes password with md5 and adds salt to the string.
	$tmp = md5($op . $display->get_salt());
	$sql = $display->select_all("admin WHERE username='$admin' AND password='$tmp'", TRUE);
	if(mysqli_num_rows($sql)){
		if($np == $cp){
			//hashes password with md5 and adds salt to the string.
			$display->update("admin", array("password" => md5($np . $display->get_salt())), array("username" => $admin));	
			echo "<h3 style='color:blue'>Password updated successfully!</h3>";
		} else{
			echo "<h3 style='color:red'>New and repeated password doesn't match!</h3>";
		}
	} else{
		echo "<h3 style='color:red'>Old Password doesn't match!</h3>";	
	}
}
?>
<form method="post" enctype="multipart/form-data">
	<table class="table table-bordered table-striped table-hover">
		<h1>Update Password</h1><hr>
		<tr style="height:40">
			<th>Enter Your old Password</th>
			<td><input type="password" name="op" class="form-control"required/></td>
		</tr>
		
		<tr>	
			<th>Enter Your New Password</th>
			<td><input type="password" name="np" class="form-control"required/></td>
		</tr>
		
		<tr>	
			<th>Repeat Your New Password</th>
			<td><input type="password" name="cp" class="form-control"required/></td>
		</tr>
		
		<tr>
			<td colspan="2" align="center">
				<input type="submit" class="btn btn-primary" value="Update Password" name="update"required/>
			</td>
		</tr>
	</table> 
</form>