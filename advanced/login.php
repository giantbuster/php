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
	<div class="header">
		<h2>Coding Dojo Wall</h2>
	</div>
	<div class="content">
		<div class="login modal">
			<h1>Login</h1>
			<?php
				if(isset($_SESSION['error']['login'])){
					echo '<p class="error">'.$_SESSION['error']['login'].'</p>';
				} 
			?>
			<form action="process.php" method="post">
				<input type="hidden" name="action" value="login">
				<div class="row">
					<div class="col">
						<input type="text" name="email" placeholder="abc@123.com">
					</div>
				</div>

				<div class="row">
					<div class="col">
						<input type="password" name="password" placeholder="Password">
					</div>
				</div>
				<div class="submit">
					<input type="submit" value="Login">
				</div>
			</form>
			<div class="modal-footer">
				<p>Not registered? Create an account <a href="index.php">here</a>.</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<?php
	$_SESSION = array();
?>