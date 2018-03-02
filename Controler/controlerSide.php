<?php
//$output = array_slice($input, 2);

require 'Model/Post.php';
require 'Model/Comment.php';

$postMng = new Post();
$comMng = new Comment();

$postsToSlice = $postMng->getPosts();
$comsToSlice = $comMng->lastComments();

$topPosts = array_slice($postsToSlice->fetchAll(), 0, 4);
$topComs = array_slice($comsToSlice->fetchAll(), 0, 4);

require 'Vue/vueSide.php';
