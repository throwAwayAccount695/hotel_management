<?php 
$id = $_GET['id'];
$type = $display->get_room_type($id);
$count = $display->count_files("../image/$type");
$files = $display->get_files("../image/$type");
extract($_REQUEST);

if(isset($delete)){
    unlink($delete);
    header('location:dashboard.php?option=room_carousel&id=' . $id . "&msg=<h3 style='color:orange'>Image Delete!</h3>");	
}
if(isset($msg)){
	echo $msg;
}

// FIX UP ROOM_DETAILS.PHP TO DISPLAY CAROUSEL
//ADD DELETE FUNCTION

if(isset($update)){
    foreach ($_FILES as $key => $value) {
        if($value['size'] != 0){
            $image = $type . "_" . $key .  '.' . str_replace('image/', '', $value['type']);
            $image_check = $type . '_' . $key .  '.*';
            $result = glob("../image/$type/$image_check");
            if(!empty($result)){
                foreach ($result as $file) {
                    unlink($file);
                }
            }
            move_uploaded_file($value['tmp_name'], "../image/$type/$image");
        }
    }
   header('location:dashboard.php?option=room_carousel&id=' . $id . "&msg=<h3 style='color:blue'>Images Added/Updated!</h3>");	
}
?>
<script>
	function del(img_id){
        alert("poop");
		if(confirm("You want to delete this Image?")){
			window.location.href=';	
		}
	}
</script>

<form method="post" enctype="multipart/form-data">
	<table class="table table-bordered">	
        <?php if(is_dir("../image/$type")) : ?>
            <?php for($j = 0; $j <  $count + 1; $j++) : ?>
                <tr>
                    <th><?= ($j == $count) ? "Add new image" : "Update Carousel Image " . ($j + 1); ?></th>
                    <td><image src="<?= $files[$j]; ?>" width="150px" height="75px"></td>
                    <td><a href="<?= 'dashboard.php?option=room_carousel&id=' . $id . "&delete=" . $files[$j]; ?>"><span class="glyphicon glyphicon-remove" style='color:red'></span></a></td>
                    <td><input type="file" name="img<?= $j; ?>" class="form-control" accept="image/*"/></td>
                </tr>
            <?php endfor; ?>
        <?php else : 
            mkdir("../image/$type");
            header('location:dashboard.php?option=room_carousel&id=' . $id . "&msg=<h3 style='color:blue'>Directory Added!</h3>");	
            endif; 
        ?>
		<tr>
			<td colspan="4">
				<input type="submit" class="btn btn-primary" value="Update/Add Carousel image/images" name="update">
			</td>
		</tr>
	</table> 
</form>

