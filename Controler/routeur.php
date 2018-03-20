<?php
require_once 'Controler/Controler.php';
require_once 'Controler/Admin.php';

class Routeur
{
	private $_controler, $_admin;

	public function __construct()
	{
		$this->_controler = new \Projet8\Controler\Controler();
		$this->_admin = new \Projet8\Controler\Admin();
	}

	public function RouteRequest()
	{
		try
		{
			if(isset($_GET['action']))
			{
				switch($_GET['action'])
				{
					case 'modify':
						$this->_admin->modify();
						break;
					case 'create':
						$this->_admin->create();
						break;
					case 'addNew':
						$this->_admin->addNew();
						break;
					case 'delete':
						$this->_admin->delete();
						break;
					case 'verify':
						$this->_admin->verify();
						break;
					case 'login':
						$this->_admin->login();
						break;
					case 'deco':
						$this->_admin->deco();
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
						$this->_controler->send();
						break;
					case 'addComment':
						$this->_controler->addComment();
						break;
					default:
						throw new Exception('Variable ' . $_GET['action'] . ' inexistante');						
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