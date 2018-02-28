<?php
require_once 'Model/Model.php';

class Comment extends Model
{
	public function comCount($idPost)
	{
		$sql = 'SELECT COUNT(*) comCount FROM blg_comments WHERE POST_ID=?';
		$q = $this->request($sql, array($idPost));
		return $q->fetch();
	}
}