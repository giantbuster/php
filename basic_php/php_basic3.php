<!-- 
	Jefferson Lam
	12-3-13
	PHP Basic 3 : Coin Flip
-->

<?php
	$coin = 0;
	$heads_count = 0;
	$tails_count = 0;

	function throw_coin($coin){
		global $coin, $heads_count, $tails_count;
		$coin = rand(0, 1);
		$coin==0 ? $heads_count++ : $tails_count++;
	}

	function print_result(){
		global $coin, $heads_count, $tails_count;
		echo "Throwing a coin... It's a ".($coin==0 ? 'heads':'tails').'!';
		echo " Got ".$heads_count." head(s) so far and ".$tails_count." tail(s) so far";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Basic 3 : Coin Flip</title>
	<meta charset='UTF-8'>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<style>
		*{
			font-family: verdana;
		}
		h4{
			text-decoration: underline;
			font-style: italic;
			color: #444;
		}
	</style>
</head>
<body>
<div class="container">
	<?php 
		echo '<h4>Starting the program</h4>';
		for ($i = 1; $i<=5000; $i++){
			echo '<p>Attempt #'.$i.': ';
			throw_coin($coin);
			print_result();
			echo '</p>';
		}
		echo '<h4>Ending the program - thank you!</h4>';
	?>
</div>
</body>
</html>