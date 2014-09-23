<?php 
session_start();

 ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Optional 1</title>
</head>
<body>
	<div id="select">
		<form action="optionalprocess.php" method="post"> 
			<label>Choose a month: </label>
			<select name="months" id="months">
<?php			$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
				foreach($months as $month)
				{ ?>
					<option value="<?= $month ?>"><?= $month ?></option>
<?php			} ?>
			<input type="submit">
			</select>
		</form>
	</div>
	<div id="info">
<?php if(isset($_SESSION))
	  { ?>
		<p>Quarter: <?= $_SESSION['quarter'] ?></p>
		<p>Season: <?= $_SESSION['season'] ?></p>
		<p>Birthstone: <?= $_SESSION['birthstone'] ?></p>
<?php } ?>

<?php 
	unset($_SESSION);
 ?>



	</div>



</body>
</html>