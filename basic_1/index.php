<?php
	session_start();
	$months = array("January", "February", "March", "April", "May", "June", 
		"July", "August", "September", "October", "November", "December"
	);
?>

<!DOCTYPE html>
<html>

<!-- 
	Jefferson Lam
	12-5-13 
	Advanced PHP : Basic Assignment 1 : Month Selector
-->

<head>
	<meta charset="UTF-8">
	<title>Advanced PHP : Basic Assignment 1 : Month Selector</title>
	<style>
	.container{
		font-family: helvetica;
	}

	.input-area{
		width: 260px;
		display: inline-block;
		text-align: right;
	}

	.results{
		border: 1px solid black;
		width: 260px;
		height: 200px;
		padding: 20px;
	}

	h1{
		text-align: center;
		margin: 0px;
		line-height: 60px;
	}

	</style>
</head>
<body>
	<div class="container">
		<div class="input-area">
			<form action="process.php" method="post">
				<input type="hidden" name="action" value="monthForm">
				<label>Choose a month:</label>
				<select name="month">
					<?php
						for ($i = 0; $i < sizeof($months); $i++){
							echo '<option value="'.$i.'"';
							if (isset($_SESSION['month']) && $i == $_SESSION['month']) echo 'selected';
							echo '>'.$months[$i].'</option>';
						}
					?>
				</select>
				<br>
				<input type="submit" value="Enter">
			</form>
		</div>
		<p>Result</p>
		<div class="results">
			<?php
				if(isset($_SESSION['month'])){
					echo '<h1>'.$months[$_SESSION['month']].'</h1>';
					foreach ($_SESSION['result'] as $key => $value){
						echo '<p>'.$key.': '.$_SESSION['result'][$key].'</p>';
					}
				}
			?>
		</div>
	</div>
</body>
</html>

<?php
	$_SESSION = array();
?>