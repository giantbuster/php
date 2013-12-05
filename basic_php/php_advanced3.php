<!-- 
	Jefferson Lam
	12-3-13
	PHP Advanced 3: Selection Sort
-->

<?php
	function print_array($array){
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

	function selection_sort($array){
		$size = count($array);

		//Loop through entire array
		for ($i=0; $i < $size; $i++) { 
			//Hold onto the ith element
			$min = $i;

			//Find the smallest element after index i
			for ($j=$i+1; $j < $size; $j++) { 
				if ($array[$j] < $array[$min]) $min = $j;
			}

			//Swap the smallest element with the ith element
			swap($array[$i], $array[$min]);
		}
		return $array;
	}

	function selection_sort_modified($array){
		$size = count($array);

		//Loop through half of array
		for ($i=0; $i < $size - $i; $i++) { 
			$min = $i;
			$last = $size - $i - 1;
			$max = $last;

			//Find max and min after index i
			for ($j=$i+1; $j < $size - $i; $j++) { 
				if ($array[$j] < $array[$min]) $min = $j;
				else if ($array[$j] > $array[$max]) $max = $j;
			}

			//Swap the min element with the first element that hasn't been swapped
			swap($array[$i], $array[$min]);
			
			//Swap the max element with the last element that hasn't been swapped
			swap($array[$last], $array[$max]);
		}
		return $array;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Advanced 3 : Selection Sort</title>
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
		echo 'SELECTION SORT<br>';
		$array = create_array(10000);
		$start = microtime(true);
		$array = selection_sort($array);
		$end = microtime(true);
		echo 'Start time : '.$start.'<br>';
		echo 'End time : '.$end.'<br>';
		echo 'Time elapsed : '.($end - $start).'<br><br>';



		echo 'SELECTION SORT MODIFIED<br>';
		$array = create_array(100);
		$start = microtime(true);
		$array = selection_sort_modified($array);
		$end = microtime(true);
		echo 'Start time : '.$start.'<br>';
		echo 'End time : '.$end.'<br>';
		echo 'Time elapsed : '.($end - $start).'<br><br>';
	?>
</div>
</body>
</html>