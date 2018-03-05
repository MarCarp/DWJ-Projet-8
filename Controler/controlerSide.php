<?php
//$output = array_slice($input, 2);

require 'Model/Post.php';
require 'Model/Comment.php';

$postMng = new Post();
$comMng = new Comment();

$topPosts = $postMng->lastPosts();
$topComs = $comMng->lastComments();



require 'Vue/vueSide.php';
