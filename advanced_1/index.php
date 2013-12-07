<?php
	session_start();

	function validate_field($field){
		if (isset($_SESSION['error'][$field])){
			echo '<div class="error-msg">';
		    echo '<p>'.$_SESSION['error'][$field].'</p>'; 
		    echo '</div>';
		}
	}

	function fill($key){
		if (isset($_SESSION['input'][$key])){
			echo $_SESSION['input'][$key];
		}
	}
	// var_dump($_SESSION);

	function fill_password($key){
		if (isset($_SESSION['success']['password']) && isset($_SESSION['success']['confirm'])) {
			echo $_SESSION['success'][$key];	
		}
	}

	if (isset($_SESSION['validated'])) $_SESSION = array();
?>

<!--
	Jefferson Lam
	12-6-13
	Advanced PHP : Advanced : Registration Page
-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Advanced PHP : Advanced : Registration Page</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="global.css">
</head>
<body>
<div class="container">
	<div class="modal">
		<form action="process.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="action" value="registration">

			<div class="row">
				<?php validate_field('email') ?>
				<div class="col"><label>Email</label></div>
				<div class="col"><input type="text" name="email" placeholder="youremail@example.com" value="<?= fill('email')?>"></div>
			</div>

			<div class="row">
				<?php validate_field('first_name') ?>
				<div class="col"><label>First Name</label></div>
				<div class="col"><input type="text" name="first_name" placeholder="Michael" value="<?= fill('first_name')?>"></div>
			</div>

			<div class="row">
				<?php validate_field('last_name') ?>
				<div class="col"><label>Last Name</label></div>
				<div class="col"><input type="text" name="last_name" placeholder="Choi" value="<?= fill('last_name')?>"></div>
			</div>

			<div class="row">
				<?php validate_field('password') ?>
				<div class="col"><label>Password</label></div>
				<div class="col"><input type="password" name="password" placeholder="Password" value="<?= fill_password('password')?>"></div>
			</div>

			<div class="row">
				<?php validate_field('confirm') ?>
				<div class="col"><label>Confirm Password</label></div>
				<div class="col"><input type="password" name="confirm" placeholder="Re-enter password" value="<?= fill_password('confirm')?>"></div>
			</div>

			<div class="row">
				<?php validate_field('dob') ?>
				<div class="col"><label>Birth Date</label></div>
				<div class="col"><input type="text" name="dob" placeholder="MM/DD/YYYY" value="<?= fill('dob')?>"></div>
			</div>

			<div class="row">
			<?php validate_field('file') ?>
				<div class="col"><label>Profile Picture</label></div>
				<div class="col"><input type="file" name="file"></div>
			</div>

			<div class="row">
				<div class="submit-btn"><input type="submit" value="Submit"></div>
			</div>
		</form>
		<form action="process.php" method="post">
			<input type="hidden" name="reset" value="reset">
			<input type="submit" value="Reset">
		</form>
	</div>
</div>
</body>
</html>