<?php

namespace Projet8\Controler;

require_once 'Model/Admin.php';
require_once 'Model/Post.php';
require_once 'Vue/Vue.php';


use \Projet8\Model\Post;
use \Projet8\Vue\Vue;

class Admin
{
	private $_adminMng, $_postMng;

	public function __construct()
	{
		 $this->_adminMng = new \Projet8\Model\Admin();
		 $this->_postMng = new Post();
	}
	public function preview()
	{
		if(isset($_SESSION['admin']))
		{
			$post['title'] = $_POST['title'];
			$post['image'] = $this->checkImg();
			$post['content'] = $_POST['content'];
			$vue = new Vue('Preview');
			$vue->generate(array('post'=>$post));
		}
		else{header('Location: login.php');}
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
		else{header('Location: login.php');}
	}
	//ENREGISTRER LES MODIFICATIONS D'UN BILLET
	public function update()
	{
		if(isset($_SESSION['admin']))
		{
			if(isset($_POST['id']))
			{
				$id = $_POST['id'];
				$title = $_POST['title'];
				$image = $this->checkImg();
				$content = $_POST['content'];
				$this->_adminMng->updatePost($title,$content,$image,$id);
				header('Location: index.php');
			}
			else{throw new Exception("Identifiant de post introuvable");}
		}
		else{header('Location: login.php');}
	}		
	public function create()
	{
		if(isset($_SESSION['admin']))
		{
			
			$vue = new Vue('Create');
			$vue->generate();
		}		
		else{header('Location: login.php');}
	}
	public function addNew()
	{
		if(isset($_SESSION['admin']))
		{
			if(isset($_POST['createContent']) && isset($_POST['createTitle']))
			{
				$title = $_POST['title'];
				$content = $_POST['content'];
				$image = $this->checkImg();
				$this->_adminMng->createPost($title, $content, $image);
				header('Location: index.php');
			}
		}		
		else{header('Location: login.php');}
	}
	private function checkImg()
	{
		if(isset($_FILES['image']))
		{
			if($_FILES['image']['error']==0)
			{
				if($_FILES['image']['size']<=3000000)
				{
					$fileInfo = pathinfo($_FILES['image']['name']);
					$extension = $fileInfo['extension'];
					$extension_allowed = array('jpg', 'jpeg', 'gif', 'png');
					if(in_array($extension,$extension_allowed))
					{
						$nameImg = basename($_FILES['image']['name']);
						move_uploaded_file($_FILES['image']['tmp_name'], 'Content/Images/' . $nameImg);
						return $nameImg;
					}
					else{throw new Exception("Type de fichier non autorisé (.jpg, .jpeg, .gif et .png uniquement)");}
				}
				else{throw new Exception("Fichier trop volumineux (max 3Mo)");}
			}
			else{throw new Exception("Erreur lors du transfert");}
		}
		elseif(isset($_POST['prevImage']))
		{
			if($_POST['prevImage']!=null)
			{
				return $_POST['prevImage'];
			}
		}
		else 
		{
			return 'Default.jpg';
		}
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
		else{header('Location: login.php');}
	}
}