<?php
	session_start();
	require('connection.php');

	//Validate email
	if(isset($_POST['action']) && $_POST['action'] == 'emailForm'){
		$_SESSION['email'] = $_POST['email'];
		//If the email is invalid, return error
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$_SESSION['error'] = true;
			header('Location: index.php');
			exit;
		}

		//Create email in database
		$query = "INSERT INTO users (email, created_at, updated_at)
				  VALUES('" . $_POST['email'] . " ', NOW(), NOW())";
		mysqli_query($connection, $query);

		header('Location: success.php');
		exit;
	}

	//Delete email from database
	if (isset($_POST['delete'])){
		$query = 'DELETE FROM users WHERE id='.$_POST['delete'];
		mysqli_query($connection, $query);

		unset($_SESSION['email']);
		$_SESSION['deleted'] = $_POST['email'];

		header('Location: success.php');
		exit;
	}
?>