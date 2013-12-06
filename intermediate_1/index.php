<?php
	session_start();

	if (isset($_SESSION['reset'])){
		$_SESSION = array();
	}	
?>

<!--

	Jefferson Lam
	12-6-13
	Advanced PHP: Intermediate : Ninja Gold Game

-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Advanced PHP: Intermediate : Ninja Gold Game</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="global.css">
</head>
<body>
<div class="container">
	<div class="status">
		<div>
			<label>Your Gold:</label>
			<div class="gold-amount"><span>
				<?php
					if (isset($_SESSION['feedback'])){
						$sum = 0;
						foreach($_SESSION['feedback']['gold'] as $value){
							$sum += $value;
						}
						echo $sum;
					} else {
						echo 0;
					}
				?>
			</span></div>
		</div>
	</div>
	<div class="destinations">
		<div class="col farm">
			<h3>Farm</h3>
			<h4>(earns 10-20 golds)</h4>
			<form action="process.php" method="post">
				<input type="hidden" name="action" value="farm">
				<input type="submit" value="Find Gold!">
			</form>
		</div>
		<div class="col cave">
			<h3>Cave</h3>
			<h4>(earns 5-10 golds)</h4>
			<form action="process.php" method="post">
				<input type="hidden" name="action" value="cave">
				<input type="submit" value="Find Gold!">
			</form>
		</div>
		<div class="col house">
			<h3>House</h3>
			<h4>(earns 2-5 golds)</h4>
			<form action="process.php" method="post">
				<input type="hidden" name="action" value="house">
				<input type="submit" value="Find Gold!">
			</form>
		</div>
		<div class="col casino">
			<h3>Casino!</h3>
			<h4>(earns/takes 0-50 golds)</h4>
			<form action="process.php" method="post">
				<input type="hidden" name="action" value="casino">
				<input type="submit" value="Find Gold!">
			</form>
		</div>
	</div>
	<div class="footer">
		<label>Activities:</label>
		<div class="feedback">
			<?php 
				if (isset($_SESSION['feedback'])){
					// var_dump($_SESSION);
					for($i = count($_SESSION['feedback']['gold'])-1; $i>=0; $i--){
						$place = $_SESSION['feedback']['place'][$i];
						$gold = $_SESSION['feedback']['gold'][$i];
						$time = $_SESSION['feedback']['time'][$i];
						if ($gold >= 0){
							echo '<p class="earned">You entered a '.$place.' and earned '.$gold.' golds. ('.$time.')</p>';
						} else {
							echo '<p class="lost">You entered a '.$place.' and lost '.$gold.' golds... Ouch... ('.$time.')</p>';
						}
					}
				}
			?>
		</div>
		<div class="reset-form">
			<form action="process.php" method="post">
				<input type="hidden" name="action" value="reset">
				<input type="submit" value="Reset">
			</form>
		</div>
	</div>
</div>
</body>
</html>