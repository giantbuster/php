<!-- 
	Jefferson Lam
	12-3-13
	PHP Optional 1
-->

<?php
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Optional 1</title>
	<meta charset='UTF-8'>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<style>
		*{
			font-family: arial;
		}
	</style>
</head>
<body>
<div class="container">
	<?php
		for ($i=1; $i <= 7; $i++) { 
			for ($j=1; $j <= $i; $j++) { 
				echo $j;
			}
			echo '<br>';
		}
		for ($i=6; $i >=1; $i--) { 
			for ($j=1; $j <= $i; $j++) { 
				echo $j;
			}
			echo '<br>';
		}
	?>
</div>
</body>
</html>