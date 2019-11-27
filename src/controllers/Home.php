<?php
use \RedBeanPHP\R as R;

class Home extends EagleController
{
	public function index()
	{
		DB::R();
		$grupos = R::findAll('grupo_admin');

		// echo json_encode($grupos, JSON_PRETTY_PRINT);

		return $this->view([ "groups" => $grupos ]);
    }
    
    public function test()
	{
		echo "index teste";
    }
	
	public function outro()
	{
		echo "outro";
    }
    
}

?>