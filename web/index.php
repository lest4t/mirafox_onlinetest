<?php
/**
 * Date: 11/12/18
 * Time: 7:11 PM
 * Author: lest4t
 */

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

require_once(ROOT . DS . 'lib' . DS . 'init.php');

$uri = $_SERVER['REQUEST_URI'];

App::run($uri);
