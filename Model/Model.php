<?php
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
			$q->execute($params);
		}
		return $q;
	}

	private function getDb()
	{
		if($this->_db == null)
		{
			$this->_db = new PDO('mysql:host=localhost;dbname=projet_8;charset=utf8','root','');
		}
		return $this->_db;
	}
}