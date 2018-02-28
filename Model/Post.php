<?php
require 'Model/Model.php';
class Post extends Model
{
	public function getPosts()
	{
		$sql = 'SELECT POST_TITLE title, POST_CONTENT content, FORMAT_DATE(POST_DATE, "%M %j, $Y/") datefr FROM blg_posts ORDER BY POST_ID DESC';
		$posts = $this->request($sql);
		return $posts;
	}

	public function getPost($postId)
	{
		$sql = 'SELECT POST_TITLE title, POST_CONTENT content, FORMAT_DATE(POST_DATE, "%M %j, $Y/") datefr FROM blg_posts WHERE POST_ID=?';
		$post = $this->request($sql,array($postId));
		return $post;		
	}
}