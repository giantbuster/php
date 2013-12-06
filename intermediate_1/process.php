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
		return rand(-50, 50);
	}


	if(isset($_POST['action'])){
		switch ($_POST['action']){
			case 'farm':
				$_SESSION['feedback']['gold'][] = farm();
				$_SESSION['feedback']['place'][] = 'farm';
				break;
			case 'cave':
				$_SESSION['feedback']['gold'][] = cave();
				$_SESSION['feedback']['place'][] = 'cave';
				break;
			case 'house':
				$_SESSION['feedback']['gold'][] = house();
				$_SESSION['feedback']['place'][] = 'house';
				break;
			case 'casino':
				$_SESSION['feedback']['gold'][] = casino();
				$_SESSION['feedback']['place'][] = 'casino';
				break;
			case 'reset':
				$_SESSION['reset'] = true;
				header('Location: index.php');
			}
		$date = new DateTime('now', new DateTimeZone('US/Pacific'));
 		$_SESSION['feedback']['time'][] = $date->format('F dS Y H:i a');
	}

	header('Location: index.php');
	exit;
?>