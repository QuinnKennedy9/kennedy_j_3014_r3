<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel</title>
<link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<?php echo '<h1> Hi '.$_SESSION['user_name'].', what would you like to do today?</h1> ';?>
	<a href="admin_createuser.php" class="indexlink">Create User</a>
  <a href="admin_edituser.php" class="indexlink">Edit User</a>
	<a href="admin_deleteuser.php" class="indexlink">Delete User</a>
	<a href="phpscripts/caller.php?caller_id=logout" class="indexlink">Sign Out</a>
</body>
</html>
