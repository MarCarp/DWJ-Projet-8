<?php

namespace Projet8\Model;

use PDO;

abstract class Model
{
	private $_db;

	protected function request($sql, $params=null)
	{
		if($params==null)
		{
			$q = $this->getDb()->query($sql);
		}
		else
		{
			$q = $this->getDb()->prepare($sql);
			$i = 1;
			foreach($params as $param)
			{
				if(is_int($param))
					{$q->bindValue($i,$param, PDO::PARAM_INT);}
				else
					{$q->bindValue($i,$param, PDO::PARAM_INT);}
				$i++;
			}
			$q->execute();
		}
		return $q;
	}

	private function getDb()
	{
		if($this->_db == null)
		{
			$this->_db = new PDO('mysql:host=localhost;dbname=projet_8;charset=utf8','root','');
			$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		}
		return $this->_db;
	}
}