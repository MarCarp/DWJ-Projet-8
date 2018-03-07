<?php
$title = 'testAdmin';
if(isset($_SESSION['admin'])||isset($_POST['adminPass']))
{
	
	require 'Controler/controlerAdmin.php';
}
else
{
	require 'Vue/vuePassword.php';
}