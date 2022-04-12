<?php

session_start();

include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$first_name = $_POST['firstname'];
	$last_name = $_POST['lastname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
    $status = $_POST['status'];
		
	$sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', username='$username', status='$status' WHERE user_id=$id";
    
    $result = mysqli_query($conn, $sql);

    if ($result == true) {
    	$_SESSION['update'] = "<div class='update'>User updated successfully</div>";

    	header("Location:../admin/manage-user.php?updateUser=success");
    }
    else{
    	$_SESSION['update'] = "<div class='error'>User updated failed</div>";

    	header("Location:../admin/manage-user.php?updateUser=failed");
    }
}