<!-- 
	Jefferson Lam
	12-3-13
	PHP Optional 6
-->

<?php
	function reverse_string($str){
		$len = strlen($str) - 1;
		for ($i=0; $i <= $len/2; $i++) { 
			$temp = $str[$i];
			$str[$i] = $str[$len-$i];
			$str[$len-$i] = $temp;
		}
		return $str;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Optional 6</title>
	<meta charset='UTF-8'>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<style>
		.container{
			width: 300px;
			margin: 0 auto;
			font-family: arial;
		}
	</style>
	<script>

	</script>
</head>
<body>
<div class="container">
	<h1>String Reversal</h1>
	<?php
		$str = 'Coding Dojo';
		echo $str.'<br>';
		echo reverse_string($str);
	?>
</div>
</body>
</html>