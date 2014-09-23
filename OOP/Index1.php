<!DOCTYPE HMTML>
<html>

<head>
<meta charset="UTF-8">
<title>OOP in PHP</title>

<?php include("class_lib.php"); ?>

</head>

<body>
<?php 
	// $stefan = new person();
	// $jimmy = new person();

	// $stefan->set_name("Stefan Mischook");
	// $jimmy->set_name("Nick Waddles");

	$stefan = new person("Stefan Mischook");
	echo "Stefan's full name: " . $stefan->get_name();
	// echo "Nick's full name: " . $jimmy->get_name();
?>

</body>

</html>