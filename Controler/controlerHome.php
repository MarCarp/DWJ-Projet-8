<?php

$title = 'testIndex';

$posts = $postMng->getPosts();
$lastPosts = $posts;

require 'Vue/vueHome.php';