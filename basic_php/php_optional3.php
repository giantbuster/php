<!-- 
	Jefferson Lam
	12-3-13
	PHP Optional 3
-->

<?php
	function replace_love($word){
		$quotations = array("Love is patient and kind. Love is not jealous or boastful or proud or rude.",
			"Love does not demand its own way.",
			"Love is not irritable, and it keeps no record of being wronged.",
			"Love does not rejoice about injustice but rejoices whenever the truth wins out.",
			"Love never gives up, never loses faith, is always hopeful, and endures through every circumstance."
		);
		$quotations = str_replace('Love', $word, $quotations);
		foreach ($quotations as $phrase){
			echo '<p>'.$phrase.'</p>';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Optional 3</title>
	<meta charset='UTF-8'>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<style>
		.container{
			margin: auto;
			font-family: arial;
			display: block;
			width: 500px;
			margin-top: 200px;
		}
		.quotation{
			color: #777;
			font-style: italic;
		}

	</style>
</head>
<body>
<div class="container">
	<div class="quotation">
		<?php
			replace_love("Michael Choi");
		?>
	</div>
</div>
</body>
</html>