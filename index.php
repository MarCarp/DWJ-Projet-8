<?php

require 'Controler/Routeur.php';

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
