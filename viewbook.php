<table width="400" border="0" align="center" cellpadding="0" cellspacing="1">
	<tr>
		<td>
			<a href="index.php">Submit New Entry</a>
		</td>
	</tr>
</table>
<?php
	define('dbcon.php', TRUE);
	require_once 'dbcon.php';
	$query = "SELECT * FROM guestbook ORDER BY ID DESC";
	$result = $conn->query($query);
	while ($rows = $result->fetch_array()) {
		if ($rows == 0) {
			echo "No Data Found";
		}
		else {
	?>	
	<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
		<td><table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
		<tr>
		<td>ID</td>
		<td>:</td>
		<td><?php echo $rows['ID']; ?></td>
		</tr>
		<tr>
		<td width="117">Name</td>
		<td width="14">:</td>
		<td width="357"><?php echo $rows['name']; ?></td>
		</tr>
		<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $rows['email']; ?></td>
		</tr>
		<tr>
		<td valign="top">Comment</td>
		<td valign="top">:</td>
		<td><?php echo $rows['comment']; ?></td>
		</tr>
		<tr>
		<td valign="top">Comment</td>
		<td valign="top">:</td>
		<td><?php echo $rows['date_time']; ?></td>
		</tr>
		</table></td>
		</tr>
		
	<?php
		}
	}
	$conn->close();
?>
		</table>
		<br />
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1">
	<tr>
		<td>
			<a href="http://www.bhavshashank.com" target="_blank">GuestBook By BhavShashank</a>
			<p>Connect with me on <a href="https://www.facebook.com/bhavshashank" target="_blank">Facebook</a> <a href="https://www.twitter.com/bhavshashank" target="_blank">Twitter</a> <a href="https://www.github.com/bhavshashank" target="_blank">Github</a>
		</td>
	</tr>
</table>