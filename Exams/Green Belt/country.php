<?php 
session_start();
require_once("countryconnection.php");
$query = "SELECT * FROM Country";
$countries = fetch_all($query);
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Green Belt Exam</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/tablesorter/2.10.8/jquery.metadata.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/tablesorter/2.10.8/jquery.tablesorter.js"></script>
	<script type="text/javascript">	
		$(document).ready(function()
		{ 
        $("#table").tablesorter(); 
    	}); 
	</script>
</head>
<body>
	<div id="Container">
		<form action="countryprocess.php" method="post">
			<label>Select a Country: </label>
			<select name="countries">
<?php 			foreach($countries as $country)
				{ ?>
					<option value="<?= $country['Name'] ?>"><?= $country['Name'] ?></option>
<?php			} ?>
			</select>
			<input type="submit" value="Show Data">
		</form>
		<table id='table' class='tablesorter'>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>District</th>
					<th>Population</th>
				</tr>
			</thead>
			<tbody>
				
		
<?php   if(isset($_SESSION['City']))
		{ 
		
			foreach ($_SESSION['City'] as $key) 
			{ ?>

			<tr>
					<td><?= $key['ID']?></td>
					<td><?= $key['Name']?></td>
					<td><?= $key['District']?></td>
					<td><?= $key['Population']?></td>
			</tr>
				
				
<?php	}} ?>
		</tbody>	
		</table>
		<?php 
		if(isset($_SESSION['Language']))
		{
			foreach ($_SESSION['Language'] as $key)
			{
				echo $key['Language'];
				echo '<br>';
			}
		}
		?>
</body>
</html>

<?php 
unset($_SESSION['Country']);
unset($_SESSION['Language']);
unset($_SESSION['City']);
?>