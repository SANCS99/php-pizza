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
                    <li><a href="manage-order.php"><i class="fas fa-expeditedssl"></i>Orders</a></li>
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
            <h1>Manage Orders</h1>
            <br>
            <br>

        
            <a href="add-food.php" class="btn-add">Add VIP order</a>
            <br><br>

            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if (isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            ?>
            
            <br><br>
        
            <table style="">
                <tr>
                    <th>Order ID</th>
                    <th>Total Price</th>
                    <th>Location</th>
                    <th>User Name</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                </tr>

                <?php

                include_once '../includes/dbh.inc.php';

                $sql = "SELECT * FROM orders";

                $result = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($result);

                $num = 1;

                if ($count > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['order_id'];
                        $total = $row['total_price'];
                        $location = $row['req_location'];
                        $usrName = $row['user_name'];
                        $price = $row['contact_num'];

                        echo "<tr>
                                <td>".$id."</td>
                                <td>".$total."</td>
                                <td>".$location."</td>
                                <td>".$usrName."</td>
                                <td>".$price."</td>
                                <td>
                                    
                                    <a href='../includes/deleteOrder.inc.php?id=".$id."' class='btn-delete'>Remove</a>
                                </td>
                            </tr>";
                    }
                }

                ?>

                
                
                
            </table>
        </div>
    </div>
</body>

</html>
