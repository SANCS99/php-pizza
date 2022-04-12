<?php 
include_once '../includes/check.inc.php'; 

include_once '../includes/dbh.inc.php';
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
</head>
<body>
    <div class="menu">
    <div class="wrapper">
        <div class="sidebar">
            <h2>Admin Panel</h2>

            <ul>
                <li><a href="home.php"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="manage.php"><i class="fas fa-users-cog"></i>Admin</a></li>
                <li><a href="manage-user.php"><i class="fas fa-users"></i>Users</a></li>
                <li><a href="manage-food.php"><i class="fas fa-hamburger"></i>Food</a></li>

            </ul>
            
            <div class="logout-btn">
                <a href="../includes/admin-logout.php"><i class="fas fa-user-slash"></i>Logout</a>
            </div>

            <div class="footer">
                <p>2021 All rights reserved</p>
            </div>
        </div>
    </div>
    </div>

    <div class="content">
        <div class="wrapper">
            <h1>DASHBOARD</h1>
    
            <div class="col-4">
                <?php
                $sql = "SELECT * FROM users";

                $result = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($result);
                ?>
                
                <h1><?php echo $count ?></h1>
                <br>
                Users
            </div>
    
            <div class="col-4">
                <?php
                $sql2 = "SELECT * FROM items";

                $result2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($result2);
                ?>

                <h1><?php echo $count2 ?></h1>
                <br>
                Foods
            </div>
    
            <div class="col-4">
                <h1>1</h1>
                <br>
                Summery
            </div>
    
            <div class="col-4">
                <h1>1</h1>
                <br>
                Summery
            </div>
    
            <div class="clearfix"></div>
        </div>
    </div>
</body>
</html>
