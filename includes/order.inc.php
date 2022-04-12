<?php 

include_once 'dbh.inc.php';

if (isset($_POST['order'])) {
	$total = $_POST['total'];
    $contact = $_POST['contact'];
    $location = $_POST['location'];
    $username = $_POST['username'];

        $sql = "INSERT INTO orders VALUES (0,'$total','$location','$username', '$contact')";

        $sql2 = "DELETE FROM cart WHERE user_name = '$username'";
    
        $result1 = mysqli_query($conn, $sql);
    
        if ($result1 == TRUE) {
            

            $result2 = mysqli_query($conn, $sql2);
            if ($result2 == TRUE) {
                header("Location:../index.php");
                exit();
            }

            exit();
        }
        else{
            header("Location:../cart.php");
            exit();
        
    }
}
    

?>
