<?php

class HTML_Helper
{
	public function print_table($array)
	{
		$items = array_keys($array[0]);
		$table = "<table><thead><tr>";
		foreach($items as $item)
		{
			$table .= "<th>{$item}</th>";
		}
		$table .= "</tr></thead><tbody>";
		foreach($array as $value)
		{
			$table .= "<tr>";
			foreach($value as $item)
			{
				$table .= "<td>$item</td>";
			}
			$table .= "</tr>";
		}
		$table .= "</tbody></table>";
		return $table;
	}

	public function print_select($name, $array)
	{
		$html = "<select name='$name'>";
		foreach($array as $item)
		{
			$html .= "<option value='$item'>$item</option>";
		}
		$html .= "</select>";
		return $html;
	}

}


$html = new HTML_Helper();

$items = array(
		array('First name' => "Dan", 'Last Name' => "Basinski", 'Pet' => 'Cat' , "Age" => 25),
		array('First name' => "Alex", 'Last Name' => "Johnson", 'Pet' => 'Dog', "Age" => 45),
		array('First name' => "Brea", 'Last Name' => "Borlas", 'Pet' => 'Hamster', "Age" => 5)
);

echo $html->print_table($items);

