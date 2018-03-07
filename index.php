<?php

function chargerClasse($classe)
{
  require $classe . '.php'; 
}

spl_autoload_register('chargerClasse');

try
{
	$routeur = new Routeur();
	$controler = new Controler();

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
