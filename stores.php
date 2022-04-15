<?php
session_start();


			?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ThozeHut Stores</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/stores.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    </head>




    <body>
        <!--session 0 strts here-->
		<div class="container">
		<?php
include_once 'includes/navbar.php';
?>
                
                
           
            <!--session 0 ends here-->
        
        	<div class="bg" >                 
               
				<div class="tx" >
						<br>
						<h1>We Are Close to You</h1>
						<h2>Main Shop :<h2><h3> Colombo 03</h3><br>
						<h2>Branchers :</h2>
						
						

						<p> Badulla Road<br><br>Pambahinna<br><br>
								Negombo Road<br><br>Veyangoda<br><br>
								Negombo Road<br><br>Kurunegala<br><br>
								Kandy Road<br><br>Kegalle<br><br>
								Thangalla Road<br><br>Beliaththa<br><br>
								Kalmune Road<br><br>Batticaloa<br><br>
								Diulapitiya Road<br><br>Naiwala<br><br>
						
						</p>
				</div>
                <div class="tx1 ">
            
					 <img class="img1"  src="./images/map.png" alt="">
					 
				</div>
			</div>
		</div>

		<?php
include_once 'includes/footer.php';
?>

    	
        
    </body>
</html>
