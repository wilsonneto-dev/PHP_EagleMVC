<?php

class Home extends EagleController
{
	public function index()
	{
		return $this->view([ "message" => "index home here" ]);
    }
    
    public function test()
	{
		echo "index teste";
    }
    
}

?>