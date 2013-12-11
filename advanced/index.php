<?php 
	 
	// Jefferson Lam
	// 12-10-13 
	// PHP with MySQL : Advanced : Wall

	session_start();
	require('connection.php');
?>

<!-- Create a wall/forum page wherein users will be able the post a message and
see the message displayed by others users. Stores the messages in a table
called 'messages' and retrieve the messages from the database.

See the handout for the wireframe/ERD (available on the top right)



Once you got the messages to show up (the wireframe on the left side), allow
users to post comments for any message (store the replies/comments to the
message in a separate table called 'comments')

Extra Credit I (optional): allow the user to delete his/her own message. Extra
Credit II (optional): allow the user to delete his/her own message but only if
the message was made in the last 30 minutes. -->


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PHP with MySQL : Advanced : Wall</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="global.css">
</head>
<body>
<div class="container">
	<div class="navbar">
		<h2>Coding Dojo</h2>
	</div>
	<div class="register">
		<h1>Register</h1>
		<?php
			if(isset($_SESSION['error']['register'])){
				foreach($_SESSION['error']['register'] as $key => $value){
					echo '<p class="error">'.$value.'</p>';
				}
			} 
		?>
		<form action="process.php" method="post">
			<input type="hidden" name="action" value="register">
			<div class="row">
				<div class="col field-label">
					<label>First name</label>
				</div>
				<div class="col">
					<input type="text" name="first_name" placeholder="Michael">
				</div>
			</div>

			<div class="row">
				<div class="col field-label">
					<label>Last name</label>
				</div>
				<div class="col">
					<input type="text" name="last_name" placeholder="Choi">
				</div>
			</div>

			<div class="row">
				<div class="col field-label">
					<label>Email</label>
				</div>
				<div class="col">
					<input type="text" name="email" placeholder="your_email@example.com">
				</div>
			</div>

			<div class="row">
				<div class="col field-label">
					<label>Password</label>
				</div>
				<div class="col">
					<input type="password" name="password" placeholder="Password">
				</div>
			</div>

			<div class="row">
				<div class="col field-label">
					<label>Confirm password</label>
				</div>
				<div class="col">
					<input type="password" name="confirm" placeholder="Confirm password">
				</div>
			</div>
			<input type="submit" value="Register">
		</form>
		<span>Already registered? Login <a href="login.php">here</a>.</span>
	</div>
</div>
</body>
</html>

<?php
	$_SESSION = array();
?>