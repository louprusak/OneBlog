<?php
require('DAL/Connection.php');
require('DAL/gateways/GtwNews.php');

$mdl = new GtwNews();
$listNews = $mdl->getAllNews();


