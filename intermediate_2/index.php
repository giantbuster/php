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
	<div class="register">
		<h1>Register</h1>
		<?php
			if(isset($_SESSION['error']['register'])){
				foreach($_SESSION['error']['register'] as $key => $value){
					echo '<p class="error">'.$value.'</p>';
				}
			} 
		?>
		<form action="process.php" method="post">
			<input type="hidden" name="action" value="register">
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
					<input type="text" name="email" placeholder="your_email@example.com">
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

			<input type="submit" value="Register">
		</form>
	</div>
	<div class="login">
		<h3>Login</h3>
		<?php
			if(isset($_SESSION['error']['login'])){
				echo '<p class="error">'.$_SESSION['error']['login'].'</p>';
			} 
		?>
		<form action="process.php" method="post">
			<input type="hidden" name="action" value="login">
			<div class="row">
				<div class="col field-label">
					<label>Email</label>
				</div>
				<div class="col">
					<input type="text" name="email" placeholder="abc@123.com">
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
			<input type="submit" value="Login">
		</form>
	</div>
</div>
</body>
</html>

<?php
	$_SESSION = array();
?>