<?php

namespace Projet8\Model;

require_once 'Model/Model.php';

class Comment extends Model
{
	public function addComment($postId, $author, $comment)
	{
		$sql = 'INSERT INTO blg_comments(POST_ID, COM_AUTHOR, COM_CONTENT, COM_DATE) VALUES(?, ?, ?, NOW())';
		$this->request($sql, array($postId, $author, $comment));
	}
	public function getComments($postId)
	{
		$sql = 'SELECT COM_AUTHOR author, COM_CONTENT content, DATE_FORMAT(COM_DATE, "%e/%m/%Y à %H h %i") datefr FROM blg_comments WHERE POST_ID=? ORDER BY COM_ID';
		$coms = $this->request($sql,array($postId));
		return $coms;	
	}

	public function lastComments()
	{
		$sql = 'SELECT bc.COM_AUTHOR author, bp.POST_TITLE title FROM blg_comments bc INNER JOIN blg_posts bp ON bp.POST_ID = bc.POST_ID ORDER BY COM_DATE DESC LIMIT 4';
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