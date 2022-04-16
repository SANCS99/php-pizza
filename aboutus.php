<?php
session_start();
			?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Link to CSS file -->
		

		<!--This link needed only for nav bar in home page when inserting nav bar to another file link must include-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		
		<link rel="stylesheet" type="text/css" href="css/about-us.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
		<title>ThozeHut About Us</title>
		
	</head>
	<body>
		<div class="container">
		<?php
include_once 'includes/navbar.php';
?>
	</div>
	<div class="container">
		<div class="abt_session_0" >
			<img class="img0" src="images/session 1.jpg">
			<div >
				<div class="session" >
					<div >
						<h3>
							<strong > About Pizza Stone</strong>
						</h3>
					</div>

					<div><h3>
						<span><Strong> WHO WE ARE</Strong><br></span>
						<span>Pizza Stone Enterprise Ltd</span>
						</h3>
					</div>

					<div>
						<h3 id="heading2"><strong>WHAT WE ARE</strong></h3>
					</div>
				
					<div><h4>We are the Pambahinna-owned master franchise holder for
							Hut" in Pambahinna, Veyangoda, Colombo, Kurunrgala,Keagalla
							Beliaththa, Batticaloa, Naiwala and Badulla.</h4>

					</div>



					<div>
						<h3 id="heading3"><strong>WHAT'S OUR GOAL</strong></h3>
					</div>
				
					<div><h4>We're driven by a passion to connect people with faster, fresher qualityfood. In doing this, we've become a leader in the food-technology space, achieving industry firsts in drone delivery, app ordering, voice assistants,artificial intelligence and augmented reality. We are committed to consantly enhancing our customer's lives and continually improving and innovation our  product, our people and our technology to make sure our customers  receive a world class experience. We're "Pizza Stone" and we are hungry to be better..!</h4>
					</div>
			

				</div>
			</div>

		</div>
	</div>
	<?php
include_once 'includes/footer.php';
?>



	</body>
</html>