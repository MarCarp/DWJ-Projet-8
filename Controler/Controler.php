<?php

namespace Projet8\Controler;

require_once 'Model/Post.php';
require_once 'Model/Comment.php';
require_once 'Vue/Vue.php';

use \Projet8\Model\Post;
use \Projet8\Model\Comment;
use \Projet8\Vue\Vue;

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
		$posts = $this->_postMng->getPosts($page);
		$pages = $this->pagination($page);
		$contentSide = $this->side();
		$data = array('posts'=>$posts,'pages'=>$pages,'contentSide'=>$contentSide);
		$vue = new Vue('Home');
		$vue->generate($data);
	}
	public function post()
	{
		$postId = $_GET['id'];
		$post = $this->_postMng->getPost($postId);
		$coms = $this->_comMng->getComments($postId);
		$contentSide = $this->side();
		$data = array('post'=>$post,'coms'=>$coms,'contentSide'=>$contentSide);
		$vue = new Vue('Post');
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
	public function addComment()
	{
		$postId = $_GET['id'];
		$comAuth = $_POST['author'];
		$comCont = $_POST['content'];
		$this->_comMng->addComment($postId, $comAuth,$comCont);
		$this->post();
	}
	public function send()
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
		$this->contact();
	}
	public function about()
	{
		$vue = new Vue("About");
		$vue->generate();
	}
	public function contact()
	{
		
		$vue = new Vue("Contact");
		$vue->generate();
	}
	public function search()
	{
		if(isset($_POST['query']))
		{
			$query = $_POST['query'];
			$terms = explode(" ", $query);
			$posts = $this->_postMng->search($terms);
			$pages = $this->pagination(0);
			$contentSide = $this->side();
			$data = array('posts'=>$posts,'pages'=>$pages,'contentSide'=>$contentSide);
			$vue = new Vue('Home');
			$vue->generate($data);
		}
		else{throw new Exception("Recherche incorrecte");
		}
	}
	private function pagination($page)
	{
		$posts = $this->_postMng->countPosts();

		$pages['pActu'] = (1+(int)$page);
		$pages['pTotal'] = ceil(($posts/5)-1);
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
	public function erreur($msg)
	{
		$vue = new Vue('Erreur');
		$vue->generate(array('content'=>$msg));
	}
}