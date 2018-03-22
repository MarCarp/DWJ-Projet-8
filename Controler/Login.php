<?php

namespace Projet8\Controler;

require_once 'Model/Admin.php';

use \Projet8\Model\Admin;
use Exception;

class Login
{
	private $_adminMng;
	public function __construct()
	{
		$this->_adminMng = new Admin();
	}
	public function login()
	{
		if(isset($_SESSION['admin']))
		{
			header('Location: index.php');
		}
		else
		{
			header('Location: login.php');
		}
	}
	public function deco()
	{
		session_unset();
		header('Location: index.php');
	}
	public function verify()
	{
		$userPseudo = $_POST['adminId'];
		$userPassword = $_POST['adminPass'];

		$passReq = $this->_adminMng->idPass($userPseudo);
		$passHash = $passReq->fetch();

		if(isset($passHash))
		{
			if($passHash != null)
			{
				if(password_verify($userPassword, $passHash["ADMIN_PASS"]))
				{
					$_SESSION['admin'] = $userPseudo;
					header('Location: index.php');
				}
				else{throw new Exception("Mot de passe Invalide");}
			}
			else{throw new Exception("Aucun utilisateur à ce nom");}
		}
	}
}