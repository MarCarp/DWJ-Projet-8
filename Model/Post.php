<?php

namespace Projet8\Model;

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
		$index = (int)$page*5;
		if($index<0){$index=0;}

		$sql = 'SELECT bp.POST_ID id, POST_TITLE title, POST_CONTENT content, POST_IMG image, DATE_FORMAT(POST_DATE, "%b %e, %Y") datefr,
			COUNT(bc.COM_ID) coms FROM blg_posts bp LEFT OUTER JOIN blg_comments bc ON bc.POST_ID = bp.POST_ID GROUP BY id, title, content, image, datefr ORDER BY bp.POST_ID DESC LIMIT ?,?';
		$posts = $this->request($sql, array($index,5));
		return $posts;
	}
	public function countPosts()
	{
		$sql = 'SELECT COUNT(POST_ID) FROM blg_posts';
		$q = $this->request($sql);
		return $q->fetchColumn();
	}

	public function getPost($postId)
	{
		$sql = 'SELECT POST_ID id, POST_TITLE title, POST_CONTENT content, POST_IMG image, DATE_FORMAT(POST_DATE, "%b %e, %Y") datefr FROM blg_posts WHERE POST_ID=?';
		$post = $this->request($sql, array($postId));
		return $post->fetch();		
	}
}