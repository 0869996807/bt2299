<?php
	 require_once('form-login.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Login page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/md5.js"></script>
<style type="text/css">
		.container{
			margin-top: 20px;
			border: solid 1px;
			border-radius: 10px;
			width: 400px;
			height: 380px;
			background-color: white;

		}
		
		
	</style>
</head>
<body style="background-color: #f7d5f2">
<div class="container">
<div class="alert alert-danger" style="margin-top: 10px;">
<ul>
<li>Vui lòng đăng nhập</li>
</ul>
</div>
<center><h1 class="h2 page-head-line">Đăng nhập</h1></center>
<div id="loading"></div>
<form id="login" action="" method="post">
<div class="form-group">
<label class="font-weight-semibold">Email</label>
<div class="input-affix">
<input required="true" type="email" class="form-control" value="" id="email" placeholder="Email" name="email" value="<?php echo $email ;?>">
</div>
</div>
<div class="form-group">
<label class="font-weight-semibold" for="password">Mật khẩu</label>
<div class="input-affix m-b-10">
<input required="true" type="password" class="form-control" value="" id="password" placeholder="Mật khẩu" name="password">
</div>
</div>
<div id="result"></div>
<div class="form-group">
<div class="d-flex align-items-center justify-content-between">
<button class="btn btn-info" type="submit" id="submit">Đăng nhập</button>
<a href="signup.php"> <button class="btn btn-primary" type="button" id="submit1">Đăng ký</button> </a>
</div>
</div>
</form>
</div>

</body>
</html>