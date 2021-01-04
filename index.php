<?php

//chargement config
require_once('config/config.php');
//chargement autoloader pour autochargement des classes
require_once('config/Autoload.php');
Autoload::charger();

session_start();

require_once('controllers/FrontController.php');
new FrontController();


