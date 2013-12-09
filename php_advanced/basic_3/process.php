<?php
	session_start();

	if(isset($_POST['action']) && $_POST['action'] == 'emailForm'){
		$_SESSION['email'] = $_POST['email'];
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$_SESSION['error'] = false;
			header('Location: success.php');
			exit;
		} else {
			$_SESSION['error'] = true;
			header('Location: index.php');
			exit;
		}
	}
?>