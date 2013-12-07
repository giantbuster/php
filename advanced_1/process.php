<?php
	session_start();

	if (isset($_POST['action']) && $_POST['action'] == 'registration'){
		//Check each of the input fields
		foreach ($_POST as $key => $value){
			$_SESSION['input'][$key] = $value;
			if (empty($value)){
				$_SESSION['error'][$key] = 'cannot be empty';

				//Unset so passwords don't get filled in again
				// unset($_SESSION['success'][$key]);
				continue;
			}
			//Parse inputted values
			switch($key){
				case 'email':
					if (!filter_var($value, FILTER_VALIDATE_EMAIL))
						$_SESSION['error'][$key] = 'invalid email';
					else {
						$_SESSION['success'][$key] = $value;
						unset($_SESSION['error'][$key]);
					}
					break;
				case 'first_name':
				 	if (!ctype_alpha($value)) 
				 		$_SESSION['error'][$key] = 'Name must only contain letters';
				 	else {
				 		$_SESSION['success'][$key] = $value;
				 		unset($_SESSION['error'][$key]);
				 	}
					break;
				case 'last_name':
					if (!ctype_alpha($value)) 
						$_SESSION['error'][$key] = 'Name must only contain letters';
					else {
						$_SESSION['success'][$key] = $value;
						unset($_SESSION['error'][$key]);
					}
					break;
				case 'password':
					if (strlen($value)<6) {
						$_SESSION['error'][$key] = 'Password must be at least 6 characters';
						unset($_SESSION['success'][$key]);
					} else {
						$_SESSION['success'][$key] = $value;
						unset($_SESSION['error'][$key]);
					}
					break;
				case 'confirm':
					if (isset($_SESSION['success']['password']) && $_SESSION['success']['password'] != $value){
						$_SESSION['error'][$key] = 'Password does not match';
						unset($_SESSION['success'][$key]);
					} else {
						$_SESSION['success'][$key] = $value;
						unset($_SESSION['error'][$key]);
					}
					break;
				case 'dob':
					$dob = explode('/', $value);
					if (count($dob)!=3 || 
						!is_numeric($dob[0]) || !is_numeric($dob[1]) || !is_numeric($dob[2]) || 
						!checkdate($dob[0], $dob[1], $dob[2]))
						$_SESSION['error'][$key] = 'Invalid date';
					else {
						$_SESSION['success'][$key] = $value;
						unset($_SESSION['error'][$key]);
					}
					break;
			}//end switch
		} //end foreach loop

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
		if (!isset($_SESSION['error']) || count($_SESSION['error'])==0) $_SESSION['validated'] = true;
	}

	if (isset($_POST['reset'])) $_SESSION = array();
	header('Location: index.php');
?>