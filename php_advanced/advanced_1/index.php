<?php
	// Jefferson Lam
	// 12-6-13
	// Advanced PHP : Advanced : Registration Page



	//FUNCTIONS
	//-----------------------
	
	//validate_field($field)
	//	Given a field, checks if there have been any errors, and prints them out. 
	function validate_field($field){
		if (isset($_SESSION['error'][$field])){
			echo '<div class="error-msg">';
		    echo '<p>'.$_SESSION['error'][$field].'</p>'; 
		    echo '</div>';
		}
	}

	//fill($key)
	//	Fills in a field with pre-entered values.
	//	Used so that fields do not get cleared upon submitting the form if not all fields were validated.
	function fill($key){
		if (isset($_SESSION['input'][$key])){
			echo $_SESSION['input'][$key];
		}
	}

	//fill_password($key)
	//	Fills in password fields with pre-entered values if password and confirmation are both validated.
	function fill_password($key){
		if (isset($_SESSION['success']['password']) && isset($_SESSION['success']['confirm'])) {
			echo $_SESSION['success'][$key];
		}
	}

	//highlight($field)
	//	Highlights an input textfield if there's an error
	function highlight($field){
		if (isset($_SESSION['error'][$field])) echo 'highlight';
	}
	//------------------------


	session_start();

	//Checks if all form fields have been validated. If so, resets the fields. 
	if (isset($_SESSION['validated'])) unset($_SESSION['input'], $_SESSION['success']);
?>

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
		<div class="registration">
			<form action="process.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="action" value="registration">

				<div class="row">
					<?php validate_field('email') ?>
					<div class="col">
						<label>Email</label>
					</div>
					<div class="col <?php highlight('email');?>">
						<input type="text" name="email" placeholder="youremail@example.com" value="<?= fill('email')?>">
					</div>
				</div>

				<div class="row">
					<?php validate_field('first_name') ?>
					<div class="col">
						<label>First Name</label>
					</div>
					<div class="col <?php highlight('first_name');?>">
						<input type="text" name="first_name" placeholder="Michael" value="<?= fill('first_name')?>">
					</div>
				</div>

				<div class="row">
					<?php validate_field('last_name') ?>
					<div class="col">
						<label>Last Name</label>
					</div>
					<div class="col <?php highlight('last_name');?>">
						<input type="text" name="last_name" placeholder="Choi" value="<?= fill('last_name')?>">
					</div>
				</div>

				<div class="row">
					<?php validate_field('password') ?>
					<div class="col">
						<label>Password</label>
					</div>
					<div class="col <?php highlight('password');?>">
						<input type="password" name="password" placeholder="Password" value="<?= fill_password('password')?>">
					</div>
				</div>

				<div class="row">
					<?php validate_field('confirm') ?>
					<div class="col">
						<label>Confirm Password</label>
					</div>
					<div class="col <?php highlight('confirm');?>">
						<input type="password" name="confirm" placeholder="Re-enter password" value="<?= fill_password('confirm')?>">
					</div>
				</div>

				<div class="row">
					<?php validate_field('dob') ?>
					<div class="col">
						<label>Birth Date</label>
					</div>
					<div class="col <?php highlight('dob');?>">
						<input type="text" name="dob" placeholder="MM/DD/YYYY" value="<?= fill('dob')?>">
					</div>
				</div>

				<div class="row">
					<?php validate_field('file') ?>
					<div class="col">
						<label>Profile Picture</label>
					</div>
					<div class="col">
						<input type="file" name="file">
					</div>
				</div>

				<div class="row">
					<div class="submit-btn">
						<input type="submit" value="Submit">
					</div>
				</div>
			</form>
			<form action="process.php" method="post">
				<input type="hidden" name="reset" value="reset">
				<input type="submit" value="Clear Fields">
			</form>
		</div><!-- /.registration -->

		<div class="registration-success">
			<?php 
				if (isset($_SESSION['validated'])){
					echo '<h3>Registration Successful!';
					$_SESSION = array();
				}
			?>
		</div>
	</div><!-- /.modal -->
</div><!-- /.container -->
</body>
</html>