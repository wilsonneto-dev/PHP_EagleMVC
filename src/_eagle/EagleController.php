<?php

class EagleController
{
	public function __construct()
	{
		$loader = new \Twig\Loader\FilesystemLoader('./views');
		$twig = new \Twig\Environment($loader, ['cache' => './views_cache',]);

		$this->twig = $twig;
	}

	public function view($data = [], $pViewPath = "")
	{
		if($pViewPath != "")
			$this->viewPath = $pViewPath;
		
		echo $this->twig->render($this->viewPath, $data);
	}

	public function setViewPath($controller, $action)
	{
		$this->viewPath = "{$controller}/{$action}.html";
	}
}

?>