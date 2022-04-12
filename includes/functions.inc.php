<?php 

function emptyInputSignup($fname, $lname, $email, $username, $pwd, $confirmPwd){
	$result;

	if (empty($fname) || empty($lname) || empty($email) || empty($username) || empty($pwd) || empty($confirmPwd)) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function invalidUsername($username){
	$result;

	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function invalidEmail($email){
	$result;

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function passwordMatch($pwd, $confirmPwd){
	$result;

	if ($pwd !== $confirmPwd) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function usernameExists($conn, $username, $email){
	$sql = "SELECT * FROM users WHERE user_id = ? OR email = ?;";

	$stmt = mysqli_stmt_init($conn);  

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("Location:../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else{
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

function createUser($conn, $fname, $lname, $email, $username, $pwd){
	
	$sql = "INSERT INTO users SET first_name='$fname', last_name='$lname', email='$email', username='$username', password='$pwd'";

	$result = mysqli_query($conn, $sql);

	if ($result == TRUE) {
		header("Location:../login.php?signup=success");
	}
	else{
		header("Location:../signup.php?signup=failed");
	}
}

function emptyInputLogin($username, $pwd){
	$result;

	if (empty($username) || empty($pwd)) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function loginUser($conn, $username, $password){
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
    	session_start();

    	$_SESSION['username'] = $username;
    	
        header("Location:../index.php?login=success");
	
	$sql2 = "SELECT * FROM users";

        $result2 = mysqli_query($conn, $sql);

        if ($result2 == TRUE) {
            $count1 = mysqli_num_rows($result);

            if ($count1 == 1) {
        	$row = mysqli_fetch_assoc($result);
        
        	$status = $row['status'];

        	if ($status == "Block") {
        	     header("Location:../login.php?error=accessBlocked");
                }
	    }
        }
    }
    else{
        $_SESSION['login'] = "<div class='log-error'>Username or password invalid<div>";

        header("Location:../login.php?error=invalid");
    }
}
