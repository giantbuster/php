<?php
	session_start();
	require('connection.php');

	if (!isset($_SESSION['user_id'])){
		header('Location: login.php');
		exit;
	}

?>

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
	<div class="header">
		<div class="top">
			<div class="left">
				<h2>Coding Dojo Wall</h2>
			</div>
			<div class="right">
				<div class="welcome">
					<?php
						$query = "SELECT first_name FROM users
								  WHERE id = ".$_SESSION['user_id'];
						$result = fetchRecord($connection, $query);
					?>
					<h4>Welcome <?= $result['first_name']?> </h4>
				</div>
				<div class="logout">
					<form action="process.php" method="post">
						<input type="hidden" name="action" value="logout">
						<input type="submit" value="log off">
					</form>
				</div>
			</div>
		</div>
		<div class="bottom">
			<div class="sections">
				<h3><a href="profile.php">Profile</a></h3>
				<h3><a href="wall.php">Wall</a></h3>
			</div>
		</div>
	</div> <!-- /.header -->
	<div class="content">
		<?php
			$query = 'SELECT * FROM users 
					  WHERE users.id = '.$_SESSION['user_id'];
			$result = fetchRecord($connection, $query);
		?>
		<div class="profile-info">
			<h2>Profile Info</h2>
			<br>
			<label>First name</label>
			<h3><?= $result['first_name'] ?></h3>
			<br>
			<label>Last name</label>
			<h3><?= $result['last_name'] ?></h3>
			<br>
			<label>Email</label>
			<h3><?= $result['email'] ?></h3>
		</div>
	</div>
</div> <!-- container --> 
</body>
</html>