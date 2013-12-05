<!-- 
	Jefferson Lam
	12-3-13
	PHP Optional 5
-->

<?php
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Optional 5</title>
	<meta charset='UTF-8'>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<style>
		.container{
			width: 150px;
			margin: 0 auto;
			font-family: arial;
		}
	</style>
</head>
<body>
<div class="container">
	<h1>Names:</h1>
	<?php
		$names = array('KB','John','Oliver', 'Mikey','Michael');
		rsort($names);
		foreach ($names as $name){
			echo '<p>'.$name.'</p>';
		}
	?>
</div>
</body>
</html>