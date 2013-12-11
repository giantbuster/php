<?php
	session_start();
	require('connection.php');

	function register($connection, $post){
		header('Location: wall.php');
		exit;
	}

	function login($connection, $post){
		header('Location: wall.php');
		exit;
	}

	function logout(){
		session_destroy();
		header('Location: index.php');
		exit;
	}

	if (isset($_POST['action'])) {
		switch ($_POST['action']){
			case 'register':
				register($connection, $_POST);
			case 'login':
				login($connection, $_POST);
			case 'logout':
				logout();

		}
	}
?>