<?php
	session_start();
	$stone = array('Garnet', 'Amethyst', 'Aquamarine', 'Diamond', 'Emerald', 'Moonstone', 
		'Ruby', 'Peridot', 'Sapphire', 'Opal', 'Citrine', 'Topaz'
	);
	if(isset($_POST['action']) && $_POST['action'] == 'monthForm'){
		$_SESSION['month'] = $_POST['month'];
		$month = $_SESSION['month'];
		$quarter = '';
		$season = '';

		if ($month >= 0 && $month < 3){
			$quarter = '1st';
		} else if ($month >= 3 && $month < 6){
			$quarter = '2nd';
		} else if ($month >= 6 && $month < 9){
			$quarter = '3rd';
		} else {
			$quarter = '4th';
		}

		if ($month == 12 || ($month >=0 && $month < 3)){
			$season = 'Winter';
		} else if ($month >=3 && $month < 6){
			$season = 'Spring';
		} else if ($month >=6 && $month < 9){
			$season = 'Summer';
		} else {
			$season = 'Fall';
		}


		$_SESSION['result']['Quarter'] = $quarter;
		$_SESSION['result']['Season'] = $season;;
		$_SESSION['result']['Birthstone'] = $stone[$_SESSION['month']];
	}
	// var_dump($_SESSION);
	header('Location: index.php');
	exit;
?>