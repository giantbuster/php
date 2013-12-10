<?php 
	 
	// Jefferson Lam
	// 12-9-13 
	// PHP with MySQL : Basic Assignment 3 : Newsletters

	session_start();
	require('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PHP with MySQL : Basic Assignment 3 : Newsletters</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="global.css">
</head>

<body>
<div class="container">
	<div class="register">
		<h1>Register for our Newsletter!</h1>
		<?php
			if (isset($_SESSION['error'])){
				foreach ($_SESSION['error'] as $error){
					echo '<p class="error">'.$error.'</p>';
				}
			}
		?>
		<form action="process.php" method="post" enctype='multipart/form-data'>
			<input type="hidden" name="action" value="registration">
			<div class="account-info">
				<div class="row">
					<div class="col field-label">
						<label>First Name</label>
					</div>
					<div class="col">
						<input type="text" name="first_name">
					</div>
				</div>

				<div class="row">
					<div class="col field-label">
						<label>Last Name</label>
					</div>
					<div class="col">
						<input type="text" name="last_name">
					</div>
				</div>

				<div class="row">
					<div class="col field-label">
						<label>Email</label>
					</div>
					<div class="col">
						<input type="text" name="email">
					</div>
				</div>

				<div class="row">
					<div class="col field-label">
						<label>Upload Picture</label>
					</div>
					<div class="col">
						<input type="file" name="file">
					</div>
				</div>
			</div> <!-- /.account-info -->
			<div class="topics">
				<?php
					$query = 'SELECT * FROM topics';
					$result = fetchAll($connection, $query);
					for ($i=0; $i < count($result); $i++) { 
				?> 		
						<div class="item">
							  <input type="checkbox" name="topic[]" value="<?= $i ?>">
							  <label><?= $result[$i]["name"] ?></label>
						</div>
				<?php
					}
				?>
			</div><!-- /.topics -->
			<input type="Submit" value="Register">
		</form> 
	</div> <!-- /.register -->
	<div class="data">
		<h3>See what other students are interested in!</h3>
		<?php
			$query = 'SELECT * FROM topics';
			$topicList = fetchAll($connection, $query);
			foreach ($topicList as $value){
				$query = 'SELECT students.first_name, students.last_name, students.email, students.pic_url
						  FROM students
						  JOIN topics_has_students ON topics_has_students.students_id = students.id
						  JOIN topics ON topics.id = topics_has_students.topics_id
						  WHERE (topics.id = '.$value['id'].')';
				$studentList = fetchAll($connection, $query);

				if (empty($studentList)) continue;
				echo '<div class="topic-list">';
				echo '<h4>'.$value["name"].'</h4>';

				foreach ($studentList as $student){
					echo '<div class="subscribers">
						  	<img src="' . $student['pic_url'] . '">
						  	<h5>' . $student['first_name'] . ' ' . $student['last_name'] . '</h5>
						  	<h5>' . $student['email'] . '</h5>
						  </div> <!-- /.subscribers -->';
				}
			echo '</div><!-- /.topic-list -->';
			}
		?>
	</div><!-- /.data -->
</div>
</body>
</html>

<?php
	$_SESSION = array();
?>