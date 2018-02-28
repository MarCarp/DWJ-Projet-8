<?php
abstract class Model
{
	private $_db;

	public function request($sql, $params=null)
	{
		if($params==null)
		{
			$q = $this->_db->query($sql);
		}
		else
		{
			$q = $this->_db->prepare($sql);
			$q->execute($params);
		}
		return $q;
	}

	private function getDb()
	{
		if($this->_db == null)
		{
			$this->$_db = new PDO('mysql:host=localhost;dbname=projet_8;charset=utf8','root','');
		}
		return $this->_db;
	}
}