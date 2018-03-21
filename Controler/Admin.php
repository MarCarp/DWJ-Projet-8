<?php

namespace Projet8\Controler;

require_once 'Controler/Image.php';
require_once 'Model/Admin.php';
require_once 'Model/Post.php';
require_once 'Vue/Vue.php';

use \Projet8\Controler\Image;
use \Projet8\Model\Post;
use \Projet8\Vue\Vue;

class Admin
{
	private $_adminMng, $_postMng, $_imageMng;

	public function __construct()
	{
		 $this->_adminMng = new \Projet8\Model\Admin();
		 $this->_postMng = new Post();
		 $this->_imageMng = new Image();
	}
	public function preview()
	{
		if(isset($_SESSION['admin']))
		{
			$post['title'] = $_POST['title'];
			$post['image'] = $this->_imageMng->check();
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
				$image = $this->_imageMng->check();
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
			if(isset($_POST['content']) && isset($_POST['title']))
			{
				$title = $_POST['title'];
				$content = $_POST['content'];
				$image = $this->_imageMng->check();
				$this->_adminMng->createPost($title, $content, $image);
				header('Location: index.php');
			}
		}		
		else{header('Location: login.php');}
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
	private function alert()
	{
		echo '<script>alert("Okay");</script>';
	}
}