<!-- 
	Jefferson Lam
	12-3-13
	PHP Advanced 5 : Bubble Sort
-->

<?php
	function print_array($array){
		echo 'Array : '.'<br>';
		for ($i=0; $i < count($array); $i++) { 
			echo $i.' : '.$array[$i].'<br>';
		}
	}

	function create_array($numElements){
		if ($numElements<1) return;
		$array = array();
		for ($i=0; $i < $numElements; $i++) { 
			$array[] = rand(0, 10000);
		}
		return $array;
	}

	function swap(&$i, &$j){
		$tmp = $i;
		$i = $j;
		$j = $tmp;
	}

	function bubble_sort($array){
		$size = count($array);
		for ($i=$size-1; $i >= 0; $i--) { 
			for ($j=0; $j<$i; $j++){
				if ($array[$j] > $array[$j+1]) swap($array[$j+1], $array[$j]);
			}
		}
		return $array;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Advanced 5 : Bubble Sort</title>
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

		$array = create_array(100);
		// print_array($array);

		$start = microtime(true);
		$array = bubble_sort($array);
		$end = microtime(true);

		echo 'Start time : '.$start.'<br>';
		echo 'End time : '.$end.'<br>';
		echo 'Time elapsed : '.($end - $start).'<br><br>';

		print_array($array);
	?>
</div>
</body>
</html>