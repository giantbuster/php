<!-- 
	Jefferson Lam
	12-3-13
	PHP Intermediate 2 : Multiplication Table
-->

<?php
	function draw_multiplication_table($size){
		if ($size<=0) return;

		$product = '';
		$class = '';
		echo '<table>';
		echo '<tbody>';
		
		for ($i=0; $i <= $size; $i++) { 
			echo '<tr>';
			for ($j=0; $j <= $size; $j++) { 
				//Check if number is part of border.
				if ($i == 0 || $j == 0){
					//If so, add numbers, and make it bold
					$product = $i + $j;
					if ($product==0) $product = '';
					$class = 'class="border"';
				} else {
					//If not part of border, multiply as normal, and make it not-bold.
					$product = $i * $j;
					$class = '';
				} 
				echo '<td '.$class.'>'.$product.'</td>';
			}
			echo '</tr>';
		}

		echo '</tbody>';
		echo '</table>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Intermediate 2 : Multiplication Table</title>
	<meta charset='UTF-8'>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<style>
		*{
			font-family: verdana;
			margin: none;
			padding: none;
		}
		td{
			border: 1px solid black;
			float: left;
			margin: -3px 0px 0px -1px;
			padding: 6px;
			width: 25px;
			height: 25px;
			text-align: center;
		}
		.border{
			font-weight: bold;
		}
	</style>
</head>
<body>
<div class="container">
	<?php draw_multiplication_table(9); ?>
</div>
</body>
</html>