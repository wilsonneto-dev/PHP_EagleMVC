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
				if (!empty($tokens)) {
					$actionName = array_shift($tokens);
					if (method_exists ( $controller , $actionName )) {
						$this->request($controllerName, $actionName, @$tokens);
					}
					else {
						$flag = TRUE;
					}
				}
				else
				{
					$this->request($controllerName, "index", @$tokens);
				}				
			}
			else {
				$flag = TRUE;
			}
		}
		else {
			$controllerName = 'Home';
			$this->request($controllerName, "index");
		}
		
		//Error404 page
		if ( $flag ) {
			$controllerName = 'Error404';
			$this->request($controllerName, "index");
		}
	}

	private function request($controllerName, $actionName, $tokens = null)
	{
		$controller = new $controllerName();
		$controller->setViewPath($controllerName, $actionName);
		$response = "";

		if($tokens != null)
			$response = $controller->$actionName(@$tokens);
		else
			$response = $controller->$actionName();

		$this->response($response);
	}

	private function response($responseHtml)
	{
		echo $responseHtml;
	}
}

?>