<?php 
	session_start();
	require('connection.php');

	$query = "SELECT * FROM users";
	$result = fetchAll($connection, $query);
	// var_dump($result);
	// var_dump($_SESSION);
	// var_dump($_POST);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Advanced PHP : Basic Assignment 2 : Email Validation</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="global.css">
</head>

<body>
<div class="container">
	<div class="success">
		<?php 
			if (isset($_SESSION['email'])){
				echo '<p>The email address you entered ('.$_SESSION['email'].') is a valid email address! Thank you!</p>';
			} else if (isset($_SESSION['deleted'])){
				echo '<p>Deleted '.$_SESSION['deleted'].'</p>';
			}
		?>
	</div>
	<div class="redirect">
		<input type="submit" value="Enter another email" onclick="window.location='index.php';" />   
		<br>
	</div>
	<div class="database">
		<h4>Email addresses entered</h4>
		<div class="data">
			<?php
				foreach ($result as $row){
					echo '<div class="row">';
					foreach($row as $key => $value){
						switch($key){
							case('email'):
								echo '<span>'.$value.'</span>';
								break;
							case('created_at'):
								echo '<span>'.$value.'</span>';
								break;
							case('updated_at'):
								echo '<span>'.$value.'</span>';
								break;
						}
					}
			?>	
					<form action="process.php" method="post">
						<input type="hidden" name="delete" value="<?= $row['id'] ?>">
						<input type="hidden" name="email" value="<?= $row['email'] ?>">
						<input type="submit" value="Delete">
					</form>
			<?php
					}
			?>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<?php
	// $_SESSION = array();
?>