<!-- 
	Jefferson Lam
	12-3-13
	PHP Basic 4
-->

<?php
	function get_max_and_min($array){
		$min = $array[0];
		$max = $array[0];
		foreach ($array as $i){
			if ($i > $max) $max = $i;
			if ($i < $min) $min = $i;
		}
		$array['max'] = $max;
		$array['min'] = $min;
		return $array;
	}

	function print_max_and_min($array){
		echo 'Max: '.$array['max'].'<br>';
		echo 'Min: '.$array['min'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Basic 4</title>
	<meta charset='UTF-8'>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<style>
		*{
			font-family: verdana;
		}
	</style>
</head>
<body>
<div class="container">
	<?php 
		$sample = array(23, 12, 5, 3, 42, 59, 1, 42, 90, 38, 64, 53);
		print_r($sample);
		echo '<br>';
		$output = get_max_and_min($sample);
		print_max_and_min($output);
	?>
</div>
</body>
</html>