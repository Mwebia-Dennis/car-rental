<?php


	if (isset($_POST['saveImage'])) {
		
		if (isset($_FILES['image'])) {
			
			$image_name = $_FILES['image']['name'];
			$image_size = $_FILES['image']['size'];
			$image_tmp =$_FILES['image']['tmp_name'];
      		$image_type=$_FILES['image']['type'];
      		$image_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      		$error = array();


      		$extensions = array("jpeg","jpg","png");

      		if (in_array($image_ext, $extensions) === false) {
      			
      			$error[] = "Extension not allowed,choose a jpeg or png file";
      		}
      		if ($image_size > 2097152) {
      			$error[] = "Image should be 2mb and below";
      		}
      		

      		if (empty($error) ==true) {
      			move_uploaded_file($image_tmp, "images/".$image_name);
      			echo "success";
      		}else{

      			print_r($error);
      		}		
      	}
	}


?>

<form method="POST" enctype="multipart/form-data" action="">
	<input type="file" name="image">
	<input type="submit" name="saveImage">
</form>