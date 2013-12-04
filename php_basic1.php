<!-- 
	Jefferson Lam
	12-3-13
	PHP Basic 1
-->

<?php
	
	function random_score(){
		$score = rand(50, 100);
		$grade = '';

		if ($score < 70) $grade = 'D';
		else if ($score >= 70 && $score < 80) $grade = 'C';
		else if ($score >= 80 && $score < 90) $grade = 'B';
		else if ($score >= 90) $grade = 'A';

		echo '<h1>Your Score: '.$score.'/100</h1>';
		echo '<h2>Your grade is a '.$grade.'</h2>';
		echo '<br>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Basic 1</title>
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
	<?php 
		for ($i = 0; $i<100; $i++){
			random_score();
		}
	?>
</body>
</html>