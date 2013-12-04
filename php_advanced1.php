<!-- 
	Jefferson Lam
	12-3-13
	PHP Advanced 1
-->

<?php
	function create_users_table($users){
		$table_columns = array('User #', 
			'First Name', 
			'Last Name', 
			'Full Name', 
			'Full Name in upper case', 
			'Length of name'
		);
		
		//Create initial label row
		echo '<table>';
		echo '<tbody>';
		echo '<tr>';
		foreach ($table_columns as $column){
			td_strong($column);
		}
		echo '</tr>';

		//Generate rows of data
		$userNumber = 1;
		foreach ($users as $user){
			//Highlight every 5th row
			if ($userNumber%5==0) echo '<tr class="highlight">';
			else echo '<tr>';

			$first_name = trim($user['first_name']);
			$last_name = trim($user['last_name']);
			$full_name = $first_name.' '.$last_name;

			//Create cells
			td_strong($userNumber++);
			td($first_name);
			td($last_name);
			td($full_name);
			td(strtoupper($full_name));
			td(strlen($full_name));

			echo '</tr>';
		}

		echo '</tbody>';
		echo '</table>';
	}

	function td($data){
		echo '<td>'.$data.'</td>';
	}

	function td_strong($data){
		echo '<td><strong>'.$data.'</strong></td>';
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
		    array('first_name' => 'KBA', 'last_name' => 'Toneel'),
		    array('first_name' => 'KBB', 'last_name' => 'Toneeel'),
		    array('first_name' => 'KBC', 'last_name' => 'Toneeeel'),
		    array('first_name' => 'KBD', 'last_name' => 'Tone'),
		    array('first_name' => 'KBE', 'last_name' => 'Ton'),
		    array('first_name' => 'KBF', 'last_name' => 'To'),
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