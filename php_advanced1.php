<!-- 
	Jefferson Lam
	12-3-13
	PHP Advanced 1
-->

<?php
	function create_users_table($users){
		//Create initial label row
		echo '<table>';
		echo '<tbody>';
		echo '<tr>';
		td('<strong>User #</strong>');
		td('<strong>First Name</strong>');
		td('<strong>Last Name</strong>');
		td('<strong>Full Name</strong>');
		td('<strong>Full Name in upper case</strong>');
		td('<strong>Length of name</strong>');
		echo '</tr>';

		//Generate rows of data
		$userNumber = 1;
		$highlight = '';
		foreach ($users as $user){
			//Check if row should be highlighted
			if ($userNumber%5==0) $highlight = 'class="highlight"';
			else $highlight = '';
			echo '<tr '.$highlight.'>';

			//Create cells
			td('<strong>'.$userNumber++.'</strong>');
			td($user['first_name']);
			td($user['last_name']);
			td($user['first_name'].' '.$user['last_name']);
			td(strtoupper($user['first_name'].' '.$user['last_name']));

			$length = strlen($user['first_name']) + strlen($user['last_name']);
			td($length);
		}

		echo '</tbody>';
		echo '</table>';
	}
	function td($data){
		echo '<td>'.$data.'</td>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Advanced 1</title>
	<meta charset='UTF-8'>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<style>
		*{
			font-family: arial;
		}
		td{
			border: 1px solid #ddd;
			vertical-align: top;
			padding: 5px;
			margin: 0px;
		}
		table{
			width: auto;
			padding: 5px;
			margin: 0px;
			border-spacing: 0;
			border-collapse: collapse;
		}
		.highlight{
			color: white;
			background: black;
		}
	</style>
</head>
<body>
<div class="container">
	<?php 
		$users = array( 
		    array('first_name' => 'Michael', 'last_name' => ' Choi '),
		    array('first_name' => 'John', 'last_name' => 'Supsupin'),
		    array('first_name' => 'Mark', 'last_name' => ' Guillen'),
		    array('first_name' => 'KBZ', 'last_name' => 'Tonel'),
		    array('first_name' => 'KBA', 'last_name' => 'Tonel'),
		    array('first_name' => 'KBB', 'last_name' => 'Tonel'),
		    array('first_name' => 'KBC', 'last_name' => 'Tonel'),
		    array('first_name' => 'KBD', 'last_name' => 'Tonel'),
		    array('first_name' => 'KBE', 'last_name' => 'Tonel'),
		    array('first_name' => 'KBF', 'last_name' => 'Tonel'),
		    array('first_name' => 'KBG', 'last_name' => 'Tonel'),
		    array('first_name' => 'KBH', 'last_name' => 'Tonel'),
		    array('first_name' => 'KBI', 'last_name' => 'Tonel'),
		    array('first_name' => 'KBJ', 'last_name' => 'Tonel'),
		    array('first_name' => 'KBK', 'last_name' => 'Tonel'),
		    array('first_name' => 'KBL', 'last_name' => 'Tonel'),
		    array('first_name' => 'KBM', 'last_name' => 'Tonel')   
		);
		create_users_table($users);
	?>
</div>
</body>
</html>