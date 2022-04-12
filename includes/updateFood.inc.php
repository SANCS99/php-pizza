<?php

include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$title = $_POST['title'];
	$category = $_POST['category'];
	$currentImage = $_POST['current_image'];

	if (isset($_FILES['image']['name'])) {
		$imgName = $_FILES['image']['name'];

		if ($imgName != "") {
			$ext = end(explode(".", $imgName));

			$imgName = "food".rand(00000, 99999).".".$ext;

			$src = $_FILES['image']['tmp_name'];

			$dst = "../images/food/".$imgName;

			$upload = move_uploaded_file($src, $dst);

			if ($upload == false) {
				$_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";

				header("Location:../admin/manage-food.php?imgUpload=failed");
				die();
			}
		}
	}
	else{
		$imgName = $currentImage;
	}

	$price = $_POST['price'];

	$sql = "UPDATE items SET item_name='$title', category='$category', image_src='$imgName', price=$price WHERE item_id=$id";
    
    $result = mysqli_query($conn, $sql);

    if ($result == true) {
    	$_SESSION['update'] = "<div class='update'>Food updated successfully</div>";

    	header("Location:../admin/manage-food.php?updateFood=success");
    }
    else{
    	$_SESSION['update'] = "<div class='error'>Food updated failed</div>";

    	header("Location:../admin/manage-food.php?updateFood=failed");
    }
}