<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log In</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="login">
            <img src="images/avator.png" class="avator">

            <h1>Log in</h1>

            <?php
            if (isset($_GET['signup'])) {
                if ($_GET['signup'] == "success") {
                    echo "<p class='success'>You have sign up!</p>";
                }
            }

            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyInput") {
                    echo "<p class='error'>Fill all fields!</p>";
                }
                
                else if ($_GET['error'] == "invalid") {
                    echo "<p class='error'>Incorrect email or password!</p>";
                }
                
                else if ($_GET['error'] == "accessBlocked") {
                    echo "<p class='error'>You have been blocked!</p>";
                }
            }
            ?>

            <form action="includes/login.inc.php" method="POST">
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="pwd" placeholder="Enter Password">

                <input type="submit" name="submit" value="Login">

                <p style="text-align: center; margin-top:20px;">Not a member? <a href="signup.php" style="text-decoration: none;">Create Account</a></p>
            </form>
        </div>
    </body>
</html>
