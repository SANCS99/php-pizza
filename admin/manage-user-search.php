<?php
include_once '../includes/check.inc.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document-Search</title>
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
            <h1>Manage User</h1>
            <br>
            <br>

            <!-- search part start -->
            <div style="text-align:right; padding-right:250px">
                <form action="manage-user-search.php" method="post" id="searchform">
                    <div class="divsearch_input">
                        <input type="text" name="search_text" placeholder="Search here.. &nbsp; &#8981;"
                        style="width:200px; height:20px; border-radius: 8px; background-color: rgb(227, 231, 238);">
                    
                        <button type="submit" name="button_search" class="search_button" form="searchform" value="Search"
                        style="width:80px; height:20px; border-radius: 8px; background-color: rgb(201, 216, 241);">
                        Search</button>
                    </div>
                </form>
            </div>
            <!-- search part end -->

            </div>
            <?php
                
            ?>
            <br><br>
        
            <table style="width:calc(100% - 205px);">
                <tr>
                    <th>Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th></th>
                </tr>

                <?php
                    include_once '../includes/dbh.inc.php';
                
                    if(isset($_POST['button_search'])){

                        $search_text = $_POST['search_text'];

                        $searchsql = "SELECT * FROM users 
                        WHERE first_name = '$search_text' or 
                        last_name = '$search_text' or 
                        email='$search_text' or 
                        username='$search_text' or 
                        password='$search_text' or 
                        status='$search_text';";

                    $searchresult = mysqli_query($conn, $searchsql);
                    $checkCheckResult = mysqli_num_rows($searchresult);

                    $searchdata = array();

                        if ($checkCheckResult > 0){
                         while($seachrow = mysqli_fetch_assoc($searchresult)){
                                $searchdata[] = $seachrow;
                            }
                        }
                        $count = "0";
                        $loop_data =0;
                        $count_Result = mysqli_query($conn, $searchsql);
                        $count_rows = mysqli_num_rows($count_Result);

                        while($loop_data = mysqli_fetch_assoc($count_Result)){
                            
                            $id = $searchdata[$count]['user_id'];
                            $first_name = $searchdata[$count]['first_name'];
                            $last_name = $searchdata[$count]['last_name'];
                            $email = $searchdata[$count]['email'];
                            $username = $searchdata[$count]['username'];
                            $pw = $searchdata[$count]['password'];
                            $status = $searchdata[$count]['status'];

                            $num = 1;
                            echo '<tr>
                                    <td>'.$num++.'</td>
                                    <td>'.$first_name.'</td>
                                    <td>'.$last_name.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$username.'</td>
                                    <td>'.$status.'</td>
                                    <td>
                                        <a href="update-user.php?id='.$id.'" class="btn-update">Update</a>
                                        <a href="delete-user.php?id='.$id.'" class="btn-delete">Delete</a>
                                    </td>
                                 </tr>';

                        }


                    }
                

                ?>
            </table>
        </div>
    </div>
</body>

</html>
