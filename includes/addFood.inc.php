<?php 

session_start();

include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$category = $_POST['category'];

    //upload image
    //check whether the image button clicked or not
	if (isset($_FILES['image']['name'])) {
		$imgName = $_FILES['image']['name'];
       
        //check the image is selected
        if ($imgName != "") {
        	//image is selected
        	//rename the image
        	$ext = end(explode(".", $imgName));

        	//create new name for image
        	$imgName = "food".rand(00000, 99999).".".$ext;

        	//upload the image
        	$src = $_FILES['image']['tmp_name']; //source path

        	$dst = "../images/food/".$imgName; //destination path

        	$upload = move_uploaded_file($src, $dst);

        	//check whether image upload or not
        	if ($upload == false) {
        		$_SESSION['upload'] = "<div>Failed to upload image</div>";

        		header("Location:../admin/add-food.php?upload=failed");
        		die();
        	}
        }
	}
	else{
		$imgName = "";
	}

	$price = $_POST['price'];

	$sql = "INSERT INTO items SET item_name='$title', category='$category', image_src='$imgName', price=$price";

	$result = mysqli_query($conn, $sql);

	if ($result == true) {
		$_SESSION['add'] = "<div>Food added successfully</div>";

		header("Location:../admin/manage-food.php?addFood=success");
	}
	else{
		$_SESSION['add'] = "<div>Food added failed</div>";

		header("Location:../admin/add-food.php?addFood=fail");
	}
}