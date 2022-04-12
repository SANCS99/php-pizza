<?php
session_start();

			?>



	<?php 


	require "php/connect.php";

	if (isset($_POST['cart'])) {
		$user_name = $_SESSION['username'];
		$item_id = $_POST['item_id'];

		if(isset($_SESSION['username'])){


		if (mysqli_query($conn,"INSERT INTO cart (user_name,item_id) VALUES ('$user_name','$item_id')",)) {
			header("Location:menu.php");
			exit;
			echo " data added ";
		}
	}else{
			
		header("Location:login.php");
		exit();
	}
	
	}
	?>


<?php
if (isset($_POST['search'])) {
?>

	<!DOCTYPE html>
	<html>
		<head>
	
			<link rel="stylesheet" href="css/results.css">
			<link rel="stylesheet" href="css/style.css">
			<link rel="stylesheet" href="css/menu.css">

	
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<title>ThozeHut Menu</title>
		</head>
		<body>
			
			<!--session 0 strts here-->
			<div class="container">
				<?php
				include_once 'includes/navbar.php';
				$search=$_POST['search']
				?>
				
				
			</div>
			<!--session 0 ends here-->
	
			<!--session1 starts here-->
			<div class="container">
				<div class="menus">
					<p class="menuitem">Results for "<?php echo $search ?>"</p>
				</div>
			</div>
	
	
			<!--session 2 starts here-->
		<div class="container show" id="tabcontent-1">
			<div class="mboard">
				<div class="row">
				
					<?php 
	
					require "php/connect.php";
	
	            	$sql1 = "SELECT * FROM items WHERE item_name LIKE '%$search%'";/*WHERE item_name='%$search%'*/
	            	$result1 = mysqli_query($conn, $sql1);
	            
	            	if (mysqli_num_rows($result1) > 0) {
	            		$x = mysqli_num_rows($result1);

	              	// output data of each row
	              	while($row1 = mysqli_fetch_assoc($result1)) {
	              		$i++;
	            	?>
	            
	            
					<div class="column">	
						<form action="" method="post" class="card" id="add_to_cart">
  							<img src="images/food/<?php echo $row1["image_src"]; ?>" alt="food" style="width:100%; background-color: transparent;">
  							<div class="detail">
  								<div class="name">
  							 		<h1 style="margin-bottom:0px; margin-top: 15px; "><?php echo $row1["item_name"]; ?></h1>	
  								</div>
  								<div class="price" >
  									<p style="margin-bottom:0px; padding: 0 20%px;float: right;" ><?php echo $row1["price"] ?></p>
  								</div>
  							</div>
	
							<input type="hidden" name="item_id" value="<?php echo $row1["item_id"]; ?>" />


  							<p><button value="Submit" name="cart" value="add" type="submit"><img style="background-color: transparent; padding-right: 5%; width: 15px;" src="images/assets/cart.png">Add to Cart</button></p>
       						 	 
    						
						</form>
					</div>	              
	            <?php
	                  if ($i%3 == 0) {
	                    echo '</div>';
	                    echo '<div class="row">';
	                  }
	            
	              }
	            } else {
				  
				  ?>
				  <div class="container">
						
							<p style="color:red;"> No Results found for "<?php echo $search ?>"</p>
						
				</div>
				<?php
	            }
	            
	            
	            ?> 

     		</div>		 
     	</div>
     </div>

		</div>
		<?php
		include_once 'includes/footer.php';
		?>
		
	
		</body>
	</html>
	<?php
		}

	else{
			
		header("Location:menu.php");
		exit();
	}
	
	
	?>

