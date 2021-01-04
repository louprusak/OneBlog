<?php

/**  chargement config */
require_once('config/config.php');

/** chargement autoloader pour autochargement des classes */
require_once('config/Autoload.php');
Autoload::charger();

/** Démarrage de la session */
session_start();

/** Appel de l'affichage et des interactions du site */
require_once('controllers/FrontController.php');
new FrontController();


