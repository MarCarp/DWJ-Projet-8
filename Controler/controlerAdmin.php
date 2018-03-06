<?php

require 'Model/Admin.php';

//VÉRIFICATION DU MOT DE PASSE

$userPseudo = $_POST['adminId'];
$userPassword = $_POST['adminPass'];

$adminMng = new Admin();

$passReq = $adminMng->idPass($userPseudo);
$passHash = $passReq->fetch();


if(isset($passHash))
{
	if($passHash != null)
	{
		if(password_verify($userPassword, $passHash[0]))
		{
			session_start();
			$_SESSION['admin'] = $userPseudo;
		}
		else
		{
			echo 'Mot de passe Invalide';
		}
	}
	else
	{
		echo 'Aucun utilisateur à ce nom.';
	}
}

//GESTION DES POSTS
require 'Model/Post.php';