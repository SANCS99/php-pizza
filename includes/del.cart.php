<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizza";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$username = $_SESSION['username'];
$sql = "DELETE FROM cart WHERE user_name='".$username."'";

if ($conn->query($sql) === TRUE) {

  
  header("Location:../index.php?aa=$user");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>