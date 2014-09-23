<?php
include("connection.php");
if(isset($_POST['action']) and $_POST['action'] == "get_polls")
{
	update_results();
}
elseif(isset($_POST['action']) and $_POST['action'] == "update") 
{
	update_poll();
}
elseif(isset($_POST['action']) and $_POST['action'] == "create") 
{
	create_poll();
}
function create_poll()
{
	$query = "INSERT INTO polls(title, description, option1, option2, option3, option4, result1, result2, result3, result4) VALUES('{$_POST['title']}', '{$_POST['description']}', '{$_POST['option1']}','{$_POST['option2']}','{$_POST['option3']}','{$_POST['option4']}', 0, 0, 0, 0)";
	// echo $query;
	mysql_query($query);
	header("Location: index.php");
}

function update_poll()
{
	$query = "UPDATE polls SET {$_SESSION['selected']} = {$_POST['selected']} + 1 WHERE id = {$_POST['poll']}";
	mysql_query($query);
	echo json_encode("Test");
}

function update_results($update_array)
{
	$query = "SELECT * FROM poll";
	$results = fetch_all($query);
	$data['html'] = "";

	if(!empty($results))
	{
		foreach($results as $item)
		{ 
			$data['html'] = "<div class='poll'>
								<div class='innerpoll'>
									<p>{$item['title']}</p>
									<p>{$item['description']}</p>
									<form action='process.php' method='post' class='form-horizontal poll_update'>
										<input type='hidden' name='action' value='update'>
										<input type='hidden' name='poll' value='{$item['id']}'>";
		 	if($item['option1'] != '')
		 		$data['html'] .= "<label class='radio'><input type='radio' value='result1' name='selected'>{$item['option1']}</label>";
 			if($item['option2'] != '')
 				$data['html'] .= "<label class='radio'><input type='radio' value='result2' name='selected'>{$item['option2']}</label>";
 			if($item['option3'] != '')
 				$data['html'] .= "<label class='radio'><input type='radio' value='result3' name='selected'>{$item['option3']}</label>";
 			if($item['option4'] != '')
 				$data['html'] .= "<label class='radio'><input type='radio' value='result4' name='selected'>{$item['option4']}</label>";

			$data['html'] .= "<input type='submit' value='Submit' class='btn btn-primary'>
									</form>
								</div>
								<p>Results</p>";				
			$total = (float)($item['result1'] + $item['result2'] + $item['result3'] + $item['result4']);
			var_dump($total);
			if($total == 0) 
				$total = 1;

			if($item['option1'] != '')
				$data['html'] .= "<p>" . number_format(($item['result1'] / $total) * 100, 2, '.', '') . "% {$item['option1']}";
			if($item['option2'] != '')
				$data['html'] .= "<p>" . number_format(($item['result2'] / $total) * 100, 2, '.', '') . "% {$item['option2']}";
			if($item['option3'] != '')
				$data['html'] .= "<p>" . number_format(($item['result3'] / $total) * 100, 2, '.', '') . "% {$item['option3']}";
			if($item['option4'] != '')
				$data['html'] .= "<p>" . number_format(($item['result4'] / $total) * 100, 2, '.', '') . "% {$item['option4']}";
			$data['html'] .= "</div>";
		}
	}
	echo json_encode($data);
}