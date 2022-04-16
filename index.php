
<?php
session_start();


			?>

<!DOCTYPE html>
<html>
	<head>
		<title>ThozeHut</title>
		<!-- Link to CSS file -->
		<link rel="stylesheet" href="css/style.css">

		<!--This link needed only for nav bar in home page when inserting nav bar to another file link must include-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


		<meta name="viewport" content="width=device-width, initial-scale=1.0">


	</head>
	<body>

		<!--session 0 strts here-->
		<div class="container">
			



<?php
include_once 'includes/navbar.php';
?>




			
			
		</div>
		<!--session 0 ends here-->


		<!-- Session 1 starts here -->
		<div class="container session1">
			
			<div class = "session1_2">
				<a href="">
					<img src="images/rider.png" alt="Delivery bicycle image">
				</a>
			</div>
		</div>
		

		<!-- Session 1 ends here -->

		<!-- Session 2 starts here-->
		<div class="container session2">
			<div class = "session2_1">
				<p style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; margin-left: 20px;">Find Healthy And Favourite Foods Near You </p>
			</div>
			<div class = "session2_2">
				<a href="#"><img src="images/assets/Group 1191.png" alt="GooglePlay"></a>
				<a href="#"><img src="images/assets/Group 1192.png" alt="Appstore"></a>
			</div>
		</div>

		<!-- Session 2 endss here-->

		<!-- Session 3 starts here-->
		<div class="container session3">
			<div class="session3_0">
				<img src="images/assets/Group 4.jpg" style="width: 100%; height: 100%;">
			
			</div>
			<div class="session3_0">
				<img src="images/assets/Group 1.png" style="width: 100%; height: 102%;">
			</div>
			<div class="session3_0">
				<img src="images/assets/Group 3.jpg" style="width: 108%; height: 100%;">
			</div>


		</div>
		<!-- Session 3 ends here-->



		<?php
include_once 'includes/footer.php';
?>


	</body>
</html>


