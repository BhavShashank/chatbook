<?php 
	session_start();
	if (isset($_SESSION['name'])) {
		header('location: index.php');
	}
	else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form method="post" align="center">
		<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" class="register-form">
			<tr><img src="cb.png"></tr>
			<tr>
				<h3>Already a Member, Try <a href="login.php">Logging in</a></h3>
			</tr>
			<tr>
				<th>User Name: </th>
				<td><input type="text" name="name" /></td>
			</tr>
			<tr>
				<th>Password: </th>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<th>Email Address: </th>
				<td><input type="email" name="email" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Register" />
				<input type="reset" name="reset" value="Reset" class="resetbtn" /></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php 
	define('dbcon.php', TRUE);
	require_once 'dbcon.php';
	@$name = $_POST['name'];
	@$password = $_POST['password'];
	@$email = $_POST['email'];
	if(isset($_POST['submit'])){
    	if(empty($_POST['name']) || empty($_POST['password']) || empty($_POST['email'])) {
        echo "<table width=\"400\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"1\">
		<tr><td>All fields are required, please fill all details.</td></tr></table>";
    	}
    else {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $result = mysqli_query($conn, 'SELECT * FROM register WHERE name="'.$name.'" OR email="'.$email.'"');
        if (strlen($_POST['name'])<3 || strlen($_POST['name']) >10  ) {
        	echo 'Username must be between 3 to 10 characters long';
        }
        elseif (mysqli_num_rows($result)) {
        	echo 'username or email already exist';
        }
        else {
	        $query = mysqli_query($conn, "INSERT INTO register(name, password, email) VALUES ('$name', '$password', '$email')");
	        $conn->close();
	        header('location: login.php');
    	}
    }
}
}
?>