<?php

error_reporting(E_ALL);

require '../config/dev.php';
require '../vendor/autoload.php';

session_start();

$router = new \App\config\Router();
$router->run();