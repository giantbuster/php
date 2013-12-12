<?php 
	 
	// Jefferson Lam
	// 12-10-13 
	// PHP with MySQL : Advanced : Wall

	session_start();
	require('connection.php');
	if (isset($_SESSION['user_id'])){
		header('Location: wall.php');
	}
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
<?php include_once("analyticstracking.php") ?>
<div class="container">
	<div class="header">
		<h2>Coding Dojo Wall</h2>
	</div>
	<div class="content">
		<div class="register modal">
			<h1>Register</h1>
			<form action="process.php" method="post">
				<input type="hidden" name="action" value="register">
				<div class="row">
					<div class="col field-label">
						<label>First name</label>
					</div>
					<div class="col">
						<input type="text" name="first_name" placeholder="Michael">
						<span class="error"> 
							<?= isset($_SESSION['error']['register']['first_name']) ? $_SESSION['error']['register']['first_name'] : '' ?> 
						</span>
					</div>
				</div>

				<div class="row">
					<div class="col field-label">
						<label>Last name</label>
					</div>
					<div class="col">
						<input type="text" name="last_name" placeholder="Choi">
						<span class="error"> 
							<?= isset($_SESSION['error']['register']['last_name']) ? $_SESSION['error']['register']['last_name'] : '' ?> 
						</span>
					</div>
				</div>

				<div class="row">
					<div class="col field-label">
						<label>Email</label>
					</div>
					<div class="col">
						<input type="text" name="email" placeholder="your_email@example.com">
						<span class="error"> 
							<?= isset($_SESSION['error']['register']['email']) ? $_SESSION['error']['register']['email'] : '' ?> 
						</span>
					</div>
				</div>

				<div class="row">
					<div class="col field-label">
						<label>Password</label>
					</div>
					<div class="col">
						<input type="password" name="password" placeholder="Password">
						<span class="error"> 
							<?= isset($_SESSION['error']['register']['password']) ? $_SESSION['error']['register']['password'] : '' ?> 
						</span>
					</div>
				</div>

				<div class="row">
					<div class="col field-label">
						<label>Confirm password</label>
					</div>
					<div class="col">
						<input type="password" name="confirm" placeholder="Confirm password">
						<span class="error"> 
							<?= isset($_SESSION['error']['register']['confirm']) ? $_SESSION['error']['register']['confirm'] : '' ?> 
						</span>
					</div>
				</div>
				<div class="submit">
					<input type="submit" value="Register">
				</div>
			</form>
			<div class="modal-footer">
				<p>Already registered? Login <a href="login.php">here</a>.</p>
			</div>
		</div> <!-- /.register -->
	</div> <!-- /.content -->
</div> <!-- /.container -->
</body>
</html>

<?php
	$_SESSION = array();
?>