<?php 

include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
    $lname = $_POST['lname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
	$confirmPwd = $_POST['confirmPwd'];

	require_once 'functions.inc.php';

    if (emptyInputSignup($fname, $lname, $email, $username, $pwd, $confirmPwd) !== false) {
        header("Location:../signup.php?error=emptyInput");
        exit();
    }

    if (invalidUsername($username) !== false) {
        header("Location:../signup.php?error=invlaidUsername");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("Location:../signup.php?error=invalidEmail");
        exit();
    }

    if (passwordMatch($pwd, $confirmPwd) !== false) {
        header("Location:../signup.php?error=passwordNotMatch"); 
        exit();
    }

    if (usernameExists($conn, $username, $email) !== false) {
        header("Location:../signup.php?error=usernameTaken"); 
        exit();
    }

    createUser($conn, $fname, $lname, $email, $username, $pwd);
}
else{
	header("Location:../signup.php");
    exit();
}

?>