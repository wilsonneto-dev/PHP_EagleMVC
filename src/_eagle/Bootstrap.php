<?php

class Bootstrap
{
	public function __construct() 
	{
		$flag = FALSE;
		// 1. router
		if (isset ($_GET['path'])) {
			$tokens = explode('/', rtrim($_GET['path'], '/'));
			
			// 2. Dispatcher
			$controllerName = ucfirst(array_shift($tokens));
			if (file_exists('Controllers/'.$controllerName.'.php')) {
				$controller = new $controllerName();
				if (!empty($tokens)) {
					$actionName = array_shift($tokens);
					if (method_exists ( $controller , $actionName )) {
                        $controller->setViewPath($controllerName, $actionName);
                        $controller->{$actionName}(@$tokens);	
					}
					else {
						$flag = TRUE;
					}
				}
				else
				{
					// default action
                    $controller->setViewPath($controllerName, "index");
					$controller->index();
				}				
			}
			else {
				$flag = TRUE;
			}
		}
		else {
			$controllerName = 'Home';
			$controller = new $controllerName();
            $controller->setViewPath($controllerName, "index");
			$controller->index();
		}
		
		//Error404 page
		if ( $flag ) {
			$controllerName = 'Error404';
			$controller = new $controllerName();
			$controller->index();
		}
	}
}

?>