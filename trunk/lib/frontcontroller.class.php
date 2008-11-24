<?php

Class FrontController
{
	public function dispatch()
	{
		$controller = !empty($_GET['controller']) ? $_GET['controller'] : DEFAULT_CONTROLLER;
		$action = 	  !empty($_GET['action']) 	  ? $_GET['action'] 	: DEFAULT_ACTION;
		
		$cont = new $controller;
		$cont->$action();
	}
}

?>