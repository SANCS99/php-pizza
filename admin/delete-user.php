<?php include_once '../includes/check.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
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
                    <h1>Delete User</h1>
                    <br><br>
                    <b>*Please confirm the user details before deleting*</b>
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
                            header("Location:manage-user.php?delete=failed");
                        }
                    }

                    ?>
                    
                    
                    <br><br><br><br>
                    <div style="text-align:left;">
                        <table>
                            <tr>
                                <td><lable><b>First Name</b></lable></td>
                                <td>:</td>
                                <td><?php echo $first_name; ?></td>
                            </tr>
                            <tr>
                                <td><lable><b>Last Name</b></lable></td>
                                <td>:</td>
                                <td><?php echo $last_name; ?></td>
                            </tr>
                            <tr>
                                <td><lable><b>Email</b></lable></td>
                                <td>:</td>
                                <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <td><lable><b>Username</b></lable></td>
                                <td>:</td>
                                <td><?php echo $username; ?></td>
                            </tr>
                            <tr>
                                <td><lable><b>Status</b></lable></td>
                                <td>:</td>
                                <td><?php echo $status; ?></td>
                            </tr>
                        </table>
                    </div>
                    
                    <form action="../includes/deleteUser.inc.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Delete Admin" class="btn-update">
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</body>

</html>
