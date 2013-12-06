<?php
	session_start();

	function farm(){
		return rand(10, 20);
	}

	function cave(){
		return rand(5, 10);
	}

	function house(){
		return rand(2, 5);
	}

	function casino(){
		$num = rand(1, 10);
		return ($num<=7) ? rand(0, 50) : rand(-50, 0);
	}


	if(isset($_POST['find_gold'])){
		$gold = 0;
		$place = '';
		$date = new DateTime('now', new DateTimeZone('US/Pacific'));

		switch ($_POST['find_gold']){
			case 'farm':
				$gold = farm();
				$place = 'farm';
				break;
			case 'cave':
				$gold = cave();
				$place = 'cave';
				break;
			case 'house':
				$gold = house();
				$place = 'house';
				break;
			case 'casino':
				$gold = casino();
				$place = 'casino';
				break;
		}

		$_SESSION['feedback']['gold'][] = $gold;		
		$_SESSION['feedback']['place'][] = $place;
 		$_SESSION['feedback']['time'][] = $date->format('F dS Y H:i a');

		$_SESSION['feedback']['total'] += $gold;
	}

	if (isset($_POST['reset'])) $_SESSION = array();

	header('Location: index.php');
	exit;
?>