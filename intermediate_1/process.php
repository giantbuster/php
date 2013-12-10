<?php
	session_start();
	require('connection.php');
	
	
	if (isset($_POST['action']) && $_POST['action'] == 'registration'){
		unset($_SESSION['error']);

		//Validate each input fields
		foreach ($_POST as $key => $value){
			$_SESSION['input'][$key] = $value;
			//If it's blank, return error
			if (empty($value)){	
				$_SESSION['error'][$key] = 'Cannot be empty';
				continue;
			}
			//Parse inputted values
			switch($key){
				case 'first_name':
				 	if (!ctype_alpha($value)) $_SESSION['error'][$key] = 'Name must only contain letters';
					break;
				case 'last_name':
					if (!ctype_alpha($value)) $_SESSION['error'][$key] = 'Name must only contain letters';
					break;
				case 'email':
					if (!filter_var($value, FILTER_VALIDATE_EMAIL)) $_SESSION['error'][$key] = 'Invalid email';
					break;
			}
			if (!isset($_SESSION['error'][$key])) $_SESSION['success'][$key] = $value;
		} 

		//Validate file upload
		if ($_FILES['file']['size'] == 0){
			$_SESSION['error']['file'] = "Please upload a picture";
		} else if ($_FILES['file']['error'] > 0){
			$_SESSION['error']['file'] = "Error on file upload Return Code: ".$_FILES['file']['error'];
		} else {
			$directory = 'upload/';
			$file_name = $_FILES['file']['name'];
			$file_path = $directory.$file_name;
			if(file_exists($file_path)){
				$_SESSION['error']['file'] = $file_name.' already exists';
			} else {
				//var_dump($_FILES);
				if (!move_uploaded_file($_FILES['file']['tmp_name'], $file_path)){
					$_SESSION['error']['file'] = $file_name." could not be saved";
				} else {
					unset($_SESSION['error']['file']);
				}
			}
		}

		//Check if validation was successful.
		if (!isset($_SESSION['error'])){
			//Create new subscriber in database
			$query = "INSERT INTO students (first_name, last_name, email, pic_url, created_at, updated_at)
					  VALUES('". mysqli_real_escape_string($connection, $_POST['first_name']) ."', 
					  	     '". mysqli_real_escape_string($connection, $_POST['last_name']) ."', 
					  	     '". mysqli_real_escape_string($connection, $_POST['email']) ."', 
					  	     '". $file_path ."', 
					  	     NOW(), 
					  	     NOW())";
			mysqli_query($connection, $query);

			//Create topic/user relationship
			$user_id = mysqli_insert_id($connection);
			foreach($_POST['topic'] as $key => $topic_id){
				$query = "INSERT INTO topics_has_students(topics_id, students_id)
					  	  VALUES (".($topic_id+1).", ".$user_id.")";
				mysqli_query($connection, $query);
			}
		} 
		header('Location: index.php');
		exit;
	}
?>