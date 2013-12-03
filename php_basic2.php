<!-- 
	Jefferson Lam
	12-3-13
	PHP Basic 2
-->

<?php
	$states = array('CA', 'WA', 'VA', 'UT', 'AZ');

	function option_forloop($array){
		echo '<select>';
		for ($i = 0; $i < sizeof($array); $i++){
			echo '<option value="'.$array[$i].'">'.$array[$i].'</option>';
		}
		echo '</select>';
	}

	function option_foreachloop($array){
		echo '<select>';
		foreach ($array as $element){
			echo '<option value="'.$element.'">'.$element.'</option>';
		}
		echo '</select>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Basic 2</title>
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
		option_forloop($states);
	    option_foreachloop($states);
		array_push($states, 'NJ', 'NY', 'DE');
		option_foreachloop($states);
	?>
</div>
</body>
</html>