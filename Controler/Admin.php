<?php

namespace Projet8\Controler;

require_once 'Model/Admin.php';
require_once 'Model/Post.php';
require_once 'Vue/Vue.php';


use \Projet8\Model\Post;
use \Projet8\Vue\Vue;

class Admin
{
	private $_adminMng;

	public function __construct()
	{
		 $this->_adminMng = new \Projet8\Model\Admin();
		 $this->_postMng = new Post();
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
	public function modify()
	{
		if(isset($_SESSION['admin']))
		{
			if(isset($_GET['id']))
			{
				$idPost = (int)$_GET['id'];
				$post = $this->_postMng->getPost($idPost);
				$vue = new Vue('Modify');
				$vue->generate(array('post'=>$post));
			}
			else{throw new Exception("Identifiant de post introuvable");}
		}
		else{throw new Exception("Vous n'avez pas les droits pour cette opération");}
	}
	public function create()
	{
		if(isset($_SESSION['admin']))
		{
			
			$vue = new Vue('Create');
			$vue->generate();
		}		
		else{throw new Exception("Vous n'avez pas les droits pour cette opération");}
	}
	public function addNew()
	{
		if(isset($_SESSION['admin']))
		{
			if(isset($_POST['createContent']) && isset($_POST['createTitle']))
			{
				$title = $_POST['createTitle'];
				$content = $_POST['createContent'];
				if(isset($_FILES['createImage']))
					$image = $this->checkImg();
				else
					$image = 'Default.jpg';
				$this->_adminMng->createPost($title, $content, $image);
				header('Location: index.php');
			}
		}		
		else{throw new Exception("Vous n'avez pas les droits pour cette opération");}
	}
	private function checkImg()
	{
		if($_FILES['createImages']['error']==0)
		{
			if($_FILES['createImage']['size']<=3000000)
			{
				$fileInfo = pathinfo($_FILES['createImage']['name']);
				$extension = $fileInfo['extension'];
				$extension_allowed = array('jpg', 'jpeg', 'gif', 'png');
				if(in_array($extension,$extension_allowed))
				{
					$nameImg = basename($_FILES['createImage']['name']);
					move_uploaded_file($_FILES['createImage']['tmp_name'], 'Content/Images/' . $nameImg);
					return $nameImg;
				}
				else{throw new Exception("Type de fichier non autorisé (.jpg, .jpeg, .gif et .png uniquement)");}
			}
			else{throw new Exception("Fichier trop volumineux (max 3Mo");}
		}
		else{throw new Exception("Erreur lors du transfert");}
	}
	public function delete()
	{
		if(isset($_SESSION['admin']))
		{
			if(isset($_GET['id']))
			{
				$idPost = (int)$_GET['id'];
				$this->_adminMng->deletePost($idPost);
				header('Location: index.php?page=0');
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