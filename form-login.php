<?php
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
 	if(checkLogin() != null){
 		header('location: note.php');
 	}

	$email = $password ='';
	if(!empty($_POST)){
		$email = getPost('email');
		$password = getPost('password');
		$password = getMd5Security($password);
	}
	if(!empty($email) && !empty($password)) {
		$sql = "select * from users where email = '$email' and password = '$password'";
		$user = executeResult($sql);
		if($user != null && count($user)>0){
			$token = $user[0]['email'].time();
			$token = getMd5Security($token);
			$sql = "update users set token = '$token' where email = '" .$user[0]['email']."'";
			execute($sql);
			setcookie('status', 'login', time()+7*24*60*60, '/');
			setcookie('token', $token, time()+7*24*60*60, '/');
			header('location: note.php');
			die();

		}else {
			$message = "eamil/password không đúng!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}

	}