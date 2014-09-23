<?php 
require_once("basic1connection.php");

if(isset($_POST['content']))
{
	$query = "INSERT INTO posts (description, created_at, updated_at) VALUES ('{$_POST['content']}', NOW(), NOW())";
	mysql_query($query);
}

$fetch_query = "SELECT * FROM posts";
$all_notes = fetch_all($fetch_query);

$html = "";

foreach ($all_notes as $note) 
{
	$html .= "<div class='post'>" . $note['description'] . "</div>";
}


echo json_encode($html);



?>