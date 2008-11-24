<?php

Class FrontController
{
	public function dispatch()
	{
		$controller = !empty($_GET['controller']) ? $_GET['controller'] : Config::singleton()->get('config', 'default_controller');
		$action = 	  !empty($_GET['action']) 	  ? $_GET['action'] 	: Config::singleton()->get('config', 'default_action');
		
		$parameters = !empty($_GET['params']) 	  ? $_GET['params'] 	: null;
		
		$cont = new $controller;
		$cont->$action($parameters);
	}
}

?>