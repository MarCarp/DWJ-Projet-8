<?php
require_once 'Model/Post.php';
require_once 'Model/Comment.php';

class Controler
{
	public $_postMng, $_comMng, $_vueSide;
	
	public function __construct()
	{
		$this->_postMng = new Post();
		$this->_comMng = new Comment();
	}
	//APPELLE LA VUE PAR DÉFAUT : ACCUEIL
	public function home($page)
	{
		$title = 'testIndex';
		$posts = $this->_postMng->getPosts($page);
		$lastPosts = $posts;
		$contentSide = $this->side();
		$pages = $this->pagination($page);
		extract($pages);
		require 'Vue/vueHome.php';
		require 'Vue/template.php';
		//$this->callVue('Home');
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
		$title = 'testAbout';
		$this->callVue('About');
	}
	public function contact()
	{
		$title = 'testContact';
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
		$this->callVue('Contact');
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
	public function side()
	{
		$topPosts = $this->_postMng->lastPosts();
		$topComs = $this->_comMng->lastComments();
		require 'Vue/vueSide.php';
		return $contentSide;
	}
	public function callVue($vue)
	{
		$contentSide = $this->side();
		require 'Vue/vue' . $vue .'.php';
		require 'Vue/template.php';
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