
<head>
		<!-- Link to CSS file -->
		<link rel="stylesheet" href="css/style.css">

		<!--This link needed only for nav bar in home page when inserting nav bar to another file link must include-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


		<meta name="viewport" content="width=device-width, initial-scale=1.0">


	</head>
<!--navigation bar seccion start here-->
<div class="navigation-bar" id="myTopnav">
				<a href="index.php">
					<img class="logo" src="images/logo2.png">
				</a>
				<div class="search-container">
					<form style="background-color: #8998af;"method='post' action="results.php">
					  <input type="text" placeholder="Search.." name="search" required>
					  <button type="submit"><i style="background-color: #8998af;" class="fa fa-search"></i></button>
					</form>
				</div>

				<a class="tg" href="index.php">Home</a>
				<a class="tg" href="menu.php">Menu</a>
				<a class="tg" href="stores.php">Stores</a>
				<a class="tg" href="aboutus.php">About Us</a>
				<a href="javascript:void(0);" class="icon" onclick="myFunction()">
					<i class="fa fa-bars dd"></i>
				</a>

				
				
				<?php
				if (isset($_SESSION['username'])) {
					echo "<a class='tg_2' style='float: right;'' href='includes/logout.inc.php'>Log Out</a>";
					echo "<a href='cart.php' style='float: right;'> <img class='cart-logo' src='images/assets/cart.png'> </a>";
					echo "<a class='tg_2' style='float: right;'' href='cus_pro.php'>My Account</a>";
				}
				else{
					echo '<a class="tg_2" style="float: right;" href="login.php">login</a>';
				}
				?>
				
				
				

			</div>
            <!--navigation bar seccion end here-->
            <script>
			/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
			function myFunction() {
			  var x = document.getElementById("myTopnav");
			  if (x.className === "navigation-bar") {
				x.className += " responsive";
			  } else {
				x.className = "navigation-bar";
			  }
			} 
			
			</script>
            
