<?php
require 'Model/Post.php';
require 'Model/Comment.php';

$postMng = new Post();
$comMng = new Comment();

if(isset($_GET['action']))
{
	if($_GET['action']=='about')
	{
		$title = 'testAbout';
		require 'Vue/vueSide.php';
		require 'Vue/vueAbout.php';
	}
	elseif($_GET['action']=='contact')
	{
		$title = 'testContact';
		require 'Vue/vueSide.php';
		require 'Vue/vueContact.php';
	}
	elseif($_GET['action']=='post')
	{
		$postId = $_GET['id'];
		$post = $postMng->getPost($postId);
		$coms = $comMng->getComments($postId);
		require 'Vue/vueSide.php';
		require 'Vue/vuePost.php';
	}
}
else
{
	$posts = $postMng->getPosts();
	$lastPosts = $posts;
	$title = 'testIndex';
	require 'Vue/vueSide.php';
	require 'Vue/vueHome.php';
}

require 'Vue/template.php';