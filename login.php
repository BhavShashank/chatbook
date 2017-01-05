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
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form method="post" align="center">
		<table width="400" border="0" align="center" cellpadding="0" cellspacing="1">
			<tr><img src="cb.png"></tr>
			<tr><h3>Login</h3></tr>
			<tr>
				<td>
					<label>Name</label>
				</td>
				<td>
					<input type="text" name="name">
				</td>
			</tr>
			<tr>
				<td>	
					<label>Password</label>
				</td>
				<td>
					<input type="password" name="password">
				</td>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit">
				</td>
			</tr>
			<tr>Not a member, <a href="register.php">Register</a> here</tr>
		</table>
	</form>
</body>
</html>
<?php 
	define('dbcon.php', TRUE);
	require_once 'dbcon.php';
	if (isset($_POST['submit'])) {
			if (empty($_POST['name']) || empty($_POST['password'])) {
				echo 'All fields are required';
			}
			else {
				$name = $_POST['name'];
				$password = $_POST['password'];
				$result = mysqli_query($conn, 'SELECT * FROM register WHERE name="'.$name.'" and password= "'.$password.'"');
				if (mysqli_num_rows($result)) {
					$_SESSION['name'] = $name;
					$conn->close();
					header('location: index.php');
				}
				else {
					echo 'username or password is incorrect';
				}
			}
		}
	}	
	if (isset($_GET['logout'])) {
			session_destroy();
		}
?>