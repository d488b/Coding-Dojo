<?php

class Car
{
	public $price;
	public $speed;
	public $fuel;
	public $mileage;
	public $tax;

	function __construct($price,$speed,$fuel,$mileage)
	{
		$this->price = $price;
		$this->speed = $speed;
		$this->fuel = $fuel;
		$this->mileage = $mileage;
		$this->tax = $price > 10000 ? .15 : .12;
		$this->display_all();
	}

	public function display_all()
	{
		echo "Price: {$this->price}
			  Speed: {$this->speed}
			  Fuel: {$this->fuel}
			  Mileage: {$this->mileage}
			  Tax: {$this->tax}<br>";
	}
}

$car1 = new Car('100000', "200mph", 'Full', '191');

$car2 = new Car('9000', "120mph", 'half tank', '48000');