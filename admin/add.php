<?php include_once '../includes/check.inc.php'; ?>

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
                    <li><a href="manage-orders.php"><i class="fa fa-expeditedssl"></i>Orders</a></li>

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
            <div class="outer-wrap">
                <div class="img-wrap">
                    <img src="../images/admin/admin.png" alt="form-img">
                </div>

                <div class="form-wrap">
                    <h1>Add Admin</h1>
                    <br>
                    
                    <form action="../includes/add.inc.php" method="POST">
                        Full Name <input type="text" name="fullname" placeholder="Full Name">
                        <br><br>
                        Username <input type="text" name="username" placeholder="Username">
                        <br><br>
                        Password <input type="password" name="password" placeholder="Password">
                        <br><br>
                        <input type="submit" name="submit" value="Add Admin" class="btn-update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

