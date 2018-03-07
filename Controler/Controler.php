<?php
class Controler
{
	private $_postMng, $_comMng;
	public function __construct()
	{
		$this->_postMng = new Post();
		$this->_comMng = new Comment();
	}
	//APPELLE LA VUE PAR DÉFAUT : ACCUEIL
	public function home($page=0)
	{
		$title = 'testIndex';
		$posts = $this->_postMng->getPosts($page);
		$lastPosts = $posts;
		$this->callVue('home');
	}
	public function about()
	{
		$title = 'testAbout';
		$this->callVue('about');
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
		$this->callVue('contact');
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

		$this->callVue('post');
	}
	public function side()
	{
		$topPosts = $this->_postMng->lastPosts();
		$topComs = $this->_comMng->lastComments();

		$this->callVue('side');
	}
	private function callVue($vue)
	{
		require 'Vue/vue' . ucfirst($vue) .'.php';
		require 'Vue/template.php';
	}
}