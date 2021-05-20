<?php
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
		$check=checkLogin();
 	 	if($check == null){
 		header('location: login.php');
 	}
 	if(!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'delete':
			delete();
			break;
		default:
			$id = getPost('id');
			if($id> 0) {
				update();
			} else {
				add();
			}	
			break;
	}
}

	function delete() {
	$id=getPost('id');
	$sql = "delete from note where id = $id";
	execute($sql);
	}

	function add(){
		echo "ee";
	$title = $content ='';

	$title = getPost('title');
	$content = getPost('content');
	global $check;
	$id_user = $check['id'];
	$created_at = $updated_at = date('Y-m-d H:i:s');
	$sql = "insert into note (title,content, id_user, created_at, updated_at) values ('$title', '$content', $id_user, '$created_at', '$updated_at')";
	execute($sql);
	header('location: note.php');
	die();
	}

	function update() {
	$title = $content = '';
	global $check;
	$id_user = $check['id'];
	$title = getPost('title');
	$content = getPost('content');
	$id = getGet('id');

	$updated_at = date('Y-m-d H:i:s');

	$sql = "update note set title = '$title', content = '$content', updated_at = '$updated_at' where id = $id";
	execute($sql);
	header('location: note.php');
	die();
}