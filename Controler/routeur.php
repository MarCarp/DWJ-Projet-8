<?php

class Routeur
{
	public function RouteRequest($action=null)
	{
		require 'Vue/vueSide.php';
		if(isset($action))
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
				
			}
		}
		else
		{
			require 'Controler/controlerHome.php';
		}
		require 'Vue/template.php';
	}
}