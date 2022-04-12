<?php 

include_once '../includes/check.inc.php'; 
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
            <div class="outer-wrap">
                <div class="img-wrap">
                    <img src="../images/admin/food.png" alt="form-img">
                </div>

                <div class="form-wrap" style="padding-top: 50px;">
                    <h1>Add Food</h1>
                    <br><br>

                    <?php
                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                    ?>
                    
                    <form action="../includes/addFood.inc.php" method="POST" enctype="multipart/form-data">
                        Title <input type="text" name="title" placeholder="Food title">
                        <br><br>
                        Category <br><br>
                        <select name="category">
                            <option>Food</option>
                            <option>Drink</option>
                            <option>Desert</option>
                        </select>
                        <br><br>
                        Image <input type="file" name="image">
                        <br><br>
                        Price <input type="num" name="price" placeholder="Price">
                        <br><br>
                        <input type="submit" name="submit" value="Add Food" class="btn-update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

