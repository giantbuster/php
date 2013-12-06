<?php
	session_start();

	//Fibonacci function: Calculates fibonacci sequence and returns an array of the series
	function fibonacci($first, $second, $series){
		$fibonacci = array(intval($first), intval($second));
		for ($i = 0; $i < $series - 2; $i++){
			$curr = $first + $second;
			$fibonacci[] = $curr;
			$first = $second;
			$second = $curr;
		}
		return $fibonacci;
	}

	//Check what form it is
	if(isset($_POST['action']) && $_POST['action'] == 'fibonacciForm'){
		$error = false;

		//Check for valid input
		foreach ($_POST as $key => $value){
			if (empty($value) || !is_numeric($value) && $_POST['action'] != 'fibonacciForm'){
				$_SESSION['error'][$key] = "Please enter a number for ".$key.'';
				$error = true;
			}
		}

		//If input is valid, calculate fibonacci sequence
		if (!$error) $_SESSION['fib'] = fibonacci($_POST['first'], $_POST['second'], $_POST['series']);
	}
	
	header('Location: index.php');
?>