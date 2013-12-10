<?php 
	// Jefferson Lam
	// 12-9-13 
	// PHP with MySQL : Basic : Email Database

	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PHP with MySQL : Basic Assignment 2 : Email Database</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="global.css">
</head>

<body>
<div class="container">
	<form action="process.php" method="post">
		<?php 
			if(isset($_SESSION['error'])){
				echo '<p class="error">The email address you entered ('.$_SESSION['email'].') is NOT a valid email address!</p>';
			}
		?>
		<input type="hidden" name="action" value="emailForm">
		<label>Please enter your email address:</label>
		<br>
		<input class="field" type="text" name="email">
		<br>
		<input type="submit" value="Submit">
	</form>
</div>
</body>
</html>

<?php
	$_SESSION = array();
	// unset($_SESSION);
?>