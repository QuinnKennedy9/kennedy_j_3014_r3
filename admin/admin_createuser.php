<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$lvllist = $_POST['lvllist'];
		if(empty($lvllist)){
			$message = "Please select a user level";
		}else{
			$result = createUser($fname, $username, $email, $lvllist);
		}

	}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create User</title>
<link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<h2 id="createheader">Create A New User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_createuser.php" method = "post">
		<label>First Name:</label>
		<input type="text" name= "fname" value = "" class="changepassword">
		<label>Username:</label>
		<input type="text" name= "username" value = "" class="changepassword">
		<label>Email:</label>
		<input type="text" name= "email" value = "" class="changepassword">
		<select name="lvllist">
			<option value="">Select User Level</option>
			<option value="2">Web Admin</option>
			<option value="1">Web Master</option>
		</select>
		<input type="submit" name= "submit" value="Create User" class="changepassword">
	</form>

</body>
</html>
