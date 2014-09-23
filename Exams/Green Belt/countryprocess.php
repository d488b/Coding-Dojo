<?php 
session_start();
require_once("countryconnection.php");


if(isset($_POST['countries']))
{	
	$query = "SELECT City.ID, City.Name, City.District, City.Population FROM City LEFT JOIN Country ON City.CountryCode=Country.Code WHERE Country.Name = '{$_POST['countries']}'";
	$query1 = "SELECT * FROM CountryLanguage LEFT JOIN Country ON CountryLanguage.CountryCode=Country.Code WHERE Country.Name = '{$_POST['countries']}'";
	$_SESSION['City'] = fetch_all($query);
	$_SESSION['Language'] = fetch_all($query1);
	header('Location: country.php');
}
// var_dump($_SESSION['Country']);

