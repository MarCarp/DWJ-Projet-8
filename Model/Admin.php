<?php

namespace Projet8\Model;

require_once 'Model/Model.php';

class Admin extends Model
{
	public function idPass($id)
	{
		$sql = 'SELECT ADMIN_PASS FROM blg_admin WHERE ADMIN_PSEUDO=?';
		$q = $this->request($sql,array($id));
		return $q;
	}
	public function createPost($postTitle, $postContent, $postImg)
	{
		$sql = 'INSERT INTO blg_posts(POST_TITLE, POST_CONTENT, POST_IMG, POST_DATE) VALUES(?, ?, ?, NOW())';
		$this->request($sql, array($postTitle, $postContent, $postImg));
	}
	public function deletePost($postId)
	{
		$sql = 'DELETE FROM blg_posts WHERE POST_ID = ?';
		$this->request($sql, array($postId));
	}
	public function updatePost($postTitle, $postContent, $postImg, $postId)
	{
		$sql = 'UPDATE blg_posts SET POST_TITLE=?, POST_CONTENT=?, POST_IMG=? WHERE POST_ID=?';
		$this->request($sql, array($postContent, $postTitle, $postId));
	}
}