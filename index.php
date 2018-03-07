<?php

require 'Controler/Routeur.php';
require 'Controler/Controler.php';

try
{
	$routeur = new Routeur();

	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
		$routeur->RouteRequest($action);
	}
	else
		{$routeur->RouteRequest();}
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
