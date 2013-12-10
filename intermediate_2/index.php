<?php 
	 
	// Jefferson Lam
	// 12-10-13 
	// PHP with MySQL : Intermediate 2 : Login and Registration

	session_start();
	require('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PHP with MySQL : Intermediate 2 : Login and Registration</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="global.css">
</head>
<body>
<div class="container">
	<h1>Login and Registration</h1>
	<form action="process.php" method="post">
		<div class="row">
			<div class="col field-label">
				<label>First name</label>
			</div>
			<div class="col">
				<input type="text" name="first_name" placeholder="Michael">
			</div>
		</div>

		<div class="row">
			<div class="col field-label">
				<label>Last name</label>
			</div>
			<div class="col">
				<input type="text" name="last_name" placeholder="Choi">
			</div>
		</div>

		<div class="row">
			<div class="col field-label">
				<label>Email</label>
			</div>
			<div class="col">
				<input type="text" name="last_name" placeholder="your_email@example.com">
			</div>
		</div>



		<div class="row">
			<div class="col field-label">
				<label>Password</label>
			</div>
			<div class="col">
				<input type="password" name="password" placeholder="Password">
			</div>
		</div>

		<div class="row">
			<div class="col field-label">
				<label>Confirm password</label>
			</div>
			<div class="col">
				<input type="password" name="confirm" placeholder="Confirm password">
			</div>
		</div>
	</form>
</div>
</body>
</html>

<?php
	$_SESSION = array();
?>