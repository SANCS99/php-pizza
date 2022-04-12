<?php 

include_once 'dbh.inc.php';

session_start();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];

    $sql = "UPDATE admin SET fullName='$fullname', username='$username' WHERE id='$id'";

    $result = mysqli_query($conn, $sql);

    if ($result == TRUE) {
        $_SESSION['update'] = "Update Successfully";

        header("Location:../admin/manage.php?update=success");
    }
    else{
        $_SESSION['update'] = "Update Failed";

        header("Location:../admin/update.php?update=failed"); 
    }
}