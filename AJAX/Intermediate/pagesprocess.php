<?php
require('pagesconnection.php');
$page = ($_POST['page'] * 10 - 10);
$from = $_POST['from'] == "" ? '1800-01-01' : $_POST['from'];
$to = $_POST['to'] == "" ? '2800-01-01' : $_POST['to'];

$query = "SELECT * FROM leads WHERE (first_name LIKE '{$_POST['name']}%' OR last_name LIKE '{$_POST['name']}%') AND (registered_datetime BETWEEN '$from' AND '$to') LIMIT $page, 10";
$pquery = "SELECT COUNT(*) as count FROM leads WHERE (first_name LIKE '{$_POST['name']}%' OR last_name LIKE '{$_POST['name']}%') AND (registered_datetime BETWEEN '$from' AND '$to')";

$people = fetch_all($query);
$pages = fetch_record($pquery);

$buttons = "";

$count = ceil($pages['count']/10);
for($i = 1; $i <= $count; $i++)
{
	$buttons .= "<button id='$i'>$i</button>";
}

$html = "";
foreach($people as $person)
{
	$html .= "<tr><td>{$person['leads_id']}</td>
				<td>{$person['first_name']}</td>
				<td>{$person['last_name']}</td>
				<td>{$person['registered_datetime']}</td>
				<td>{$person['email']}</td></tr>";
}
$data = array();
$data['html'] = $html;
$data['buttons'] = $buttons;

echo json_encode($data);

?>