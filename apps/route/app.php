<?php
namespace App;
/*
	App Route 
	Jafran Hasan
	http://jafran.returnxero.com
*/
class Route {

	// if no route found it returns false
	// its used for 404 page routing
	public static $routeFound = false;
	
	// main method
	private static function map($method, $routes, $callback, $option=NULL)
	{

		// formating routes
		$routes = self::formatRoute($routes);
		$request = self::formatRoute($_SERVER['REQUEST_URI']);
		$pattern = "@^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($routes)) . "$@D";
        
		// check if requested uri matches to routes
		if(preg_match($pattern, $request, $matches)) {
			array_shift($matches);

			// request method checking
			if($_SERVER['REQUEST_METHOD']==$method || $method == "ANY"){
				
				self::$routeFound = true;

				// parameter searches
				if($matches!=NULL){
					// parameter found
					if(is_callable($callback)){
						return call_user_func_array($callback, $matches);
						} 

				} else {
					// no paramater found

					// is function callable
					if(is_callable($callback)){

						return call_user_func($callback);

					} else {
						// function is not callable . 
						if($option != NULL){
							switch ($option) {
								// redirection
								case "redirect":
									$callback = self::formatRoute($callback);
									header("Location: {$callback}");
									// return false;
									break;
								
								default:
								// controller load
									return false;
									break;
							} 
						} else {
								// return controllers
								static::LoadController($callback);
							}
					}
				}
			}	else {
				// server request doesn't match
				http_response_code(404);
			}		

			
		}
	}
		
	
	// get request
	public static function get($routes, $callback)
	{
		return self::map('GET', $routes, $callback);
	}

	// post request
	public static function post($routes, $callback)
	{
		return self::map('POST', $routes, $callback);
	}

	// put request
	public static function put($routes, $callback)
	{
		return self::map('PUT', $routes, $callback);
	}

	// delete request
	public static function delete($routes, $callback)
	{
		return self::map('DELETE', $routes, $callback);
	}

	// any cross request
	public static function any($routes, $callback)
	{
		return self::map('ANY', $routes, $callback);
	}

	// redirecttion
	public static function redirect($routes, $callback)
	{
		return self::map('ANY', $routes, $callback, "redirect");
	}



	// format route
	private static function formatRoute($route)
	{	
		$route = strtok($route, '?');
		$result = trim($route, '/');
			if ($result === '')
			{
			return '/';
			}
		return strtok($result, "?");
	}

	protected static function LoadController($controller){
		if(strpos($controller, "@") > 0){
			$class_name = explode("@", $controller)[0];
			$method_name = explode("@", $controller)[1];
		} else {
			$class_name = $controller;
			$method_name = "__construct";
		}

		// load class from controller folders
		if(file_exists(BASE_PATH . "/apps/controller/" . $class_name . ".php")){
			require_once BASE_PATH . "/apps/controller/" . $class_name . ".php";
			if(class_exists($class_name)){
				// print_r($method_name);
				$call = new $class_name;
				// returning callback function
				return $call->$method_name();

			}
		}
	}
	



}




/*
	Jafran Hasan
*/







?>