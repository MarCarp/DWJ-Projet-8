<?php
require_once 'Controler/Controler.php';

class Routeur
{
	private $_controler;

	public function __construct()
	{
		$this->_controler= new Controler();
	}

	public function RouteRequest()
	{
		try
		{
			if(isset($_GET['action']))
			{
				$action = $_GET['action'];

				switch($action)
				{
					case 'admin':
						$this->_controler->admin();
						break;
					case 'about':
						$this->_controler->about();
						break;
					case 'contact':
						$this->_controler->contact();
						break;
					case 'post':
						$this->_controler->post();
						break;
					case 'send':
						$this->_controler->sendContact();
						break;
					case 'addComment':
						$this->_controler->sendComment();
						break;
					default:
						throw new Exception("Erreur : $action innexistante");						
				}
			}
			else
			{
				if(isset($_GET['page']))
				{
					$page = (int)$_GET['page'];
					$this->_controler->home($page);
				}
				else
					$this->_controler->home();
			}
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
}