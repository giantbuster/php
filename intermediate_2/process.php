<?php
	session_start();
	require('connection.php');


	//register()
	//-----------
	//Validates form fields.
	//If validation is successful, creates new entry in database. 
	//Otherwise, returns errors. 
	function register($connection, $post){
		//Validate each field in form
		foreach ($post as $key => $value) {
			if(empty($value)){
				$_SESSION['error'][$key] = $key . " cannot be blank";
			} else {
				switch ($key) {
					case 'first_name':
					case 'last_name':
						if(is_numeric($value)) {
							$_SESSION['error'][$key] = $key . ' cannot contain numbers';
						}
						break;
					case 'email':
						if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
							$_SESSION['error'][$key] = $key . ' is not a valid email';
						}
						break;
					case 'password':
						$password = $value;
						if(strlen($value) < 5) {
							$_SESSION['error'][$key] = $key . ' must be greater than 5 characters';
						}
						break;
					case 'confirm_password':
						if($password != $value) {
							$_SESSION['error'][$key] = 'Passwords do not match';
						}
					break;
				}
			}	
		}

		//If there are errors, redirect to index. 
		if(isset($_SESSION['error'])) {
			header('Location: index.php');
			exit;
		}

		//Complete validation if there are no errors
		$_SESSION['success'] = "Registration successful";

		//Create new entry in database
		//Hash the password
		$salt = bin2hex(openssl_random_pseudo_bytes(22)); 
		$hash = crypt($post['password'], $salt);

		//Create query
		$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at)
				  VALUES('".mysqli_real_escape_string($connection, $post['first_name'])."', 
				  		 '".mysqli_real_escape_string($connection, $post['last_name'])."', 
				  		 '".mysqli_real_escape_string($connection, $post['email'])."', 
				  		 '".$hash."', 
				  		 NOW(), 
				  		 NOW()
				  		 )";
		//Perform query on database
		mysqli_query($connection, $query);

		//Returns the AUTO_INCREMENT ID generated from the previous INSERT operation.
		$user_id = mysqli_insert_id($connection);
		$_SESSION['user_id'] = $user_id;

		header('Location: profile.php?id='.$user_id);
		exit;
	} // /registration()

	//logout()
	//--------
	//Logs out a user and destroys session. 
	function logout($post){
		session_destroy();
		header('Location: index.php');
		exit;
	}

	//---------


	if (isset($_POST['action']) && $_POST['action'] == 'register'){
		register($connection, $_POST);
	}

	if (isset($_POST['action']) && $_POST['action'] == 'logout'){
		logout($_POST);
	}
?>