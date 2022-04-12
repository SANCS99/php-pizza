<?php 

include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['pwd'];

	require_once 'functions.inc.php';

    if (emptyInputLogin($username, $password) !== false) {
        header("Location:../login.php?error=emptyInput");
        exit();
    }
    
    loginUser($conn, $username, $password);
}