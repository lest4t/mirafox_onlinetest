<?php
/**
 * Date: 11/12/18
 * Time: 10:02 PM
 * Author: lest4t
 */

class App
{
	protected static $router;

	/**
	 * @return mixed
	 */
	public static function getRouter() {
		return self::$router;
	}

	public static function run($uri) {
		self::$router = new Router($uri);

		$controllerClass = ucfirst(self::$router->getController()) . 'Controller';
		$controllerMethod = strtolower(self::$router->getAction()) . 'Action';

		$controllerObject = new $controllerClass();
		if (method_exists($controllerObject, $controllerMethod)) {
			$result = $controllerObject->$controllerMethod();
		} else {
			throw new Exception('Method ' . $controllerMethod . ' is not exist.');
		}
	}
}
