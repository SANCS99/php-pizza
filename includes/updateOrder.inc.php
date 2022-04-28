<?php

include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$tprice = $_POST['total_price'];
	$location = $_POST['req_location'];
	$uname = $_POST['user_name'];
    $cno = $_POST['contact_num'];

    

	

	$price = $_POST['price'];

	$sql = "UPDATE items SET item_name='$title', category='$category', image_src='$imgName', price=$price WHERE item_id=$id";
    
    $result = mysqli_query($conn, $sql);

    if ($result == true) {
    	$_SESSION['update'] = "<div class='update'>Order updated successfully</div>";

    	header("Location:../admin/manage-food.php?updateFood=success");
    }
    else{
    	$_SESSION['update'] = "<div class='error'>Food updated failed</div>";

    	header("Location:../admin/manage-food.php?updateFood=failed");
    }
}