<?php

if(isset($_POST['login-submit'])) {
	
	require 'dbh.inc.php';
	
	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];
	
	$sql = "SELECT * FROM users WHERE uidUsers=? Or emailUsers=?;";
	$stmt = mysqli_stmt_init($conn);
			
	mysqli_stmt_bind_param($stmt, "ss", $mailuid, $password);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($result)){
				
		$pwdCheck = password_verify($password, $row['pwdUsers']);
		if($pwdCheck == false){
			header("location: ../index.php?wrongPassword");
			exit();
		}
		else if($pwdCheck == true){
			session_start();
			$_SESSION['userId'] = $row['idUsers'];
			$_SESSION['userUid'] = $row['uidUsers'];
				
					header("location: ../index.php?login=success");
					exit();
					
		}
				
	}
	else{
		header("location: ../index.php?errorNoUser");
		exit();
	}
	
}
else{
	header("location: ../index.php");
	exit();
}