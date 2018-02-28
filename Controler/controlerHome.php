<?php
require 'Model/Post.php';
require 'Model/Comment.php';

$postMng = new Post();
$comMng = new Comment();

$posts = $postMng->getPosts();

$title = 'testIndex';
require 'Vue/vueSide.php';
require 'Vue/vueHome.php';
require 'Vue/template.php';