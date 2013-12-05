<!-- 
	Jefferson Lam
	12-3-13
	PHP Intermediate 1 : Draw Stars
-->

<?php
	function draw_stars($numberArray){
		for ($i = 0; $i < sizeof($numberArray); $i++){
			for ($j = 0; $j < $numberArray[$i]; $j++){
				echo '*';
			}
			echo '<br>';
		}
	}

	function draw_mixed($mixedArray){
		for ($i = 0; $i < sizeof($mixedArray); $i++){
			if (is_int($mixedArray[$i])){
				for ($j = 0; $j < $mixedArray[$i]; $j++){ 
					echo '*'; 
				}
			} else if (is_string($mixedArray[$i])) {
				for ($j = 0; $j < strlen($mixedArray[$i]); $j++){ 
					echo strtolower($mixedArray[$i][0]); 
				}
			}
			echo '<br>';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Intermediate 1 : Draw Stars</title>
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
		$stars = array(5, 2, 12, 8, 20, 1);
		draw_stars($stars);

		echo '<br>';

		$mixed = array(4, "Tom", 1, "Michael", 5, 7, "Jimmy Smith");
		draw_mixed($mixed);
	?>
</div>
</body>
</html>