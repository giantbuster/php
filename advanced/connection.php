<?php

	// define('DB_HOST', 'localhost');
	// define('DB_USER', 'root');
	// define('DB_PASS', 'root');
	// define('DB_DATABASE', 'advanced');

	define('DB_HOST', 'dojowall.db.10514924.hostedresource.com');
	define('DB_USER', 'dojowall');
	define('DB_PASS', 'shafTs51slouc!');
	define('DB_DATABASE', 'dojowall');

	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

	if(mysqli_connect_errno()){
		echo "error connecting to database:<br>";
		echo mysqli_connect_errno();
	}

	//fetches all records from the query and returns an array with the fetched records
	function fetchAll($connection, $query){
		$data = array();

		$result = mysqli_query($connection, $query);
		if ($result == NULL){
			return NULL;
		}

		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}

		return $data;
	}

	//fetchRecord()
	//-------------
	//Fetches the first record obtained from the query.
	//Either returns the result of the query, or null if no data was received. 
	function fetchRecord($connection, $query){
		$result = mysqli_query($connection, $query);
		if ($result == NULL){
			return NULL;
		}
		return mysqli_fetch_assoc($result);
	}

?>