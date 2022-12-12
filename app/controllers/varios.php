<?php

/**
 * validar_tarea
 * @param  string $blade es un string con el que vamos a mostrar la vista
 */

use Jenssegers\Blade\Blade;

define('CACHE_PATH', __DIR__.'/../views/cache/');
define('CTRL_PATH', __DIR__.'/../controllers/');
define('VIEW_PATH',__DIR__.'/../views/');

include (__DIR__.'/../../vendor/autoload.php');

$blade = new Blade(VIEW_PATH, CACHE_PATH);
