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
    <style type="text/css">
        table {
            width: 100%;
            box-shadow: none;
            background: #fff;
        }

        table tr:nth-child(odd){
            background: #fff;
        }

        table tr th {
          border-bottom: 1px solid black;
          padding: 1%;
          text-align: left;
        }  

        table tr td {
          padding: 1%;
        }
    </style>
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
                    <li><a href="manage-orders.php"><i class="fas fa-file"></i>Orders</a></li>                
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
                

                <div class="form-wrap" style="width:100%; padding-top: 30px;">
                    <h1>Update User</h1>
                    <br><br>

                    <?php

                    include_once '../includes/dbh.inc.php';

                    $id = $_GET['id'];

                    $sql = "SELECT * FROM users WHERE user_id=$id";

                    $result = mysqli_query($conn, $sql);

                    if ($result == TRUE) {
                        $count = mysqli_num_rows($result);

                        if ($count == 1) {
                            $row = mysqli_fetch_assoc($result);

                            $first_name = $row['first_name'];
                            $last_name = $row['last_name'];
                            $email = $row['email'];
                            $username = $row['username'];
                            $status = $row['status'];
                        }
                        else{
                            header("Location:manage-user.php?update=failed");
                        }
                    }

                    ?>

                    <form action="../includes/updateUser.inc.php" method="POST">
                        <table>
                            <tr>
                                <td>First Name</td>
                                <td><input type="text" name="firstname" value="<?php echo $first_name; ?>"></td>
                            </tr>

                            <tr>
                                <td>Last Name </td>
                                <td><input type="text" name="lastname" value="<?php echo $last_name; ?>"></td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
                            </tr>

                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>
                                    <input <?php if ($status == "Block") { echo "checked";}?> style="height: 15px; width: 50%;border-radius: 10px; margin: 10px; padding-left: 10px;" type="radio" name="status" value="Block">Block 
                                    <input <?php if ($status == "Unblock") { echo "checked";}?> style="height: 15px; width: 50%; border-radius: 10px; margin: 10px; padding-left: 10px;" type="radio" name="status" value="Unblock">Unlock 
                                </td>
                            </tr>

                        </table>

                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-update">

                    </form>
                </div>
            </div>
            
        </div>
    </div>
</body>

</html>
