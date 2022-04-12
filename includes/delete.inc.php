<?php

include_once 'dbh.inc.php';

$id = $_GET['id'];

$sql = "DELETE FROM admin WHERE id=$id";

$result = mysqli_query($conn, $sql);

if ($result == TRUE) {
	header("Location:../admin/manage.php?delete=success");
}
else{
	header("Location:../admin/manage.php?delete=unsuccess");
}
