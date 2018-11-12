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

			$viewPath = $controllerObject->$controllerMethod();
			$viewObject = new View($controllerObject->getData(), $viewPath);
			$content = $viewObject->render();
		} else {
			throw new Exception('Method ' . $controllerMethod . ' is not exist.');
		}

		$layout = self::$router->getRoute();
		$layoutPath = VIEW_PATH . DS . $layout . '.php';
		$layoutViewObject = new View(compact('content'), $layoutPath);

		echo $layoutViewObject->render();
	}
}
