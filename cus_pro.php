<?php
session_start();
        if (isset($_SESSION['username'])) {
			$username = $_SESSION['username'];
            /*echo "$username";
                    
            }else{
				echo "nooo:";*/
			}
			?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/cus_pro.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
	<title>Customer Profile</title>
</head>
<body>


<div class="container">
<?php
include_once 'includes/navbar.php';
?>
	

	<h1 align="center"><font color="yellow"> My Account</font></h1>

<div>
	<form method="POST">
		<table align="center" id="table1">
			<tr>
				<td>
				<h2 align="center"><font color="black"> <?php echo $username ?></font></h2>
					
				</td>
			</tr>

		</table>
	</form>
</div>
	
	<h1 align="center"><font color="yellow"> My Purchase History</font></h1>
<div>


<div>
						
<?php 
				require "php/connect.php";
	
					
	
	            	$sql1 = "SELECT * FROM orders WHERE user_name= '$username' ";
					$result1 = mysqli_query($conn, $sql1);
					?>

							<table class="center table_1">
					<?php
					
					if (mysqli_num_rows($result1) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result1)) {
							
							$total_price = $row["total_price"];
							$location = $row["req_location"];
							
							?>
		<table style="margin:auto; padding: 15px; ">
			<tr>
				<td>
					<font size="5px" color="white" style="font-family: 'Roboto Mono', monospace"> <strong>Bill Amount:</strong></font>
						</td>
						<td>
					<font size="5px" color="black" style="font-family: 'Roboto Mono', monospace"> <strong><?php echo $total_price; ?></strong></font>

				</td>
					
				<td>
					<font size="5px" color="white" style="font-family: 'Roboto Mono', monospace"> <strong>Location:</strong></font>
					</td>
						<td>
					<font size="5px" color="black" style="font-family: 'Roboto Mono', monospace"> <strong><?php echo $location; ?></strong></font>
					
				</td>
			</tr>
			
		</table><?php

						}
					
					}else{
						echo "no user in cart";
					}
							?>
	            
					
					




	

	
</dev>



<br>
                <a href="http://localhost/php-pizza/cus_pro.php" download="Order details">Download</a>
                <br>


</div>
<?php
include_once 'includes/footer.php';
?>

</body>
</html>