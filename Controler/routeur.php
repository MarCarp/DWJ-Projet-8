<?php

class Routeur
{
	public function RouteRequest($action=null)
	{
		$controler->side();
		if($action!=null)
		{
			if($action=='about')
			{
				$controler->about();
			}
			elseif($action=='contact')
			{
				$controler->contact();
			}
			elseif($_GET['action']=='post')
			{
				$controler->post();
			}
			elseif ($_GET['page'])
			{
			}
		}
		else
		{
			$controler->home();
		}
	}
}