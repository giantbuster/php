<?php 
	session_start();
?>

<!DOCTYPE html>
<html>

<!-- 
	Jefferson Lam
	12-5-13 
	Advanced PHP : Basic Assignment 3 : Email Validation
-->

<head>
	<meta charset="UTF-8">
	<title>Advanced PHP : Basic Assignment 3 : Email Validation</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<style type="text/css">
		.container{
			width: 440px;
			margin: 0 auto;
			margin-top: 300px;
			font-family: helvetica;
			text-align: center;
			font-size: 20pt;
		}
		.field{
			width: 250px;
		}
		p{
			background: #F0525E;
			padding: 10px;
		}
	</style>
</head>

<body>
<div class="container">
	<form action="process.php" method="post">
		<?php 
			if(isset($_SESSION['error'])){
				echo '<p>The email address you entered ('.$_SESSION['email'].') is NOT a valid email address!</p>';
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