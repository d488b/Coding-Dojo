<?php 
class Bike {
	var $price;
	var $max_speed;
	var $miles;

	function __construct($price, $max_speed)
	{
		$this->price = $price;
		$this->max_speed = $max_speed;
		$this->miles = 0;
	}

	function display_info()
	{
		echo "The bike cost is ${$this->price}, has a max speed of {$this->max_speed} and has {$this->miles} miles.<br>";
	}

	function drive()
	{
		echo "Driving<br>";
		$this->miles += 10;
		return $this;
	}

	function reverse()
	{
		echo "Reversing<br>";
		$this->miles = $this->miles - 5 < 0 ? 0 : $this->miles - 5;
		return $this;
	}
}
$bike1 = new Bike(100, "20mph");

echo $bike1->price;

$bike1->drive()->drive()->drive()->reverse()->display_info();

$bike2 = new Bike(200, "50mph");

$bike2->drive()->drive()->reverse()->reverse()->display_info();

$bike3 = new Bike(300, "90mph");

$bike3->reverse()->reverse()->reverse()->display_info();




?>