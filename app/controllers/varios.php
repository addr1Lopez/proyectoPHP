<?php

use Jenssegers\Blade\Blade;

//error_reporting(E_ERROR | E_WARNING | E_PARSE);

define('CACHE_PATH', __DIR__.'/../views/cache/');
define('CTRL_PATH', __DIR__.'/../controllers/');
define('VIEW_PATH',__DIR__.'/../views/');

//require __DIR__ . '/../../ctes.php';

include (__DIR__.'/../../vendor/autoload.php');

$blade = new Blade(VIEW_PATH, CACHE_PATH);

//DIE(VIEW_PATH);