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
            <h1>Manage Admin</h1>
            <br>
            <br>
        
            <a href="add.php" class="btn-add">Add Admin</a>
            <br><br>
            <?php
                /*if(isset($_SESSION['add']))
                {
                    echo "<h3>Admin added successful</h3>";
                }

                if (isset($_GET['delete'])) {
                    echo $_GET['delete'];
                }*/

                if (isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
            <br><br>
        
            <table>
                <tr>
                    <th>Number</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th></th>
                </tr>

                <?php

                include_once '../includes/dbh.inc.php';

                $sql2 = "SELECT * FROM admin";

                $result2 = mysqli_query($conn, $sql2);

                if ($result2 == TRUE) {
                    $count = mysqli_num_rows($result2);

                    $num = 1;

                    if ($count > 0) {
                        while ($rows = mysqli_fetch_assoc($result2)) {
                            $id = $rows['id'];
                            $fullName = $rows['fullName'];
                            $username = $rows['username'];

                            echo '<tr>
                                    <td>'.$num++.'</td>
                                    <td>'.$fullName.'</td>
                                    <td>'.$username.'</td>
                                    <td>
                                        <a href="update.php?id='.$id.'" class="btn-update">Update</a>
                                        <a href="../includes/delete.inc.php?id='.$id.'" class="btn-delete">Delete</a>
                                    </td>
                                 </tr>';
                        }
                    }
                }

                ?>
            </table>
        </div>
    </div>
</body>

</html>
