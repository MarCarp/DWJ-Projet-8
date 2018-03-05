<?php

class Routeur
{
	public function RouteRequest($action=null)
	{
		require 'Controler/controlerSide.php';
		if($action!=null)
		{
			if($action=='about')
			{
				$title = 'testAbout';				
				require 'Vue/vueAbout.php';
			}
			elseif($action=='contact')
			{
				$title = 'testContact';
				require 'Vue/vueContact.php';
			}
			elseif($_GET['action']=='post')
			{
				require 'Controler/controlerPost.php';
			}
		}
		else
		{
			require 'Controler/controlerHome.php';
		}
		require 'Vue/template.php';
	}
}