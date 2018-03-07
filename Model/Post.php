<?php
require_once 'Model/Model.php';
class Post extends Model
{
	public function lastPosts()
	{
		$sql = 'SELECT POST_ID id, POST_TITLE title, POST_CONTENT content, POST_IMG image, DATE_FORMAT(POST_DATE, "%b %e, %Y") datefr FROM blg_posts ORDER BY POST_ID DESC LIMIT 4';
		$posts = $this->request($sql);
		return $posts;
	}

	public function getPosts($page)
	{
		$sql = 'SELECT POST_ID id, POST_TITLE title, POST_CONTENT content, POST_IMG image, DATE_FORMAT(POST_DATE, "%b %e, %Y") datefr FROM blg_posts ORDER BY POST_ID DESC LIMIT ?,5';
		$posts = $this->request($sql, array($page));
		return $posts;
	}

	public function getPost($postId)
	{
		$sql = 'SELECT POST_TITLE title, POST_CONTENT content, POST_IMG image, DATE_FORMAT(POST_DATE, "%b %e, %Y") datefr FROM blg_posts WHERE POST_ID=?';
		$post = $this->request($sql, array($postId));
		return $post->fetch();		
	}

	public function deletePost($postId)
	{
		$sql = 'DELETE FROM blg_posts WHERE POST_ID = ?';
		$this->request($sql, array($postId));
	}

	public function createPost($postContent, $postTitle, $postImg)
	{
		$sql = 'INSERT INTO blg_posts(POST_TITLE, POST_CONTENT, POST_IMG, POST_DATE) VALUES(?, ?, ?, NOW())';
		$this->request($sql, array($postContent, $postTitle, $postImg));
	}

	public function updatePost($postTitle, $postContent, $postImg, $postId)
	{
		$sql = 'UPDATE blg_posts SET POST_TITLE=?, POST_CONTENT=?, POST_IMG=? WHERE POST_ID=?';
		$this->request($sql, array($postContent, $postTitle, $postId));
	}
}