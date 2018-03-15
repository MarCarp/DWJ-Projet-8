<?php
require_once 'Model/Post.php';
require_once 'Model/Comment.php';
require_once 'Vue/Vue.php';

class Controler
{
	public $_postMng, $_comMng;

	public function __construct()
	{
		$this->_postMng = new Post();
		$this->_comMng = new Comment();
	}
	//APPELLE LA VUE PAR DÉFAUT : ACCUEIL
	public function home($page)
	{
		$posts = $this->_postMng->getPosts($page);
		$pages = $this->pagination($page);
		$contentSide = $this->side();
		$posts;
		$pages;
		$contentSide;
		$data = array('posts'=>$posts,'pages'=>$pages,'contentSide'=>$contentSide);
		$vue = new Vue('Home');
		$vue->generate($data);
	}
	private function side()
	{
		$topPosts = $this->_postMng->lastPosts();
		$topComs = $this->_comMng->lastComments();
		$tops = array('topPosts'=>$topPosts,'topComs'=>$topComs);
		$vue = new Vue('Side');
		return $vue->generate($tops);
	}
	public function admin()
	{
		if(isset($_SESSION['admin']))
		{
			$this->home(0);
		}
		elseif(isset($_POST['adminId'])&&isset($_POST['adminPass']))
		{
			require 'Controler/controlerAdmin.php';
		}
		else
		{
			require 'vue/vuePassword.php';
		}
	}
	public function about()
	{
		$vue = new Vue("About");
		$vue->generate();
	}
	public function contact()
	{
		if(isset($_POST['message']))
		{
			$to      = 'jean.forteroche@ecrivain.com';
			$subject = 'Contact';
			$message = $_POST['message'];
			$headers = 'From: jean.forteroche@ecrivain.com' . "\r\n" .
			'Reply-To: jean.forteroche@ecrivain.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			mail($to, $subject, $message, $headers);
		}
		$vue = new Vue("Contact");
		$vue->generate();
	}
	public function post()
	{
		//Vérifie la variable $_GET dans le cas d'un ajout de commentaire
		if(isset($_GET['addComment']))
		{
			$postId = $_GET['id'];
			$comAuth = $_POST['author'];
			$comCont = $_POST['content'];
			$comMng->addComment($postId, $comAuth,$comCont);
		}				
		$title = 'testPost';
		$postId = $_GET['id'];
		$post = $this->_postMng->getPost($postId);
		$coms = $this->_comMng->getComments($postId);

		$contentSide = $this->side();
		require 'Vue/vuePost.php';
		require 'Vue/template.php';

		//$this->callVue('post');
	}
	public function pagination($page)
	{
		$pages = [];
		$posts = $this->_postMng->countPosts();

		$pages['pActu'] = (1+(int)$page);
		$pages['pTotal'] = ($posts/5)-1;
		$pages['pPrec'] = $page-1;
		$pages['pSuiv'] = $page+1;
		if($page <= 0)
		{
			$pages['pPrec'] = 0;
		}
		elseif($page >= $pages['pTotal'])
		{
			$pages['pSuiv'] = $pages['pTotal'];
		}
		
		return $pages;
	}
}