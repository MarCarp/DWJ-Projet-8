<?php

$title = 'testPost';

$postId = $_GET['id'];
$post = $postMng->getPost($postId);
$coms = $comMng->getComments($postId);

require 'Vue/vuePost.php';