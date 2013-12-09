<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Advanced PHP : Basic Assignment 2 : Email Validation</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<style type="text/css">
		.container{
			width: 440px;
			padding: 20px;
			margin: 0 auto;
			margin-top: 300px;
			font-family: helvetica;
			font-size: 20pt;
			background: #50B14D;
		}
		.field{
			width: 250px;
		}
		p{
			margin: 0px;
			padding: 10px;
		}
	</style>
</head>

<body>
<div class="container">
	<?php 
		echo '<p>The email address you entered ('.$_SESSION['email'].') is a valid email address! Thank you!</p>';
	?>
</div>
</body>
</html>

<?php
	$_SESSION = array();
?>