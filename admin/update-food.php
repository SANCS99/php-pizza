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
            <div class="outer-wrap" style="height:590px">
                <div class="img-wrap">
                    <img src="../images/admin/food.png" alt="form-img">
                </div>

                <div class="form-wrap" style="padding-top: 20px;">
                    <h1>Update Food</h1>
                    <br><br>

                    <?php

                    include_once '../includes/dbh.inc.php';

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $sql = "SELECT * FROM items WHERE item_id=$id";

                        $result = mysqli_query($conn, $sql);

                        $row = mysqli_fetch_assoc($result);

                        $title = $row['item_name'];
                        $category = $row['category'];
                        $current_image = $row['image_src'];
                        $price = $row['price'];
                    }
                    else{
                        header("Location:manage-food.php?update=failed");
                    }
                    ?>
                    
                    <form action="../includes/updateFood.inc.php" method="POST" enctype="multipart/form-data">
                        Title <input type="text" name="title" placeholder="Food title" value="<?php echo $title?>">
                        <br><br>
                        Category <br><br>
                        <select name="category">
                            <option>Food</option>
                            <option>Drink</option>
                            <option>Desert</option>
                        </select>
                        <br><br>
                        Current Image 
                        <br><br>
                        <?php
                        if ($current_image == "") {
                            echo "Image not available";
                        }
                        else{
                            echo "<img src='../images/food/".$current_image."' width='50px'";
                        }
                        ?>
                        <br><br>
                        Select New Image <input type="file" name="image">
                        <br><br>
                        Price <input type="num" name="price" placeholder="Price" value="<?php echo $price?>">
                        <br><br>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image?>">
                        <input type="submit" name="submit" value="Update Food" class="btn-update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

