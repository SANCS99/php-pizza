<?php 

session_start();

if (!isset($_SESSION['user'])) {
	$_SESSION['no-login'] = "<div class='log-error'>Please log to access admin panel...<div>";

	header("Location:../admin/index.php");
}