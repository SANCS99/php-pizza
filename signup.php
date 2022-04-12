<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="signup">
        <img src="images/avator.png" class="avator">

        <h1>Sign Up</h1>

        <?php

        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyInput") {
                echo "<p class='error'>Fill all fields!</p>";
            }
            else if ($_GET['error'] == "invlaidUsername") {
                echo "<p class='error'>Choose a proper user name!</p>";
            }
            else if ($_GET['error'] == "invalidEmail") {
                echo "<p class='error'>Choose a proper email!</p>";
            }
            else if ($_GET['error'] == "passwordNotMatch") {
                echo "<p class='error'>Password does not match!</p>";
            }
            else if ($_GET['error'] == "stmtfailed") {
                echo "<p class='error'>Something went wrong, Try again!</p>";
            }
            else if ($_GET['error'] == "usernameTaken") {
                echo "<p class='error'>Username already taken!</p>";
            }
        }
        
        ?>

        <form action="includes/signup.inc.php" method="POST">
            <label>First Name</label>
            <br>
            <input type="text" name="fname" placeholder="Enter First Name">
            <br>
            
            <label>Last Name</label>
            <br>
            <input type="text" name="lname" placeholder="Enter Last Name">
            <br>

            <label>Email</label>
            <br>
            <input type="text" name="email" placeholder="Enter Email">
            <br>

            <label>Username</label>
            <br>
            <input type="text" name="username" placeholder="Enter Username">
            <br>

            <label>Password</label>
            <br>
            <input type="password" name="pwd" placeholder="Enter Password"><br>


            <label>Confirm Password</label>
            <br>
            <input type="password" name="confirmPwd" placeholder="Confirm Password">
            <br>

            <input type="submit" name="submit" value="Sign Up">
        </form>
    </div>
</body>

</html>