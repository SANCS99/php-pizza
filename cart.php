<?php
session_start();
        if (isset($_SESSION['username'])) {
			$username = $_SESSION['username'];
            /*echo "$username";
                    
            }else{
				echo "nooo:";*/
			}
			$total=0;
			?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/cart.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>View Cart</title>

</head>
<body>




	
<!--session 0 strts here-->
<div class="container">
<?php
include_once 'includes/navbar.php';
?>
	
</div>
<!--session 0 ends here-->








	
	
	<div class="maindiv">
		
		<h1 class="title1">
			My Cart 
		</h1>

		<div>
			
				<table class="center table_1">

			
				<?php 
				require "php/connect.php";
	
					
	
	            	$sql1 = "SELECT * FROM cart WHERE user_name= '$username' ";
					$result1 = mysqli_query($conn, $sql1);
					?>


					<div>
						
							<table class="center table_1">
								
					<?php
					
					if (mysqli_num_rows($result1) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result1)) {
							
							$item_id = $row["item_id"];

							$sql2 = "SELECT * FROM items WHERE item_id= $item_id";
							$result2 = mysqli_query($conn, $sql2);

							if (mysqli_num_rows($result1) > 0) {
								$total;

								// output data of each row
								while($row2 = mysqli_fetch_assoc($result2)) {

									$total = $total+$row2["price"];
									/*echo $total;*/
									?>

									

									<tr>
										<td>
										<img class="tbl_img"src="images/food/<?php echo $row2["image_src"]; ?>" alt="No image forund">
										</td>	
										<td>
											<p><b><?php echo $row2["item_name"];?></b></p>
										</td>
										<td>
											<p><b>Rs.<?php echo $row2["price"]; ?></b></p>
										</td>
										
										
									</tr>
									
									
									
									
									<?php
								}

								}else{
									echo "no connects to cart items";
								}
							
						}
						?>

<br>

				<div style="text-align:center;">
					<!--Calculation-->
					
					<br><br>
					<form action="includes/order.inc.php" method="post">


						<table class="center">
							<tr>
								<td><b>Total</b></td>
								<td><b><?php echo $total ?></b></td>
							</tr>
								
							<tr>
								<td>
									<b>
									Enter Your Location
									</b>
								</td>
								<td >
									<input name="location" style="height: 100px;" required>
										
									
									
								</td>
							</tr>
							<tr>
								<td>
									<b>
									Contact Number
									</b>
								</td>
								<td>
									<input name="contact" type="text" required>
									<input name="username" type="hidden" value="<?php echo $username ?>">
									<input name="total" type ="hidden" value="<?php echo $total?>">
									
								</td>
							</tr>


						
						<tr>
						<td>
						
							<input name="order" type="submit" value="Order Now" ></td>
							
							</tr>
					</form>
					<td><a href="includes\del.cart.php"?user=$username><button>Remove all</button></a></td>
					</table>
					

		
				</div>
						

						<?php
					
					}
					
					
					else{
						echo "<h1 style='text-align:center;'>No Items in Your cart</h1>";
					}
							?>
	            
					
					


				
				
				
		
		</div>
		<br>
		<br>
		
</div>
<?php
include_once 'includes/footer.php';
?>


</body>
</html>
