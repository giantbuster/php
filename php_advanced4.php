<!-- 
	Jefferson Lam
	12-3-13
	PHP Advanced 4 : Insertion Sort
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
			$array[] = rand(0, 1000);
		}
		return $array;
	}

	function swap($i, $j){
		$tmp = $i;
		$i = $j;
		$j = $tmp;
	}

	function insertion_sort($array){
		$size = count($array);
		for ($i = 1; $i<$size; $i++){
			$temp = $array[$i];
			for ($j=$i; $j >= 0; $j--) { 
				if ($j==0){
					$array[0] = $temp;
					break;
				}
				if ($temp < $array[$j-1]) $array[$j] = $array[$j-1];
				else{
					$array[$j] = $temp;
					break;
				} 

				//If current value is larger than previous value, swap them
				//Else, current value is in the correct place; move onto the next element. 
				// if ($array[$j] < $array[$j-1]){
				// 	$tmp = $array[$j];
				// 	$array[$j] = $array[$j-1];
				// 	$array[$j-1] = $tmp;
				// } 
				// else break;
			}
		}
		return $array;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Advanced 4 : Insertion Sort</title>
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

		$array = create_array(3000);
		// print_array($array);

		$start = microtime(true);
		$array = insertion_sort($array);
		$end = microtime(true);

		echo 'Start time : '.$start.'<br>';
		echo 'End time : '.$end.'<br>';
		echo 'Time elapsed : '.($end - $start).'<br><br>';

		print_array($array);
	?>
</div>
</body>
</html>