<?php

require 'Controler/routeur.php';

$routeur = new Routeur();
$routeRequest($_GET['action']);