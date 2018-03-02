<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	$tbl = "tbl_users";
	$users = getAllUsers($tbl);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Delete User</title>
<link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<h2>Who Would You Like To Destroy</h2>
	<?php
		while($row = mysqli_fetch_array($users)){
			echo "{$row['user_fname']} <a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\">Fired</a><br>";
		}
	?>
</body>
</html>
