<?php


class Animal
{
	public $name;
	public $health;

	function __construct()
	{
		$this->health = 100;
		$this->name = "animal";
	}

	public function walk()
	{
		echo "Walking<br>";
		$this->health -= 1;
		return $this;
	}

	public function run()
	{
		echo "Running<br>";
		$this->health -= 5;
		return $this;
	}

	public function display_health()
	{
		echo "The " . $this->name . " has " . $this->health . " health<br>";
	}
}

$animal = new Animal();

$animal->walk()->walk()->walk()->run()->run()->display_health();


class Dog extends Animal
{
	function __construct()
	{
		$this->health = 150;
		$this->name = "Dog";
	}

	public function pet()
	{
		echo "Petting<br>";
		$this->health += 5;
		return $this;
	}
}

$dog = new Dog();

$dog->walk()->walk()->walk()->run()->run()->pet()->display_health();

class Dragon extends Animal
{
	function __construct()
	{
		$this->name = "Dragon";
		$this->health = 170;
	}

	public function fly()
	{
		echo "Flying<br>";
		$this->health -= 10;
		return $this;
	}

	public function display_health()
	{
		echo "Dragon<br>";
		parent::display_health();
	}
}

$dragon = new Dragon();

$dragon->walk()->walk()->walk()->run()->run()->fly()->fly()->display_health();