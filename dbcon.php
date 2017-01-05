<?php 
	if(!defined('dbcon.php')) {
   die('Direct access not permitted');
}
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'bhav';
	$conn = new mysqli($host, $user, $password, $database);
	if($conn->connect_error) {
		die("Error connecting to database".$conn->connect_error);
	}
?>