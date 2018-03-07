<?php
class Controler
{
	public function home()
	{
		$title = 'testIndex';
		$posts = $postMng->getPosts();
		$lastPosts = $posts;
		require 'Vue/vueHome.php';
	}
	public function about()
	{
		$title = 'testAbout';
		require 'Vue/vueAbout.php';
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
		require 'Vue/vueContact.php';
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
		$post = $postMng->getPost($postId);
		$coms = $comMng->getComments($postId);

		require 'Vue/vuePost.php';
	}
	public function side()
	{
		$postMng = new Post();
		$comMng = new Comment();

		$topPosts = $postMng->lastPosts();
		$topComs = $comMng->lastComments();

		require 'Vue/vueSide.php';
	}
}