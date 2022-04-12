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
            <h1>Manage Food</h1>
            <br>
            <br>

        
            <a href="add-food.php" class="btn-add">Add Food</a>
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
                    <th>Number</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>

                <?php

                include_once '../includes/dbh.inc.php';

                $sql = "SELECT * FROM items";

                $result = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($result);

                $num = 1;

                if ($count > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['item_id'];
                        $title = $row['item_name'];
                        $category = $row['category'];
                        $imgName = $row['image_src'];
                        $price = $row['price'];

                        echo "<tr>
                                <td>".$num++."</td>
                                <td>".$title."</td>
                                <td>".$category."</td>
                                <td>";
                                   if ($imgName ==  "") {
                                       echo "<div class='error'>Image not added</div>";
                                   }
                                   else{
                                       echo "<img src='../images/food/".$imgName."' width='100px'";
                                   }
                        echo    "</td>
                                <td>".$price."</td>
                                <td>
                                    <a href='update-food.php?id=".$id."' class='btn-update'>Update</a>
                                    <a href='../includes/deleteFood.inc.php?id=".$id."' class='btn-delete'>Delete</a>
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
