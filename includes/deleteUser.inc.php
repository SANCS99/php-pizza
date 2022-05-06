<?php

session_start();

include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	
	$sql = "DELETE FROM users WHERE user_id=$id";	
    
    $result = mysqli_query($conn, $sql);

    if ($result == true) {
    	$_SESSION['delete'] = "<div class='update'>User delete successfully</div>";

    	header("Location:../admin/manage-user.php?deleteUser=success");
    }
    else{
    	$_SESSION['delete'] = "<div class='error'>User delete failed</div>";

    	header("Location:../admin/manage-user.php?deleteUser=failed");
    }
}