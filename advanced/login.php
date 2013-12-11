<?php
	session_start();
	require('connection.php');


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PHP with MySQL : Advanced : Wall</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="global.css">
</head>
<body>
<div class="container">
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