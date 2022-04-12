<?php

if (isset($_POST['submit'])) {

    include_once 'dbh.inc.php';

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $pwd = $_POST['password'];

    $sql = "INSERT INTO admin SET fullName='$fullname', username='$username', password='$pwd'";

    $result = mysqli_query($conn, $sql);

    if ($result == TRUE) {
        $_SESSION['add'] = "Admin added successfully";

        header("Location:../admin/manage.php?dataEntry=success");
    }
    else{
        $_SESSION['add'] = "Failed to add admin";

        header("Location:../admin/add.php?dataEntry=unsuccess");
    }
}

?>