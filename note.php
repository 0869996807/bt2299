<?php
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
		$item = checklogin();	
 	 	if($item == null){
 		header('location: login.php');
 	}

 		
	$id= $item['id'];

 	$sql = " select * from note where id_user = $id";
 	$note = executeResult($sql);
 	 ?>	

 <!DOCTYPE html>
<html>
<head>
<title>note</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/md5.js"></script>
<body>
	<center>Xin chao <label style="color: red;"><?php echo $item['fullname']; ?></label> (<a href="signout.php">dang xuat</a>)</center>
</body>
 	 
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>title</th>
			<th>content</th>
			<th>updated at</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$count=0;
			foreach ($note as $item) {
	        echo '<tr>
					<td>'.(++$count).'</td>
					<td>'.$item['title'].'</td>
					<td>'.$item['content'].'</td>
					<td>'.$item['updated_at'].'</td>
					<td><a href="add-note.php?id='.$item['id'].'"><button class="btn btn-warning">Edit</button></a></td>
					<td><button class="btn btn-danger" onclick="deletenote('.$item['id'].')">Delete</button></td>
				 </tr>';
	}
		 ?>
</table>
<a href="add-note.php"><button class="btn btn-info">Add note</button></a>
<script type="text/javascript">
	function deletenote(id) {
		option = confirm('Are you sure to delete this product?')
		if(!option) return

		$.post('form-note.php', {
			'action': 'delete',
			'id': id
		}, function(date) {
			location.reload()
		})
	}
</script>