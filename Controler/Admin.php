<?php

require_once 'Model/Admin.php';

class Admin
{
	private $_adminMng;

	public function __construct()
	{
		 $this->_adminMng = new \Projet8\Model\Admin();
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
	public function delete()
	{
		if(isset($_SESSION['admin']))
		{
			if(isset($_GET['id']))
			{
				$idPost = (int)$_GET['id'];
				$this->_adminMng->deletePost($idPost);
				header('Location: index.php');
			}
			else{throw new Exception("Identifiant de post introuvable");}
		}
		else{throw new Exception("Vous n'avez pas les droits pour cette opération");}
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
				if(password_verify($userPassword, $passHash[0]))
				{
					$_SESSION['admin'] = $userPseudo;
					header('Location: index.php');
				}
				else
				{
					throw new Exception("Mot de passe Invalide");
				}
			}
			else
			{
				throw new Exception("Aucun utilisateur à ce nom");
			}
		}
	}
}