<?php
	session_start();
	require('connection.php');
	
	//Function Declarations
	//===================================
	function redirect($location){
		header('Location: '.$location);
		exit;
	}


	function register($connection, $post){
		//Validate each field in form
		foreach ($post as $key => $value) {
			if(empty($value)){
				$_SESSION['error']['register'][$key] = "Cannot be blank";
			} else {
				switch ($key) {
					case 'first_name':
					case 'last_name':
						if(is_numeric($value)) {
							$_SESSION['error']['register'][$key] = 'Cannot contain numbers';
						}
						break;
					case 'email':
						if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
							$_SESSION['error']['register'][$key] = "Not a valid email";
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
							$_SESSION['error']['register'][$key] = 'Must be greater than 5 characters';
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
			redirect('index.php');
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

		redirect('success.php');
	}

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
					redirect('wall.php');
				}
			}
		}
		redirect('login.php');
	} // /login()

	function logout(){
		session_destroy();
		redirect('login.php');
	}

	function message($connection, $post){
		if (strlen($_POST['wall_msg'])==0){
			redirect('wall.php');
		}
		$query = "INSERT INTO messages (message, users_id, created_at, updated_at)
				  VALUES ('".mysqli_real_escape_string($connection, $_POST['wall_msg'])."',
				          ".mysqli_real_escape_string($connection, $_SESSION['user_id']).", 
				          NOW(), 
				          NOW())";
		mysqli_query($connection, $query);
		redirect('wall.php');
	}

	function delete_msg($connection, $post){
		$query = "DELETE FROM comments WHERE comments.messages_id = ".$_POST['msg_id'];
		mysqli_query($connection, $query);

		$query = "DELETE FROM messages WHERE messages.id = ".$_POST['msg_id'];
		mysqli_query($connection, $query);

		redirect('wall.php');
	}

	function comment($connection, $post){
		if (strlen($_POST['msg_comment'])==0){
			redirect('wall.php');
		}
		$query = "INSERT INTO comments (comment, messages_id, users_id, created_at, updated_at)
				  VALUES ('".mysqli_real_escape_string($connection, $_POST['msg_comment'])."',
				  		  '".mysqli_real_escape_string($connection, $_POST['msg_id'])."',
				  		  '".$_SESSION['user_id']."',
				          NOW(), 
				          NOW())";
		mysqli_query($connection, $query);
		redirect('wall.php');
	}

	//End function declarations
	//===================================


	if (isset($_POST['action'])) {
		switch ($_POST['action']){
			case 'register':
				register($connection, $_POST);
				break;
			case 'login':
				login($connection, $_POST);
				break;
			case 'logout':
				logout();
				break;
			case 'message':
				message($connection, $_POST);
				break;
			case 'delete':
				delete_msg($connection, $_POST);
				break;
			case 'comment':
				comment($connection, $_POST);
				break;
		}
	}
?>