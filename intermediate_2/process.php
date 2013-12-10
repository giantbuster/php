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
				$_SESSION['error']['register'][$key] = $key . " cannot be blank";
			} else {
				switch ($key) {
					case 'first_name':
					case 'last_name':
						if(is_numeric($value)) {
							$_SESSION['error']['register'][$key] = 'Name cannot contain numbers';
						}
						break;
					case 'email':
						if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
							$_SESSION['error']['register'][$key] = $value . ' is not a valid email';
						} else {
							//Check if email already exists in database
							$query = "SELECT email FROM users WHERE email ='".$value."'";
							$result = fetchRecord($connection, $query);
							if ($result != NULL){
								$_SESSION['error']['register'][$key] ='Email already exists';
							}
						}
						break;
					case 'password':
						$password = $value;
						if(strlen($value) < 5) {
							$_SESSION['error']['register'][$key] = 'Password must be greater than 5 characters';
						}
						break;
					case 'confirm':
						if(!isset($password) || $password != $value) {
							$_SESSION['error']['register'][$key] = 'Passwords do not match';
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
		$_SESSION['rSuccess'] = "Registration successful";

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


	//login()
	//------------
	//Processes the login form
	function login($connection, $post){
		//Check if either email or password fields are empty
		if(empty($post['email']) || empty($post['password'])){
			$_SESSION['error']['login'] = "Email or Password cannot be blank";
		} else {
			//Otherwise, fields are not empty. Process inputted password and email
			$query = "SELECT id, password
					  FROM users
					  WHERE email = '".$post['email']."'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_assoc($result);

			//Check if database contains email
			if(empty($row)){
				$_SESSION['error']['login'] = 'Email not found';
			} else {
				//Check if password is correct
				if(crypt($post['password'], $row['password']) != $row['password']) {
					$_SESSION['error']['login'] = 'Incorrect Password';
				} else {
				//Log in!
					$_SESSION['user_id'] = $row['id'];
					header('Location: profile.php?id='.$row['id']);
					exit;
				}
			}
		}
		header('Location: index.php');
		exit;
	} // /login()


	//logout()
	//--------
	//Logs out a user and destroys session. 
	function logout($post){
		session_destroy();
		header('Location: index.php');
		exit;
	}

	//=======================================

	
	//Figure out which form was inputted
	if (isset($_POST['action'])){
		switch($_POST['action']){
			case 'register':
				register($connection, $_POST);
				break;
			case 'login':
				login($connection, $_POST);
				break;
			case 'logout':
				logout($connection, $_POST);
				break;
		}
	}
?>