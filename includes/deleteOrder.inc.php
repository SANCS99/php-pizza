<?php

session_start();

include_once 'dbh.inc.php';


	$id = $_GET['id'];

    // $imgName = $_GET['img_name'];

    $sql = "DELETE FROM orders WHERE order_id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result == TRUE) {
    	$_SESSION['delete'] = "<div class='delete'>Delete successfully</div>";
    
    	header("Location:../admin/manage-orders.php?delete=success");
    }
    else{
    	header("Location:../admin/manage-orders.php?delete=unsuccess");
    }