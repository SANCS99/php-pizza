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
            <div class="outer-wrap" style="height:590px">
                <div class="img-wrap">
                    <img src="../images/admin/food.png" alt="form-img">
                </div>

                <div class="form-wrap" style="padding-top: 20px;">
                    <h1>Update Order</h1>
                    <br><br>

                    <?php

                    include_once '../includes/dbh.inc.php';

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $sql = "SELECT * FROM orders WHERE order_id=$id";

                        $result = mysqli_query($conn, $sql);

                        $row = mysqli_fetch_assoc($result);

                        $tprice = $row['total_price'];
                        $location = $row['req_location'];
                        $uname = $row['user_name'];
                        $cno = $row['contact_num'];
                    }
                    else{
                        header("Location:manage-orders.php?update=failed");
                    }
                    ?>
                    
                    <form action="../includes/updateOrder.inc.php" method="POST" enctype="multipart/form-data">
                        Total Price <input type="text" name="price" placeholder="Order price" value="<?php echo $title?>">
                        <br><br>
                        Location <br><br>
                        
                        <br><br>
                        User Name
                        <br><br>
                        Contact Number

                        <br><br>
                        Price <input type="num" name="price" placeholder="Price" value="<?php echo $price?>">
                        <br><br>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <!-- <input type="hidden" name="current_image" value="<?php echo $current_image?>"> -->
                        <input type="submit" name="submit" value="Update Order" class="btn-update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

