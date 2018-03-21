<?php

namespace Projet8\Controler;

use Exception;

class Image
{
	public function check()
	{
		if(isset($_FILES['image'])&&$_FILES['image']['error']==0)
		{
			if($_FILES['image']['size']<=3000000)
			{
				$fileInfo = pathinfo($_FILES['image']['name']);
				$extension = $fileInfo['extension'];
				$extension_allowed = array('jpg', 'jpeg', 'gif', 'png');
				if(in_array($extension, $extension_allowed))
				{
					$nameImg = basename($_FILES['image']['name']);
					move_uploaded_file($_FILES['image']['tmp_name'], 'Content/Images/' . $nameImg);
					return $nameImg;
				}
				else{throw new Exception("Type de fichier non autorisé (.jpg, .jpeg, .gif et .png uniquement)");}
			}else{throw new Exception("Fichier trop volumineux (max 3Mo)");}
		}
		else if(isset($_POST['prevImage']))
		{
			if($_POST['prevImage']!=null)
			{
				return $_POST['prevImage'];
			}
		}
		else 
		{
			return 'Default.jpg';
		}
	}
}