<?php 
require("notesconnection.php");

if(isset($_POST['description']) && isset($_POST['title']))
{
	$query = "INSERT INTO notes (title, description, created_at, updated_at) VALUES ('{$_POST['title']}', '{$_POST['description']}', NOW(), NOW())";
	mysql_query($query);
	$last_note_id = mysql_insert_id();
	$html = "<div class='post'><p>" . $_POST['title'] . "</p>" . $_POST['description'] . "</div>";
}


echo json_encode($html);






?>