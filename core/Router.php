<?php


class Router {
	
	protected $routes = [
	//GET request routs array
		'GET' => [],
	//POST request routs array	
		'POST' => []
	];

	//load routes file make method chainable
	public static function load($file) {

		$router = new static;
		require $file;
		return $router;
	}

	//make GET request routes
	public function get ($url, $controller) {

		$this->routes['GET'][$url] = $controller;
	}
	//make POST request routes
	public function post ($url, $controller) {

		$this->routes['POST'][$url] = $controller;
	}
	//get requested page
	public function getPage($url, $requestType) {
		//is requested url in array
		if(array_key_exists($url, $this->routes[$requestType])) {
			// call to callAction method with splat operator for array arguments
			 return $this->callAction(
			 	...explode('->', $this->routes[$requestType][$url])
			 	);
			
		}

		throw new Exception("No route defined");
		
	}
	//create object and call method on object
	protected function callAction ($controller, $action) {

		if (class_exists($controller)) {
			$controller = new $controller;
				if (method_exists($controller, $action)) {
				return $controller->$action();
			}
	}
		
		
	}

	
}