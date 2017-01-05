<?php session_start();

	if (!isset($_SESSION['name'])) {
		header('location: login.php');
	}
	else{
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Chatbook</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form method="post" align="center">
		<table width="400" border="0" align="center" cellpadding="0" cellspacing="1">
			<tr><img src="cb.png"></tr>
			<tr>
			<td><textarea name="comment" cols="100" rows="3" id="comment" placeholder="<?php echo $_SESSION['name']; ?> type your message to start chat" id="comment"></textarea></td>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Submit" class="sbmt-btn" id="submit" /></td>
			</tr>
		</table>
	</form>
		<br /><br />
</body>
</html>	
	<a href="login.php?logout=true">Logout</a>	
<?php
	define('dbcon.php', TRUE);
	require_once 'dbcon.php';
	@$name = $_POST['name'];
	@$email = $_POST['email'];
	@$comment = $_POST['comment'];
	if (!isset($_POST['submit'])) {
		
	}
	else if(isset($_POST['submit'])) {
		if(empty($comment)) {
		echo "<table width=\"400\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"1\">
		<tr><td>you must enter something to send</td></tr></table>"; }
	else {
		$username = $_SESSION['name'];
	$date_time = date("y/m/d h:i:s a");
	$query = "INSERT INTO guestbook (name,comment,date_time)
			  VALUES ('$username', '$comment', '$date_time') ";
	$conn->query($query);
	header("location: index.php"); 
}
	}
	$query = "SELECT * FROM guestbook ORDER BY ID DESC";
	$result = $conn->query($query);
	while ($rows = $result->fetch_array()) {
		if ($rows == 0) {
			echo "No Data Found";
		}
		else {
	?>	<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" class="posts" bgcolor="#D7EDFC">
	<tr>
		<td><table width="1400" border="0" cellpadding="0" cellspacing="1" class="posts" bgcolor="#fff"></td>
		<tr>
		<td class="avatar" ><img src="avatar.png" height="100px" width="100px"><span class="user-name"><?php echo $rows['name']; ?></span></td>
		<td class="view-comment"><?php echo $rows['comment']; ?></td>
		</tr>
		</table></td>
		</tr>
		</table>
	<?php
		}
	}
	$conn->close();
}
?>
<br />
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1">
	<tr>
		<td>
			<a href="http://www.bhavshashank.com" target="_blank">GuestBook By BhavShashank</a>
			<p>Connect with me on <a href="https://www.facebook.com/bhavshashank" target="_blank">Facebook</a> <a href="https://www.twitter.com/bhavshashank" target="_blank">Twitter</a> <a href="https://www.github.com/bhavshashank" target="_blank">Github</a>
		</td>
	</tr>
</table>