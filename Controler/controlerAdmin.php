<?php

require 'Model/Admin.php';

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
			echo 'Mot de passe Ok';
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