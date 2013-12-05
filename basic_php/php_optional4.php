<!-- 
	Jefferson Lam
	12-3-13
	PHP Optional 4
-->

<?php
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Optional 4</title>
	<meta charset='UTF-8'>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<style>
		.container{
			width: 300px;
			margin: 0 auto;
			font-family: arial;
		}
	</style>
</head>
<body>
<div class="container">
	<h1>List of Squares:</h1>
	<?php
		for ($i=1; $i <=10 ; $i++) { 
			echo '<p>'.$i.' x '.$i.' = '.($i*$i).'</p>';
		}
	?>
</div>
</body>
</html>