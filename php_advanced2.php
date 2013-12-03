<!-- 
	Jefferson Lam
	12-3-13
	PHP Advanced 2
-->

<?php
	function checkerboard($color1, $color2){
		$alt = $color1;
		for ($i=0; $i < 8; $i++){
			for ($j=0; $j < 8; $j++) { 
				echo '<div class="box" style="background: '.$alt.'"></div>';
				$alt = $alt==$color1? $color2 : $color1;
			}
			$alt = $alt==$color1? $color2 : $color1;
			echo '<br>';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Advanced 2</title>
	<meta charset='UTF-8'>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<style>
		.board{
			border: 1px solid black;
			display: inline-block;
		}
		.box{
			width: 35px;
			height: 35px;
			display: inline-block;
			vertical-align: top;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="board">
		<?php 
			checkerboard('#FFFFFF', '#556B2F');
		?>
	</div>
</div>
</body>
</html>