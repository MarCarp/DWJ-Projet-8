<?php

$title = 'testPost';

require 'Model/Post.php';
require 'Model/Comment.php';

$postMng = new Post();
$comMng = new Comment();

$postId = $_GET['id'];
$post = $postMng->getPost($postId);
$coms = $comMng->getComments($postId);

require 'Vue/vuePost.php';