<?php
$title = 'testAdmin';
if(isset($_SESSION['admin']))
{
	require 'vueAdmin.php';
}
elseif(isset($_POST['adminPass']))
{
	require 'Controler/controlerAdmin.php';
}
else
{
	require 'Vue/vuePassword.php';
}