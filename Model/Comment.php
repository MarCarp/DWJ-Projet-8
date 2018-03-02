<?php
require_once 'Model/Model.php';

class Comment extends Model
{
	public function getComments($postId)
	{
		$sql = 'SELECT COM_AUTHOR author, COM_CONTENT content, DATE_FORMAT(POST_DATE, "%b %e, %Y/") datefr FROM blg_comments WHERE POST_ID=? ORDER BY COM_ID DESC';
		$coms = $this->request($sql,array($postId));
		return $coms;	
	}

	public function lastComments()
	{
		$sql = 'SELECT COM_AUTHOR author, COM_CONTENT content FROM blg_comments ORDER BY COM_DATE DESC';
		$coms = $this->request($sql);
		return $coms;			
	}

	public function comCount($idPost)
	{
		$sql = 'SELECT COUNT(*) comCount FROM blg_comments WHERE POST_ID=?';
		$q = $this->request($sql, array($idPost));
		return $q->fetch();
	}
}