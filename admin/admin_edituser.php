<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();

	$id = $_SESSION['user_id'];
	$tbl = "tbl_users";
	$col = "user_id";
	$popForm = getUser($tbl, $col, $id);
	$info = mysqli_fetch_array($popForm);

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$result = editUser($id, $fname, $username, $password, $email);
		$message = $result;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit User</title>
<link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<h2>Edit User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_edituser.php" method="post">
		<label>First Name:</label>
		<input type="text" name="fname" class="changepassword" value="<?php echo $info['user_fname'];  ?>"><br><br>
		<label>Username:</label>
		<input type="text" name="username" class="changepassword" value="<?php echo $info['user_name'];  ?>"><br><br>
		<label>Password:</label>
		<input type="text" name="password" class="changepassword" value="<?php echo $info['user_pass'];  ?>"><br><br>
		<label>Email:</label>
		<input type="text" name="email" class="changepassword" value="<?php echo $info['user_email'];  ?>"><br><br>
		<input type="submit" name="submit" value="Edit Account" class="changepassword">
	</form>
</body>
</html>
