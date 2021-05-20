<?php
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
 	if(checkLogin() != null){
 		header('location: note.php');
 	}


	$fullname = $email = $password = $birthday = $address = '';
	if(!empty($_POST)){
		$fullname = getPost('fullname');
		$email = getPost('email');
		$birthday = getPost('birthday');
		$address = getPost('address');
		$password = getPost('password');
		$password = getMd5Security($password);
	}

	if(!empty($email)){
		$sql = "select * from users where email = '$email'";
		$result = executeResult($sql);
		if($result != null && sizeof($result)>0){
			$message = "email đã tồn tại";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}else {
			$sql = "insert into users (fullname,email,password,birthday,address ) values ('$fullname', '$email', '$password', '$birthday', '$address') ";
			execute($sql);
			header('location: login.php');
		}
	}