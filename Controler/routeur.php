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
				if(isset($_GET['addComment']))
				{
					$postId = $_GET['id'];
					$comAuth = $_POST['author'];
					$comCont = $_POST['content'];
					$comMng->addComment($postId, $comAuth,$comCont);
				}
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