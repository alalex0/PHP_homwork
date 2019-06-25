<?php 
namespace Web\Frontcontroller\Core;

	class Router
	{
		public static function run(){
			$controller = "Index";
			$action = "index";
			$params = null;
			$routes = explode("/", $_SERVER['REQUEST_URI']);
			var_dump($_SERVER['REQUEST_URI']);
			if (!empty($routes[1])) {
				$controller = $routes[1];
			}
			if (!empty($routes[2])) {
				//имя метода
				$action = $routes[2];
			}
			if (!empty($routes[3])) {
				//параметры
				$params = $routes[3];
			}
			$controller = 'Web\Frontcontroller\Controllers\\' . ucfirst(strtolower($controller)) . 'Controller';
			$action = strtolower($action) . 'Action';
			if (!class_exists($controller)) {
				var_dump($controller);
				echo "Класс не найден";
				return;
			}
			if (!method_exists($controller, $action)) {
				echo "Метод не найден";
				return;
			}
			$controller = new $controller();
			$controller->$action($params);
		}
	}

 ?>