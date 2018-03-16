<?php
require_once 'Controler/Routeur.php';
session_start();
$routeur = new Routeur();
$routeur->RouteRequest();
