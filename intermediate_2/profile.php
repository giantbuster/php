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
		if(isset($_SESSION['rSuccess'])) {
			echo '<h1 class="success">'.$_SESSION['rSuccess'].'</h1>';
		} else if (isset($_SESSION['user_id'])) {
			echo "<h1>You're logged in</h1>";
		} else {
			echo "<h1>You are not logged in<h1>";
			exit;
		}
	?>
	<div class="info">
		<?php
			$query = "SELECT CONCAT_WS(' ', first_name, last_name) AS full_name
					  FROM users
					  WHERE id = ".$_SESSION['user_id'];
			$result = fetchRecord($connection, $query);
			echo '<h2>'.$result['full_name'].'</h2>';
		?>
	</div>
	<form action="process.php" method="post">
		<input type="hidden" name="action" value="logout">
		<input type="submit" value="Logout">
	</form>
</div>
</body>
</html>