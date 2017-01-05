<?php
	if(!defined('config.php')) {
	die('Direct access not permitted'); 
	}
	$host = '{host}'; //the host server of the database, usually its 'localhost'.
	$user = '{user}'; //the username of the mysql user.
	$password = '{password}'; //the password of the mysql user.
	$database = '{database}'; //the database name.
	$conn = new mysqli($host, $user, $password, $database);
		if($conn->connect_error) {
			die("Error connecting to database".$conn->connect_error);
		}
?>