<?php
/**
 * Date: 11/12/18
 * Time: 7:17 PM
 * Author: lest4t
 */

class Router
{
	protected $uri;
	protected $controller;
	protected $action;
	protected $params;
	protected $route;

	/**
	 * @return mixed
	 */
	public function getUri() {
		return $this->uri;
	}

	/**
	 * @return mixed
	 */
	public function getController() {
		return $this->controller;
	}

	/**
	 * @return mixed
	 */
	public function getAction() {
		return $this->action;
	}

	/**
	 * @return mixed
	 */
	public function getParams() {
		return $this->params;
	}

	/**
	 * @return mixed
	 */
	public function getRoute() {
		return $this->route;
	}

	public function __construct($uri) {
		$this->uri = urldecode(trim($uri, '/'));

		$routes           = Config::get('routes');
		$this->route      = Config::get('default_route');
		$this->controller = Config::get('default_controller');
		$this->action     = Config::get('default_action');

		$uriParts  = explode('?', $this->uri);
		$path      = $uriParts[0];
		$pathParts = explode('/', $path);

		if (count($pathParts)) {
			if (in_array(strtolower(current($pathParts)), array_keys($routes))) {
				$this->route = strtolower(current($pathParts));
				array_shift($pathParts);
			}
			if (current($pathParts)) {
				$this->controller = strtolower(current($pathParts));
				array_shift($pathParts);
			}
			if (current($pathParts)) {
				$this->action = strtolower(curl_reset($pathParts));
				array_shift($pathParts);
			}
			$this->params = $pathParts;
		}
	}

	public static function redirect($location) {
		header("Location: $location");
	}
}
