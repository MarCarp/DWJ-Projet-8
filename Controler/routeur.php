<?php

class Routeur
{
	private $_controler;

	public function RouteRequest()
	{
		try
		{
			require_once 'Controler/Controler.php';
			$this->_controler= new Controler();

			if(isset($_SESSION['admin']))
			{
				session_start();
			}

			if(isset($_GET['action']))
			{
				$action = $_GET['action'];
				if($action=='deco')
				{
					session_destroy();
				}
				if($action=='admin')
				{
					$this->_controler->admin();
				}
				elseif($action=='about')
				{
					$this->_controler->about();
				}
				elseif($action=='contact')
				{
					$this->_controler->contact();
				}
				elseif($action=='post')
				{
					$this->_controler->post();
				}
			}
			elseif (isset($_GET['page']))
			{
				$page = (int)$_GET['page'];
				$this->_controler->home($page);
			}
			else
			{
				$this->_controler->home(0);
			}
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
}