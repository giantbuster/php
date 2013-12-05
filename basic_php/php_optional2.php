<!-- 
	Jefferson Lam
	12-3-13
	PHP Optional 2
-->

<?php
	function convert_number($num){
		if ($num%2==0) $num /= 2;
		else{
			$num *=3;
			$num++;
		}
		return $num;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Optional 2</title>
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
		echo convert_number(3);
	?>
</div>
</body>
</html>