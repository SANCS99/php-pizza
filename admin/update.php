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
                    <li><a href="manage-orders.php"><i class="fa fa-expeditedssl"></i>Orders</a></li>                </ul>
                
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
                    <img src="../images/admin/update.png" alt="form-img">
                </div>

                <div class="form-wrap">
                    <h1>Update Admin</h1>
                    <br><br>

                    <?php

                    include_once '../includes/dbh.inc.php';

                    $id = $_GET['id'];

                    $sql = "SELECT * FROM admin WHERE id=$id";

                    $result = mysqli_query($conn, $sql);

                    if ($result == TRUE) {
                        $count = mysqli_num_rows($result);

                        if ($count == 1) {
                            $row = mysqli_fetch_assoc($result);

                            $fullname = $row['fullName'];
                            $username = $row['username'];
                        }
                        else{
                            header("Location:manage.php?update=failed");
                        }
                    }

                    ?>

                    <form action="../includes/update.inc.php" method="POST">
                        Full Name <input type="text" name="fullname" value="<?php echo $fullname; ?>">
                        <br><br>
                        Username <input type="text" name="username" value="<?php echo $username; ?>">
                        <br><br>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-update">
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</body>

</html>
