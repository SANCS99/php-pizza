 <?php


$dbServername = "localhost";
$dbUsername = "user1";
$dbPassword = "user1";
$dbName = "pizza";


// Create connection
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); 


// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



?> 

