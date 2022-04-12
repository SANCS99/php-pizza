<?php
include_once '../includes/dbh.inc.php';

session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f2f6;
            height: 100vh;
            overflow: hidden;
        }
        .center{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: #fff;
            border-radius: 10px;
        }

        .center h1{
            text-align: center;
            margin-top: 20px;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
        }

        .center form{
            padding: 0 40px;
            margin-top: 15px;
            box-sizing: border-box;
        }

        form .text-field{
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }

        .text-field input{
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }

        .text-field label{
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: 0.5s;
        }

        .text-field span::before{
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #1e90ff;
            transition: 0.5s;
        }

        .text-field input:focus ~ label, .text-field input:valid ~ label{
            top: -5px;
            color: #2691d9;
        }

        .text-field input:focus ~ span::before, .text-field input:valid ~ span::before{
            width: 100%;
        }

        input[type="submit"]{
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #1e90ff;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            margin-bottom: 20px;
        }

        input[type="submit"]:hover{
            background-color: #3742fa;
        }

        .log-error{
            text-align: center;
            color: #ff4757;
        }
    </style>
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <br>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        if (isset($_SESSION['no-login'])) {
            echo $_SESSION['no-login'];
            unset($_SESSION['no-login']);
        }
        ?>
            
        <form method="POST">
            <div class="text-field">
                <input type="text" name="username" required>
                <span></span>
                <label>Username</label>
            </div>

            <div class="text-field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>

            <input type="submit" name="submit" value="Login">

        </form>
    </div>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['user'] = $username;

        header("Location:home.php?login=success");
    }
    else{
        $_SESSION['login'] = "<div class='log-error'>Username or password invalid<div>";

        header("Location:index.php?login=failed");
    }
}

?>
