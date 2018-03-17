<?php
session_start();
require_once 'Controler/Routeur.php';
$routeur = new Routeur();
$routeur->RouteRequest();
