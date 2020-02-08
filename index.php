<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "vendor/autoload.php";

define('ROOT', __DIR__);


$contr = new Controller\SiteController;

$contr->page();

