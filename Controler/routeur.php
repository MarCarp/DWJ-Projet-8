<?php

class Routeur
{
	private $_controler;
	public function RouteRequest($action=null)
	{
		$this->_controler = new Controler();
		if($action!=null)
		{
			if($action=='about')
			{
				$this->_controler->about();
			}
			elseif($action=='contact')
			{
				$this->_controler->contact();
			}
			elseif($_GET['action']=='post')
			{
				$this->_controler->post();
			}
			elseif ($_GET['page'])
			{
			}
		}
		else
		{
			$this->_controler->home();
		}
	}
}