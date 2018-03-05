<?php

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