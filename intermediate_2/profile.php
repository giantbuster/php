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
	<?php
		if(isset($_SESSION['success'])) {
				echo '<h1 class="success">'.$_SESSION['success'].'</h1>';
		} else {
			echo "<h1>You're logged in</h1>";
		}
	?>
	<form action="process.php" method="post">
		<input type="hidden" name="action" value="logout">
		<input type="submit" value="Logout">
	</form>
</div>
</body>
</html>

<?php
	$_SESSION = array();
?>