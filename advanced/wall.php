<?php
	session_start();
	require('connection.php');

	if (!isset($_SESSION['user_id'])){
		header('Location: login.php');
		exit;
	}

	function timestamp($time){
		$seconds = time() - $time;
		$minutes = (int) ($seconds/60);
		$hours = (int) ($minutes/60);
		$days = (int) ($hours/24);
		$result = '';
		if ($seconds < 1){
			$result = 'just now';
		} else if ($minutes<1){
			$result = $seconds.' seconds ago';
		} else if ($minutes == 1){
			$result = 'about a minute ago';
		} else if ($hours < 1){
			$result = $minutes.' minutes ago';
		} else if ($hours == 1){
			$result = 'about an hour ago';
		} else if ($hours < 24){
			$result = $hours.' hours ago';
		} else if (date('Y', $time) == date('Y')){
			$result = date('F d', $time);
		} else {
			$result = date('F d, Y', $time);
		}
		return $result;
	}

	function wasHalfHourAgo($time){
		$seconds = time() - $time;
		$minutes = (int) ($seconds/60);
		return ($minutes < 30);
	}

	function createDeleteBtn($id, $content){
		echo '
			<div class="delete-btn">
				<form action="process.php" method="post">
					<input type="hidden" name="action" value="delete_'.$content.'">
					<input type="hidden" name="msg_id" value="'.$id.'">
					<input type="submit" value="Delete">
				</form>
			</div>
			';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PHP with MySQL : Advanced : Wall</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="global.css">
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div class="container">
	<div class="header">
		<div class="top">
			<div class="left">
				<h2>Coding Dojo Wall</h2>
			</div>
			<div class="right">
				<div class="welcome">
					<?php
						$query = "SELECT first_name FROM users
								  WHERE id = ".$_SESSION['user_id'];
						$result = fetchRecord($connection, $query);
					?>
					<h4>Welcome <?= $result['first_name']?> </h4>
				</div>
				<div class="logout">
					<form action="process.php" method="post">
						<input type="hidden" name="action" value="logout">
						<input type="submit" value="log off">
					</form>
				</div>
			</div>
		</div>
		<div class="bottom">
			<div class="sections">
				<h3><a href="profile.php">Profile</a></h3>
				<h3><a href="wall.php">Wall</a></h3>
			</div>
		</div>
	</div> <!-- /.header -->
	<div class="content wall-content">
		<div class="post-msg">
			<h3>Post a message</h3>
			<div class="msg-textbox">
				<form action="process.php" method="post">
					<input type="hidden" name="action" value="message">
					<textarea id="msg" name="wall_msg" placeholder="Write a message..."></textarea>
					<div class="submit-msg">
						<input type="submit" value="Post message">
					</div>
				</form>
			</div> <!-- msg-textbox -->
		</div> <!-- post-msg -->
		<div class="wall-posts">
			<?php
				$query = "SELECT CONCAT_WS(' ', users.first_name, users.last_name) AS author, 
								 users.id AS user_id, 
								 messages.message, 
								 messages.created_at, 
								 messages.id AS messages_id
						  FROM messages
						  JOIN users ON messages.users_id = users.id
						  ORDER BY created_at DESC";
				$result = fetchAll($connection, $query);
				foreach ($result as $message){
			?>		
					<div class="wall-post">
						<div class="main-msg">
							<h5><?= $message['author'].
							        ' - <span class="timestamp">'.
							        timestamp(strtotime($message['created_at'])) 
							        ?></span></h5>
							<?php
								if ($message['user_id'] == $_SESSION['user_id']){
									createDeleteBtn($message['messages_id'], 'message');
								}
							?>
							<div class="msg-content"> 
								<?= stripslashes($message['message']) ?> 
							</div>
						</div>
						<div class="comments">
							<div class="first-comment-arrow"></div>
							<?php
								$query = "SELECT CONCAT_WS(' ', users.first_name, users.last_name) AS author, 
												 comments.users_id AS user_id,
												 comments.comment, 
												 comments.created_at, 
												 comments.id AS comments_id
											FROM comments
											JOIN messages ON messages.id = comments.messages_id
											JOIN users ON users.id = comments.users_id
											WHERE messages.id = ".$message['messages_id']."
											ORDER BY created_at ASC";
								$result = fetchAll($connection, $query);
								for ($i=0; $i < count($result); $i++) { 
							?>
									<div class="msg-comment">
										<h5><?= $result[$i]['author'].
											    ' - <span class="timestamp">'.
											    timestamp(strtotime($result[$i]['created_at'])) 
											    ?></h5>
									    <?php
											if ($result[$i]['user_id'] == $_SESSION['user_id']){
												createDeleteBtn($result[$i]['comments_id'], 'comment');
											}
										?>
										<div class="comment-content"> 
											<?= stripslashes($result[$i]['comment']) ?> 
										</div>
									</div>
							<?php
								}
							?>
								<div class="post-comment">
									<form action="process.php" method="post">
										<input type="hidden" name="action" value="comment">
										<input type="hidden" name="msg_id" value="<?= $message['messages_id'] ?>">
										<textarea class="comment" name="msg_comment" placeholder="Write a comment..."></textarea>
										<div class="submit-comment">
											<input type="submit" value="Post comment">
										</div>
									</form>
								</div> <!-- post-comment -->
						</div><!-- comments -->
					</div> <!-- wall-post -->
			<?php
				} 
			?>
		</div><!-- wall-posts -->
	</div> <!-- content -->
	<div class="footer">
		<p>Special thanks to <a href="http://codingdojo.com/">Coding Dojo</a></p>
	</div>
</div> <!-- container --> 
</body>
</html>