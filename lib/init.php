<?php
/**
 * Date: 11/12/18
 * Time: 7:22 PM
 * Author: lest4t
 */

require_once(ROOT . DS . 'config' . DS . 'config.php');

function __autoload($className) {

	$libsPath        = ROOT . DS . 'lib' . DS . strtolower($className) . '.class.php';
	$controllersPath = ROOT . DS . 'controllers' . DS . ucfirst(strtolower(str_replace('Controller', '', $className))) . 'Controller.php';
	$modelsPath      = ROOT . DS . 'models' . DS . $className . '.php';

	if (file_exists($libsPath)) {
		require_once($libsPath);
	} elseif (file_exists($controllersPath)) {
		require_once($controllersPath);
	} elseif (file_exists($modelsPath)) {
		require_once($modelsPath);
	} else {
		throw new Exception('Failed to include class: ' . $className);
	}
}
