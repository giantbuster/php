<?php 
	session_start();
?>

<!DOCTYPE html>
<html>

<!-- 
	Jefferson Lam
	12-5-13 
	Advanced PHP : Basic Assignment 2 : Fibonacci Series
-->

<head>
	<meta charset="UTF-8">
	<title>Advanced PHP : Basic Assignment 2 : Fibonacci Series</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<style type="text/css">
		.col{
			width: 150px;
			display: inline-block;
		}
		body{
			font-family: helvetica;
		}
		.results{
			border: 1px solid;
			width: 300px;
			height: 100px;
			padding: 20px;
		}
		.error{
			margin: 0px;
			color: red;
			font-size: 10pt;
		}
	</style>
</head>

<body>
<div class="container">
	<form action="process.php" method="post">
		<input type="hidden" name="action" value="fibonacciForm">

		<?php if (isset($_SESSION['error']['first'])) echo '<p class="error">'.$_SESSION['error']['first'].'</p>'?>
		<div class="col"><label>Enter a Number:</label></div>
		<input type="text" name="first">
		<br>

		<?php if (isset($_SESSION['error']['second'])) echo '<p class="error">'.$_SESSION['error']['second'].'</p>'?>
		<div class="col"><label>Another Number:</label></div>
		<input type="text" name="second">
		<br>

		<?php if (isset($_SESSION['error']['series'])) echo '<p class="error">'.$_SESSION['error']['series'].'</p>'?>
		<div class="col"><label>Series:</label></div>
		<input type="text" name="series">
		<br><br>
		<input type="submit" value="Run Fibonacci">
	</form>
	<p>Result</p>
	<div class="results">
		<?php 
			if (isset($_SESSION['fib'])){
				for ($i=0; $i < count($_SESSION['fib']); $i++) { 
					echo $_SESSION['fib'][$i];
					if ($i+1 < count($_SESSION['fib'])) echo ', ';
				}
			}
		?>
	</div>
</div>
</body>
</html>

<?php
	$_SESSION = array();
?>