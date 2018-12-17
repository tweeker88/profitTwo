<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__ . '/../App/autoload.php';

$uri = stristr($_SERVER['REQUEST_URI'], '?', true);

$parts = explode('/', $uri);
unset($parts[0]);

if (empty($parts[1])) {
    $nameCtrl = '\App\IndexController';
} else {
    $nameCtrl = '\App\\' . ucfirst($parts[1]) . 'Controller';
}

$ctrl = new $nameCtrl;

$ctrl();


