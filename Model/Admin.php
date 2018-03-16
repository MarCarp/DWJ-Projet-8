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
	public function deletePost($postId)
	{
		$sql = 'DELETE FROM blg_posts WHERE POST_ID = ?';
		$this->request($sql, array($postId));
	}
}