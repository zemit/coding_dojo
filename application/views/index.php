<!DOCTYPE html>
<html>
<head>
	<title>Ninja Gold w/CodeIgnitor</title>
</head>
<body>
	<h3>Your Gold: <?echo $gold?></h3>


	<form method="POST" action='/process_money'>
		Farm - (Earn 10 ~ 20 gold)
		<input type="hidden" name="building" value="farm">
		<button>Find Gold!</button>
	</form>
	<form method="POST" action='/process_money'>
		Farm - (Earn 5 ~ 10 gold)
		<input type="hidden" name="building" value="cave">
		<button>Find Gold!</button>
	</form>
	<form method="POST" action='/process_money'>
		Farm - (Earn 2 ~ 5 gold)
		<input type="hidden" name="building" value="house">
		<button>Find Gold!</button>
	</form>
	<form method="POST" action='/process_money'>
		Farm - (Earn/Lose 0 ~ 50 gold)
		<input type="hidden" name="building" value="casino">
		<button>Find Gold!</button>
	</form>

<div id="activities">
	<?php
		foreach($log as $message) {
		?>
			<p><?=$message?>
		<?
		}
	?>
</div>

</body>
</html>