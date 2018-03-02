<?php

	function createUser($fname, $username, $password, $email, $lvllist) {
		include('connect.php');
		$userstring = "INSERT INTO tbl_users VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', NULL, 'no', '{$lvllist}', 'nay' )";
		$userquery = mysqli_query($link, $userstring);
		if($userquery) {
			redirect_to('admin_index.php');
		}else{
			$message = "Your hiring practices have failed you.";
			return $message;
		}
		mysqli_close($link);
	}

	function editUser($id, $fname, $username, $password, $email) {
		include('connect.php');
		$newencryptedpass = password_hash($password, PASSWORD_DEFAULT);
		$updatestring = "UPDATE tbl_users SET user_fname='{$fname}', user_name='{$username}', user_pass='{$newencryptedpass}', user_email='{$email}', user_verify = 'yay' WHERE user_id={$id}";
		$updatequery = mysqli_query($link, $updatestring);

		if($updatequery) {
			redirect_to("admin_index.php");
		}else{
			$message = "Guess you got canned...";
			return $message;
		}

		mysqli_close($link);
	}

	function deleteUser($id) {
		include('connect.php');
		$delstring = "DELETE FROM tbl_users WHERE user_id = {$id}";
		$delquery = mysqli_query($link, $delstring);
		if($delquery) {
			redirect_to("../admin_index.php");
		}else{
			$message = "Bye, bye...";
			return $message;
		}
		mysqli_close($link);
	}

	function getUser($tbl, $col, $id){
		include('connect.php');
		$userFetchString = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
		$runUser = mysqli_query($link, $userFetchString);
		if($runUser){
			return $runUser;
		}else{
			$error = "There was a problem finding this user.";
			return $error;
		}
		mysqli_close($link);

	}

	function getAllUsers($tbl){
		include('connect.php');
		$allQuery = "SELECT * FROM {$tbl}";
		$runAll = mysqli_query($link, $allQuery);
		if($runAll){
			return $runAll;
		}else{
			$error = "There was a problem accessing this information.  Sorry about your luck ;)";
			return $error;
		}
		mysqli_close($link);
	}
?>
