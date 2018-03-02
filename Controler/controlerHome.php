<?php

$title = 'testIndex';

require 'Model/Post.php';
require 'Model/Comment.php';

$postMng = new Post();
$comMng = new Comment();

$posts = $postMng->getPosts();
$lastPosts = $posts;

require 'Vue/vueHome.php';